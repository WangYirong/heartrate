<?php
$url = "http://18.219.29.53:5000/register_session";
$curl = curl_init($url);


//json context
$jsondata= ['id'=>"002",'heart_rate'=>"60"];
//encode the json
$json_string = json_encode($jsondata);
//genertate a new json file
file_put_contents('test.json', $json_string);
//echo "success";
echo "<script>alert('success');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
//tell CURL we want to send a POST request
curl_setopt($curl,CURLOPT_POST,1);
//attach the encoded json to post fields
curl_setopt($curl, CURLOPT_POSTFIELDS, $json_string);
//Set the content type to application/json
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//execute the request
$result = curl_exec($curl);
echo $result;