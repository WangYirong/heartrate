<?php

$id = $_GET['id'];
$url = "http://18.219.29.53:5000/active_session/";
$url.=$id;
$curl = curl_init($url);

//tell CURL we want to send a POST request
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,True);
curl_setopt($curl, CURLOPT_HEADER, false);
//execute the request
$result = curl_exec($curl);
echo $result;
$json = json_encode($result);
file_put_contents('activeUser.json', $result);

//$url1 = "getDetail.php?id=";
//$url1.= $id;
//echo $url1;
//header("Location:$url1");
//echo "hello world";
?>
<html>
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $.getJSON("activeUser.json", function (result) {
           var act = result.code;
           var message = result.message;
           var arr = message.split(" ");
           if (act == "200") {
               console.log(arr[1]);

               $("#info").append(
                   '<tr><td><a href= "getDetail.php?id=' + arr[1] + '"<p>'
                   + "Monitoring" + '</p ></a ></td></tr>');
           }

            //console.log(id);
            //console.log(json[i][1]);

            //console.log(json[0][0]);
        })
    })
</script>
    <div id = "info">
        </div>

</html>