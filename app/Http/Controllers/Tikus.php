<?php
namespace App\Http\Controllers;

use App\Helpers\Math;

class Tikus extends Omnivora{
        public function suara(){
            echo("Cit....Cit....!");
        }

        function hitung(){
            $jumlah = new Math();
            echo $jumlah-> menghitung(15,40);
        }
    }