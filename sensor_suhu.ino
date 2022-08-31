#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <SD.h>
#include <TinyGPS++.h>
#include <SoftwareSerial.h>
#include <Hash.h>
#include <Adafruit_MAX31865.h>
#include <WiFiManager.h>

TinyGPSPlus gps;
SoftwareSerial SerialGPS(4,5);
/*#define DHTPIN 2     // Digital pin D7 => GPIO13 =>13
#define DHTTYPE    DHT11     // DHT 11*/
const int chipSelect = 4;
Adafruit_MAX31865 thermo = Adafruit_MAX31865(15, 13, 12, 14);
float RREF      = 426.8;
float RNOMINAL  =100.0;

//koneksi wifi
const char* ssid = "BRINnet";
const char* pass = "brin@2022";

//kirim data ke server
const char* host = "10.11.19.20";

//dhtconfig
//DHT dht (DHTPIN, DHTTYPE);
float suhu;
float h;
float Latitude, Longitude;
String DateString , TimeString , LatitudeString , LongitudeString;

unsigned long previousMillis = 0;    // will store last time DHT was updated
const long interval = 10000;  
int year , month , date, hour , minute , second, sats;

void setup() {
  Serial.begin(9600);
  //koneski wifi
  WiFi.begin(ssid, pass);
 
  // Connecting to WiFi...
  Serial.print("Connecting to ");
  Serial.print(ssid);
  // Loop continuously while WiFi is not connected
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(100);
    Serial.print(".");
  }
 
  // Connected to WiFi
  Serial.println();
  Serial.print("Connected! IP address: ");
  Serial.println(WiFi.localIP());

  thermo.begin(MAX31865_3WIRE);
  SerialGPS.begin(9600);
//      dht.begin();
  Serial.println(SerialGPS.available());

}

void checkGPS(){
  if (gps.charsProcessed() < 10)
  {
    Serial.println(F("No GPS detected: check wiring."));
    }}


void loop() {

    //koneksi ke server
   WiFiClient client ;
   const int httpPort = 80;
  //uji koneksi ke server
  if (!client.connect(host, httpPort))
  {
    Serial.println("server");
    return;
  }
  //baca gps
  while (SerialGPS.available() > 0){
    gps.encode(SerialGPS.read());
      if (gps.location.isValid())
      {
        Latitude = gps.location.lat();
        LatitudeString = "";
        LatitudeString = String(Latitude , 6);
        Longitude = gps.location.lng();
        LongitudeString = "";
        LongitudeString = String(Longitude , 6);
      }
      if (gps.date.isValid())
      {
        DateString = "";
        date = gps.date.day();
        month = gps.date.month();
        year = gps.date.year();

        if (date < 10)
        DateString = '0';
        DateString += String(date);

        DateString += " / ";

        if (month < 10)
        DateString += '0';
        DateString += String(month);
        DateString += " / ";

        if (year < 10)
        DateString += '0';
        DateString += String(year);
      }

      if (gps.time.isValid())
      {
        TimeString = "";
        hour = gps.time.hour()+ 7; //adjust UTC
        minute = gps.time.minute();
        second = gps.time.second();
    
        if (hour < 10)
        TimeString = '0';
        TimeString += String(hour);
        TimeString += " : ";

        if (minute < 10)
        TimeString += '0';
        TimeString += String(minute);
        TimeString += " : ";

        if (second < 10)
        TimeString += '0';
        TimeString += String(second);
      }}
  /*/baca nilai suhu
  unsigned long currentMillis = millis();
  if (currentMillis - previousMillis >= interval) {
    // save the last time you updated the DHT values
    previousMillis = currentMillis;
    // Read temperature as Celsius (the default)
    float newT = dht.readTemperature();
    // Read temperature as Fahrenheit (isFahrenheit = true)
    //float newT = dht.readTemperature(true);
    // if temperature read failed, don't change t value
    if (isnan(newT)) {
      Serial.println("Failed to read from DHT sensor!");
    }
    else {
      suhu = newT;
    Serial.println(suhu);
    }
    // Read Humidity
    float newH = dht.readHumidity();
    // if humidity read failed, don't change h value 
    if (isnan(newH)) {
      Serial.println("Failed to read from DHT sensor!");
    }
    else {
      h = newH;
    // Serial.println(h);
    }
 
  }*/
//suhu pt100
  uint16_t rtd = thermo.readRTD();
  float ratio = rtd;
  ratio /= 32768;
  Serial.println(thermo.temperature(RNOMINAL, RREF));
  suhu = (thermo.temperature(RNOMINAL, RREF));
  delay(1000);
    

  // SD card ------------------------------------------------------------
// make a string for assembling the data to log:
  String dataString = "";

  // read three sensors and append to the string:
  for (int analogPin = 0; analogPin < 3; analogPin++) {
    int sensor = analogRead(analogPin);
    dataString += String(sensor);
    if (analogPin < 2) {
      dataString += ",";
    }
  }

  // open the file. note that only one file can be open at a time,
  // so you have to close this one before opening another.
  File dataFile = SD.open("datalog.txt", FILE_WRITE);

  // if the file is available, write to it:
  if (dataFile) {
    dataFile.print(TimeString);
    dataFile.print(",");
    dataFile.print(DateString);
    dataFile.print(",");
    dataFile.print(LatitudeString);
    dataFile.print(",");   
    dataFile.print(LongitudeString);
    dataFile.print(",");     
    dataFile.println(suhu);
    
    dataFile.close();}

    Serial.print(TimeString);
    Serial.print(",");
    Serial.print(DateString);
    Serial.print(",");
    Serial.print(LatitudeString);
    Serial.print(",");   
    Serial.print(LongitudeString);
    Serial.print(",");     
    Serial.println(suhu);
    

  //mengirim data ke server
  String LinkSuhu;
  HTTPClient httpSuhu;
  LinkSuhu = "http://" + String(host) + "/Tubes/kirimdata.php?suhu=" + String(suhu) + "&log=" + String(LongitudeString)+ "&lat=" + String(LatitudeString);
  httpSuhu.begin(client, LinkSuhu);
  httpSuhu.GET();
  delay (1000);

  /*/tes jika sensor masuk
  String respon = httpSuhu.getString();
  Serial.println(respon);
  httpSuhu.end ();
  delay(1000);*/

  //tes jika sensor masuk
  String respon2 = httpSuhu.getString();
  Serial.println(respon2);
  httpSuhu.end ();
  delay(1000);

    /*/tes jika sensor masuk
  String respon3 = httpLat.getString();
  Serial.println(respon3);
  httpLat.end ();
  delay(1000);*/
    }
