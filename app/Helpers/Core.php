<?php

//namespace  App;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;





function  postHttpRequest($token,  $url, $postdata)
{


     try{

        $headers = [
            'Content-Type'=> 'application/json',
            'Accept'=> 'application/json',
            'Authorization' => "Bearer $token",
            "Cache-Control: no-cache"
        ];

       // dd($postdata);
        $response =  Http::withHeaders($headers)->post($url,$postdata);

        // dd($response->json());


        if ($response->successful()) {
         $status = true;
         $data = $response->json();
         $message = "";
     }
     else {
         $status = false;
         $data = [];
         $message = @$response->json();
     }
     return [
         "status" => $status,
         "message" => $message,
         "data" => $data
     ];

     }
     catch (Throwable $throwable) {
        $message = $throwable->getMessage();
        return ["status" => false, "message" => $message, "data" => []];
     }

}




function  getHttpRequest( $url,$token=false,$headers=false)
{


     try{


        // $headers = [
        //     'Content-Type' => 'application/json',
        //     'Accept'=> 'application/json',
        //     'Authorization' => "Bearer $token"
        // ];

        $header = [];
          if($headers){
          $header['Content-Type'] = 'application/json';
          $header['Accept'] = 'application/json';
           if($token)
           $header['Authorization'] = "Bearer $token";

        }



      //  \Illuminate\Support\Facades\Log::error($headers);


        $response =  Http::withHeaders($header)->get($url);

         //dd($response->json());

        if ($response->successful()) {
         $status = true;
         $data = $response->json();
         $message = "";
     }
     else {
         $status = false;
         $data = [];
         $message = @$response->json();
     }
     return [
         "status" => $status,
         "message" => $message,
         "data" => $data
     ];




     }
     catch (Throwable $throwable) {
        $message = $throwable->getMessage();
        return ["status" => false, "message" => $message, "data" => []];
     }

}



function  postHttpFormRequest( $url, $postdata,$token='')
{


     try{

        // $headers = [
        //     'Content-Type'=> 'application/json',
        //     'Accept'=> 'application/json',
        //     'Authorization' => "Bearer $token",
        //     "Cache-Control: no-cache"
        // ];

       // dd($postdata);
        $response =  Http::asForm()->post($url,$postdata);

       // dd($response->json());


        if ($response->successful()) {
         $status = true;
         $data = $response->json();
         $message = "";
     }
     else {
         $status = false;
         $data = [];
         $message = @$response->json();
     }
     return [
         "status" => $status,
         "message" => $message,
         "data" => $data
     ];

     }
     catch (Throwable $throwable) {
        $message = $throwable->getMessage();
        return ["status" => false, "message" => $message, "data" => []];
     }

}



     function  generateHash($string)
     {

           return hash_hmac('SHA256',$string,false);
     }

     function  IsHashValid($stringHashed, $inputHash)
     {

            if (  generateHash($stringHashed) ===  $inputHash   )
            return true;
            else
            return false;
}

function redirectWithMsg($url,$message,$type='error')
 {
     if($message == '' || $message == false)
     return Redirect::to($url);
    return Redirect::to($url)->with($type,$message)->send();

 }













   function getGateways() {

      $g = [
        'paystack',
        'interswitch',
        'flutterwave'
      ];
      return $g;

   }







