<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Payment;

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
    
    public function getHod(){
        $arr=[1,2,3,4,5,6];

        return $arr;
    }
  public function deptID(){
    $id=[47,48,49,50,51,52,53,54];
    return $id;
  }

  public function generateTxn(){
    $bytes = openssl_random_pseudo_bytes(16);
    $m = strtoupper(substr(bin2hex($bytes), -10));
    $uniq = substr(hexdec(uniqid()), -5);
    $ran = mt_rand(10000, 99999);
    $txn = str_shuffle($m . $ran . $uniq);

    return $txn;
  }
  public function checkInv($student_id, $schedule_id){
    $schFee = 'Sch Fee';
    $payments = payment::where('student_id', $student_id)->where('schedule_id',$schedule_id)
             ->where('purpose', $schFee)
             ->first();


     if($payments)
      {
           return  $payments->invoice;
      }else if(!$payments)
      {
        $bytes = openssl_random_pseudo_bytes(16);
        $m = strtoupper(substr(bin2hex($bytes), -10));
        $uniq = substr(hexdec(uniqid()), -5);
        $ran = mt_rand(10000, 99999);
        $txn = str_shuffle($m . $ran . $uniq);
        $inv = 'INV' . str_shuffle($m . $ran . $uniq);

        return $inv;
      }
  }



}
