<?php
require_once '../../config.php';
global $CFG;
$sandbox = get_config( 'local_otpverification', 'enable_sandbox');//die('here');
if($sandbox) {
  die('hello');
} else {
  die('hmmmm');
}
$curl = curl_init();

$authkeyUrl = "http://sms.tivre.com/httppush/send_smsSch.asp";
$paramArray = Array(
    "userid"=>"otp@mashmari.in",
    "password"=>"Apple!23",
    "msg"=>'123',
    "mobnum"=>'918448512927',
    "senderid"=>"mashmari",
    "msgId"=>"123456",
    "qrytype"=>"impalert",
    "TivreId"=>1
);
    
$parameters = http_build_query($paramArray);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
curl_setopt($curl, CURLOPT_POSTFIELDS, array());
echo "http://sms.tivre.com/httppush/send_smsSch.asp?$parameters";die();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://sms.tivre.com/httppush/send_smsSch.asp?$parameters",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 500,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "X-Custom-Header: value",
    "Content-Type: text/html",
    "Accept: text/html"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}