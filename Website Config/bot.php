<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;

require_once "vendor/autoload.php";
// require_once "database/config.php";
// require_once "models/user_model.php";
// require_once "models/message_model.php";

$configs = [
    "telegram" => [
        "token" => "5433316729:AAFsBx0ZkkHn0erE_M8XPGItmh0anjIPC2c"
    ]
];

DriverManager::loadDriver(TelegramDriver::class);

$botman = BotManFactory::create($configs);

$botman->hears("/start", function (BotMan $bot){
    $bot->reply("Silahkan pilih command yang tersedia.\n/subscribe : untuk mendapatkan alert ketika suhu diluar range. \n/suhu : untuk mendapatkan update data suhu. \n/lokasi : untuk mendapatkan link lokasi");
});

$botman->hears("/stop", function (BotMan $bot){
    include "stop.php";
    $message = stopalarm(5);
});

$botman->hears("/subscribe", function (BotMan $bot){
    $bot->reply("Silahkan pilih jenis vaksin anda :\n1. Pfiezer\n2. Moderna\n3. Oxford-AstraZeneca\n4. sputnik V\n5. Johnson&Johnson\n6. SinoVac\n7. Sinopharm\n8. Covaxin\n9. Novavax\nFormat : /vaksin [nomor]");
});

$botman->hears("/vaksin {nomor}", function (BotMan $bot, $nomor){
    if ($nomor = 1){
        for ($x=0;$x<5;){
        include "bacasensor.php";
            if ($suhu < "19"){
                sleep(3);
                $bot->reply("Suhu mencapai 19 °C terlalu dingin!!");
                $x++;
            }elseif($suhu > "23"){
                sleep(3);
                $bot->reply("Suhu mencapai 23 °C terlalu panas!!");
                $x++;
            }else{
                sleep(60);
                $bot ->reply("suhu normal bos, $suhu °C");
            }
        }
    }elseif($nomor = 2){
        for ($x=0;$x<5;$x++){
            sleep(3);
                if ($suhu < "19"){
                    $bot->reply("Suhu terlalu dingin!!");
                }else{
                    $bot->reply("Nilai suhu= $suhu");
                }
            }

    }elseif($nomor = 3){

    }elseif($nomor = 4){

    }elseif($nomor = 5){

    }elseif($nomor = 6){

    }elseif($nomor = 7){

    }elseif($nomor = 8){

    }elseif($nomor = 9){

    }
    else{
        $bot->reply("Engga Usah Aneh-Aneh Njim");
    }


});

$botman->listen();

?>