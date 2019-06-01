<?php
$con = mysqli_connect("192.168.0.35","root","BUmoSfyO3Gozq5uK","mukeshjewellers"); 
// // $con = mysqli_connect("localhost","virarcit_mukeshj","-H.3Kq67{sMz","virarcit_mukesj");
$currency			= '₹ '; //currency symbol
$imageServerIp = "http://192.168.0.35/mjbackend/uploads/";
$apiUrl = "http://192.168.0.35/mjbackend/index.php/API/";
// $imageServerIp = "http://virarcity.com/mjbackend/uploads/";
// $apiUrl = "http://virarcity.com/mjbackend/index.php/API/";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to Database: " . mysqli_connect_error();
  }



  function callAPI($method, $url, $data){
    $curl = curl_init();
 
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }
 
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL,'http://192.168.0.35/mjbackend/index.php/API/'.$url);
   //  curl_setopt($curl, CURLOPT_URL,'http://virarcity.com/mjbackend/index.php/API/'.$url);
   // if (isset($_COOKIE['PHPSESSID']) && isset($_COOKIE['ci_session'])){
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      //  'Cookie: PHPSESSID='.$_COOKIE['PHPSESSID'].'; ci_session='.$_COOKIE['ci_session'],
       'Content-Type: application/json',
    ));
   // }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   //  $cookiesFile = 'cookies.txt';
   //  curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiesFile); // write
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
 }
?>