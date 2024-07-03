<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Payment;
use App\Models\Payment_schedule;
use App\Models\student;

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
  public function checkInv($schedule_id){
    $schFee = 'sch_fee';
    $payments = payment::where('schedule_id',$schedule_id)
             ->where('purpose', $schFee)
             ->first();


     if($payments)
      {
           return  $payments->invoice;
           
      }else if(!$payments)
      {
        $inv =  $this->generateInvoice();

        return $inv;
      }
  }

  public function generateInvoice()
    {

      $bytes = openssl_random_pseudo_bytes(16);
      $m = strtoupper(substr(bin2hex($bytes), -10));
      $uniq = substr(hexdec(uniqid()), -5);
      $ran = mt_rand(10000, 99999);
      $txn = str_shuffle($m . $ran . $uniq);
      $inv = 'INV' . str_shuffle($m . $ran . $uniq);
      return $inv;
    }

  public function checkMatricno($matric_no){

    $student = student::where('matric_no', $matric_no)->first();
     return $student;
    // if ($student){

    //   return [
    //     'department_id' => $student->department_id,
    //      'student_id' => $student->id,
    //     'matric_no' => $student->matric_no,
    // ];
    // }else {
    //   return false;
    // }


  }

  public function getSchedule($schedule_id){

     $schedule = Payment_schedule::find($schedule_id);
    return $schedule;
   
  

  }



}
