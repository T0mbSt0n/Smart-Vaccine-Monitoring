<!-- baca status terakhir devices-->
<?php
  //include koneksi
  include "koneksi.php";

  $sql = mysqli_query($connect, "SELECT * FROM tb_sensor");
  $data = mysqli_fetch_array($sql);
  //ambil status sensor
  $suhu = $data['suhu'];
  $long =$data['log'];
  $lat =$data['lat'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Vaccine Chamber</title>
    <link rel="stylesheet" href="style.php">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script type="text/javascript" src="jquery/jquery.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            setInterval(function(){
                $("#bacasuhu").load('bacasensor.php');
            }, 1000) ;
        });

        $(document).ready(function(){
            setInterval(function(){
                $("#lat").load('bacalat.php');
            }, 1000) ;
        });

        $(document).ready(function(){
            setInterval(function(){
                $("#log").load('bacalong.php');
            }, 1000) ;
        });


    </script>
</head>
        <div class="d-flex justify-content-center deskripsi" style="justify-content: center; width: 100%">
        <center><h2>Smart Vaccine Chamber</h2>
    <div class="map-responsive" >
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1818.1326688937181!2d106.66228982307!3d-6.345442107228029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e4587d829bd7%3A0xa4cd16b8ffa33292!2sGedung%20Teknologi%203!5e0!3m2!1sid!2sid!4v1658885687164!5m2!1sid!2sid" width="400" height="250" style="justify-content: center;"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
        </div> </center>
        <body>
    
        <!-- untuk home -->
        <center> <section id="home">
    

        </section> </center>

        <!-- untuk courses -->
        <section id="courses">
            <div class="kolom" style="justify-content: center; width: 100%">
                <h2 style="text-align: center;">Control Panel</h2>
            <!-- Kartu-->
            <div class="kartu" style="justify-content: center; padding-top: 20px; text-align: center;">
                 <!-- Suhu-->
                <div class="card text-black mb-3" style="width: 20rem; margin-right: 30px; ">
                 <div class="card-header" style="font-size: 20px; text-align: center; background-color: steelblue; color: white;">Nilai Suhu</div>
                    <div class="card-body">
                    <img src="img/snow.png"width="100 px" height="auto" style="padding-bottom: 15px;">
                    <div class="panel panel-default">
                    <div class="panel-body">
                       <h4> <span id="bacasuhu"> 0 </span> °C </h4>
                    </div>
                <!-- Monitor Selesai-->
                    </div>

                    </div>
                </div>
                <!-- Akhir Suhu-->
                <!--GPS-->
                <div class="card text-black mb-3" style="width: 20rem; margin-right: 30px; ">
                 <div class="card-header" style="font-size: 20px; text-align: center; background-color: steelblue; color: white;">Lokasi</div>
                    <div class="card-body">
                    <img src="img/gps.jpg"width="100 px" height="auto" style="padding-bottom: 15px;">
                    <div class="panel panel-default">
                    <div class="panel-body">
                       <h4> Long :<span id="log"> 0 </span></h4>
                       <h4> Lat :<span id="lat"> 0 </span></h4>
                       <a href="http://maps.google.com/maps?q=loc:id=($lat),($log)">Klik untuk melihat lokasi</a>
                    </div>
                    <!-- GPS Selesai-->
                    </div>
                </div>
                
            </div>
            <div class="card text-black mb-3" style="width: 20rem; margin-right: 30px; ">
                 <div class="card-header" style="font-size: 20px; text-align: center; background-color: steelblue; color: white;">Vaccine Type</div>
                    <div class="card-body">
                    <img src="img/vac.png"width="100 px" height="auto" style="padding-bottom: 15px;">
                    <div class="panel panel-default">
                    <div class="panel-body">

                    <select id="pet-select" class= "col-sm-11">
                    <option value="" disabled selected>--Please choose an option--</option>
                    <option value="Pfizer">Pfizer</option>
                    <option value="moderna">Moderna</option>
                    <option value="astra">AstraZeneca</option>
                    <option value="sputnik V">Sputnik V</option>
                    <option value="johnson">Johnson&Johnson</option>
                    <option value="sinoVac">SinoVac</option>
                    <option value="sinopharm">Sinopharm</option>
                    <option value="covaxin">Covaxin</option>
                    <option value="novavak">Novavak</option>
                </select>
                </div>
            </div>
            <!--Akhir Kartu-->
            



    
</body>
</html>