<?php
namespace App\Http\Controllers;

class Omnivora extends Mamalia{
    public function makan(){
        return "SAYA MAKAN SEGALANYAAAAA!";
    }

    public function gigi(){
        return "Saya memiliki banyak gigi TARING!!!";
    }
}