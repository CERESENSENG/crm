<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Payment;
use App\Models\Payment_schedule;
use App\Models\Student;

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


    $max=intval(date('Y'))+1;
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
    $id=[81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,99,100];
    return $id;
  }

  public function purpose(){
    $purposes = ['sch_fee','others'];
    return $purposes;

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
    $payments = Payment::where('schedule_id',$schedule_id)
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



  }

  public function getSchedule($schedule_id){

     $schedule = Payment_schedule::find($schedule_id);
    return $schedule;



  }

  public function checkCertificate($certificate_id){

    $chkexistCert = Student::where('certificate_no', $certificate_id)->first();
    return $chkexistCert;

  }

  public function convinientfees($realamount)
  {
    if($realamount < 2500){

      $amount = $realamount/(1-(1.5/100)) +0.03;



    } else if($realamount >2500){

      $amount = $realamount/(1-(1.5/100)) +100;

    }

    $convinience= $amount - $realamount;

      $convinienceFees =  ceil($convinience);


    if($convinienceFees > 2000){

      $Charges = 2000;

      $convinienceFees = $Charges;
     }

    $total=  $realamount + $convinienceFees;

    return $total;



  }



}
