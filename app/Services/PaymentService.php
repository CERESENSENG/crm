<?php

namespace  App\Services;

use App\Models\Payment;

class PaymentService  {



    function  getByTxnRef($tx_ref)
    {
         return Payment::whereTxnRef($tx_ref)->first();

    }



//initialize  d txns
public function initialize($name, $email,$phone, $amount,$tx_ref, $secret_key, $init_url, $callback_url,  $sub_accts=[], $bearer_subacct='')
{


    //posted fields
    $fields['email'] = $email;
    $fields['phone'] = $phone;
    $fields['amount'] = $amount;
    $fields['reference'] = $tx_ref;
    $fields['callback_url'] = $callback_url;
    $fields['metadata']['custom_fields'] = ['name'=>$name, 'phone_no'=>$phone];


      if(!empty($sub_accts))
         {
             $fields['split']['type'] = 'flat';
             //bearer_subaccount
             $fields['split']['bearer_type'] = 'subaccount';
             $fields['split']['bearer_subaccount'] = $bearer_subacct;
             $fields['split']['subaccounts'] = $sub_accts;
         }

       //  dd($fields);

       $res =  postHttpRequest($secret_key, $init_url, $fields);
       //dd($res);
       return $res;



}

// verify txn
public  function verify(string $txn_ref, string $secrete_key,string $verify_url)
{

    $url = $verify_url.$txn_ref;
    $res =  getHttpRequest($url,$secrete_key,true);
    return $res;


}



    public function    store(array $data)
      {
          return   Payment::create($data);

      }




      public  function  formatString ($str)
      {

        // $formattedString = preg_replace_callback('/\d{4}/', function($matches) {
        //     return $matches[0] . '-';
        // }, $str);
        // // Remove the last hyphen, if present
        // $formattedString = rtrim($formattedString, '-');


        $formattedString = preg_replace('/(.{4})/', '$1-', $str);
       // Remove the last hyphen, if present
       $formattedString = rtrim($formattedString, '-');

        return $formattedString;

      }



      public function generateTxn(){
        $bytes = openssl_random_pseudo_bytes(16);
        $m = strtoupper(substr(bin2hex($bytes), -10));
        $uniq = substr(hexdec(uniqid()), -5);
        $ran = mt_rand(10000, 99999);
        $txn = str_shuffle($m . $ran . $uniq);

        return $txn;
      }



      public function get_actual_charges($amount,$gateway) {


        $max_charges = 2000;

          if($gateway == 'paystack')
          {

              if($amount > 2500)
                   $amountPay =( $amount/(1-(1.5/100))+ 5 )+100;
                else
               $amountPay =( $amount/(1-(1.5/100))+0.01 );

               $charges  = ceil($amountPay - $amount);


          }
           elseif($gateway == 'flutterwave')
             {

              if($amount > 10000)
              $amountPay =( $amount/(1-(1.4/100))+ 5 )+50;
           else
           $amountPay =( $amount/(1-(1.4/100))+0.01 );

           $charges  = ceil($amountPay - $amount);

             }
             elseif($gateway == 'interswitch')
             {

                  $amountPay =( $amount/(1-(1.5/100))+ 5 );

                  $charges  = ceil($amountPay - $amount);


             }


              // $default_charges = intval(app('paysettings')['gateway_charges']);
              // $maincharges    =  ($charges <  $default_charges  ) ? $default_charges : $charges;
                //if()
               return   $charges > $max_charges ? $max_charges:$charges;


      }









}





