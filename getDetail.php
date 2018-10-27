<?php
echo "hello world";
$count = $_GET["id"];
//echo "$count";

$url = "http://18.219.29.53:5000/users/";
$url.= $count;
$url.="/detail";
$curl = curl_init($url);
//get the information from the server.
$json = file_get_contents($url);
//downing the person detail to json file
file_put_contents('getDetail.json', $json);
//echo $url;
?>

<html>
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
    /*function getParams(query){

        var vars = query.split("=");
        console.log(vars[1]);
    }

    getParams(window.location.search.substring(1));*/
    $(document).ready(function () {
        $.getJSON("getDetail.json", function (result) {
            console.log( result.detail.max_hr);
            var max =  result.detail.max_hr;
            var id = result.id;
            var string = 0 + ',' + 0  +','+ max + ','+id;
            setCookie('result', string, 365);
            window.location.href="normalheart.php?id="+id;
        })
    })


    function setCookie(c_name, value, expiredays) {
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + expiredays);
        document.cookie = c_name + "=" + escape(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString());
    }
</script>
</html>