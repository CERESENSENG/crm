<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function readCsvToArray($file) {


        $fp = fopen( $file, "r" );
        $line = fgets($fp);
        $i = 0;
        while(!feof($fp))
        {
            $line = fgets($fp);
            if (empty($line)) {
                continue;
            }
            $arr[$i] = str_getcsv( $line, ",", '"' );
            $i++;
        }

        return $arr;

    }

public function getYear()
   {


    $max=intval(date('Y'));
    $years=[];
    $years[0]['name']=2020;
    for ($i=1; $i<=($max-2020); $i++){
        $years[$i]['name']=2020 +$i;    

    }

    return $years;



   }


   public function getCohorts()
    {

          $ch = [1,2,3,4,5,6,7];
          return $ch;

    }



}
