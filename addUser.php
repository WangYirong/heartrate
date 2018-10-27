<?php
/**
 * Created by PhpStorm.
 * User: asita
 * Date: 2018/9/25
 * Time: 17:34
 */
class session{
}
$url = "http://18.219.29.53:5000/users";
$curl = curl_init($url);

$id = $_POST['id'];
$name = $_POST['name'];
$max = $_POST['max'];
$cool1 = ($max * 0.45);
$cool2 = ($max * 0.55);
$exercise1 = ($max * 0.65);
$exercise2 = ($max * 0.75);
$session = new session();
//json context
$jsondata= ['PID'=>$id,'PName'=>$name,'HR_Max'=> $max,'Cool_Zone'=>[$cool1,$cool2],
    'Exercise_Zone'=>[$exercise1,$exercise2],'Session'=>$session];
//encode the json
$json_string = json_encode($jsondata);
//genertate a new json file
file_put_contents('addUser.json', $json_string);
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
?>
