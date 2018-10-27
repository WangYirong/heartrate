<?php

$id = $_GET['id'];
$url = "http://18.219.29.53:5000/active_user/";
$url.=$id;
$url.="/deactive";
$curl = curl_init($url);

//tell CURL we want to send a POST request
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,True);
curl_setopt($curl, CURLOPT_HEADER, false);
//execute the request
$result = curl_exec($curl);
echo $result;
$json = json_encode($result);
//file_put_contents('activeUser.json', $result);

//$url1 = "getDetail.php?id=";
//$url1.= $id;
//echo $url1;
//header("Location:$url1");
//echo "hello world";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deactivate</title>
</head>
<body>
<div>
    The user has already been deactivated.
</div>
</div>
<a href="showActiveUser.php">
    <p>back</p>
</a>
</div>
</body>
</html>
