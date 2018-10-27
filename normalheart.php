<?php
echo "hello world";
$count = $_GET["id"];
//echo "$count";

$url = "http://18.219.29.53:5000/active_user/";
$url .= $count;
$url .= "/heart_rate";
$curl = curl_init($url);
$json = file_get_contents($url);
//downing the person detail to b.json file
file_put_contents('heartrate.json', $json);
//echo $url;
?>

<!doctype html>
<html lang="en">
<script language="JavaScript">
    setTimeout(function(){location.reload()},3000); //refresh
</script>
<script src="assets/js/jquery-1.10.2.js">
</script>
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <script type="text/javascript">
        //floating windows
        /*window.onscroll = function () {
            var div = document.getElementById("divSuspended");
            div.style.top = document.body.scrollTop;
        }
        window.onresize = window.onscroll;*/

    </script>
    <title>HeartRate</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Heart Rate
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Heart Rate</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Heart Rate</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">
                                Account
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">

            <div id="info">

            </div>

            <pre name="code" class="html"><div style="position: relative;">
                <div style="position: absolute;">

            <img id="arrow" width="200" height="200" style="border:12px #987cb9 "></div>
            <img id="picture" width="900" height="600" style="border:12px #987cb9 ">

            <div class="imgwd">　


            </div>
            <font size=" 100">

                <div class="words" id="heart" style="position:absolute; z-index:2; left:420px; top:280px">
                </div>
            </font>
            <style>
                imgwd {
                    position: relative;
                }

                words {
                    position: absolute;
                }
            </style>
            <embed id="1sound" align="center" border="0" width="2" height="2" loop="true" autostart="true"></embed>



            <script language="JavaScript">
                //times
                var i = 0;
                //manhearbeat
                var maxbeat = 0;
                //心率
                var beats = 0;
                //exception
                var exception = 0;
                var d = document.getElementById("heart");
                var str = i + ',' + exception;
                var id = 0;


                $(document).ready(function () {
                    $.getJSON("heartrate.json", function (result) {
                        // $.getJSON("get.json", function (result) {
                        //console.log(result);
                        // d = result.PID;
                        d.innerHTML = result.message.heart_rate;
                        beats = result.message.heart_rate;
                        //maxbeat = result.HR_Max;
                        //setCookie('result', str, 365);
                        //deteleCookie('result');
                        i = result.message.heart_count;
                        console.log(i);
                        //i = spit();
                        exception = spit1();
                        maxbeat = spit2();
                        id = spit3();
                        $("#info").append(
                            '<tr><td><a href= "deactive.php?id=' + id + '"<p>'
                            + "Deactivate" + '</p></a></td></tr>');

                        /*if (i > 360){
                            deleteCookie('result');
                        }
                       // console.log(beats);
                        //console.log(maxbeat);*/
                        //warming up
                        if (i < 31 || i > 330) {
                            //normal
                            if (beats >= 0.45 * maxbeat && beats <= 0.55 * maxbeat) {
                                //green heart
                                document.getElementById("picture").src = "green.png";
                                i++;
                                exception = 0;
                                str = i + ',' + exception + ',' + maxbeat + ',' + id;
                                setCookie('result', str, 365);
                                //setcookie, time +1 , exception = 0;
                            }

                            //document.getElementById("1sound").src = "1.mp3";
                            //too high
                            else if (beats > 0.55 * maxbeat) {
                                //red heart
                                if (exception > 5) {
                                    document.getElementById("picture").src = "red.png";
                                    document.getElementById("arrow").src = "down.png";
                                    i++;
                                    exception++;
                                    str = i + ',' + exception + ',' + maxbeat + ',' + id;
                                    setCookie('result', str, 365);
                                    window.location.href = "exceptheart.php?id=" + id;

                                    //setcookie, time +1 ,exception = 0
                                    //show background.html
                                }
                                // yellow heart
                                else {
                                    document.getElementById("picture").src = "yellow.png";
                                    document.getElementById("arrow").src = "down.png";
                                    i++;
                                    exception++;
                                    str = i + ',' + exception + ',' + maxbeat + ',' + id;
                                    setCookie('result', str, 365);
                                    //setcookie time +1, exception +1
                                }

                            }
                            //too low
                            else {
                                if (exception > 5) {
                                    document.getElementById("picture").src = "red.png";
                                    document.getElementById("arrow").src = "up.png";
                                    i++;
                                    exception++;
                                    str = i + ',' + exception + ',' + maxbeat + ',' + id;
                                    setCookie('result', str, 365);
                                    window.location.href = "exceptheart.php?id=" + id;
                                    //setcookie, time +1 ,exception = 0
                                    //show background.html
                                }
                                else {
                                    document.getElementById("picture").src = "yellow.png";
                                    document.getElementById("arrow").src = "up.png";
                                    //setcookie time +1, exception +1
                                    i++;
                                    exception++;
                                    str = i + ',' + exception + ',' + maxbeat + ',' + id;
                                    setCookie('result', str, 365);
                                }
                            }
                        }

                        //exercising
                        else {
                            //normal green heart
                            if (beats >= 0.65 * maxbeat && beats <= 0.75 * maxbeat) {
                                //green heart
                                document.getElementById("picture").src = "green.png";
                                i++;
                                exception = 0;
                                str = i + ',' + exception + ',' + maxbeat + ',' + id;
                                setCookie('result', str, 365);
                                //setcookie, time +1 , exception = 0;
                            }

                            //document.getElementById("1sound").src = "1.mp3";
                            //too high
                            else if (beats > 0.75 * maxbeat) {
                                // red heart
                                if (exception > 5) {
                                    document.getElementById("picture").src = "red.png";
                                    document.getElementById("arrow").src = "down.png";
                                    //setcookie, time +1 ,exception = 0
                                    //show background.html
                                    i++;
                                    exception++;
                                    str = i + ',' + exception + ',' + maxbeat + ',' + id;
                                    setCookie('result', str, 365);
                                    window.location.href = "exceptheart.php?id=" + id;

                                }
                                //yellow heart
                                else {
                                    document.getElementById("picture").src = "yellow.png";
                                    document.getElementById("arrow").src = "down.png";
                                    i++;
                                    exception++;
                                    str = i + ',' + exception + ',' + maxbeat + ',' + id;
                                    setCookie('result', str, 365);
                                    //setcookie time +1, exception +1
                                }
                            }
                            //too low
                            else {
                                if (exception > 5) {
                                    document.getElementById("picture").src = "red.png";
                                    document.getElementById("arrow").src = "up.png";
                                    //setcookie, time +1 ,exception = 0
                                    //show background.html
                                    i++;
                                    exception++;
                                    str = i + ',' + exception + ',' + maxbeat + ',' + id;
                                    setCookie('result', str, 365);
                                    window.location.href = "exceptheart.php?id=" + id;
                                }
                                else {
                                    document.getElementById("picture").src = "yellow.png";
                                    document.getElementById("arrow").src = "up.png";
                                    //setcookie time +1, exception +1
                                    i++;
                                    exception++;
                                    str = i + ',' + exception + ',' + maxbeat + ',' + id;
                                    setCookie('result', str, 365);
                                }
                            }
                        }

                    })
                });
                //maxbeat = alert(a.maxs);
                //次数
                //console.log(beats);

                //d.innerHTML = beats;
                //warmming up

                /*else if (i >100){
                    document.getElementById("picture").src = "red.png";
                    document.getElementById("1sound").src = "5.mp3";}
                else{
                    document.getElementById("picture").src = "green.png";

                }*/
                function spit() {
                    if (checkCookie()) {
                        var str = getCookie('result');
                        var arr = str.split(',');
                        //document.write(arr[1]);
                    }
                    console.log(arr[0]);
                    return (arr[0]);


                };

                function spit1() {

                    if (checkCookie()) {
                        var str = getCookie('result');
                        var arr = str.split(',');
                        console.log(arr[1]);
                        //document.write(arr[1]);
                    }
                    return (arr[1]);
                };

                function spit2() {

                    if (checkCookie()) {
                        var str = getCookie('result');
                        var arr = str.split(',');
                        console.log(arr[2]);
                        //document.write(arr[1]);
                    }
                    return (arr[2]);
                };

                function spit3() {

                    if (checkCookie()) {
                        var str = getCookie('result');
                        var arr = str.split(',');
                        console.log(arr[3]);
                        //document.write(arr[1]);
                    }
                    return (arr[3]);
                };


                function setCookie(c_name, value, expiredays) {
                    var exdate = new Date();
                    exdate.setDate(exdate.getDate() + expiredays);
                    document.cookie = c_name + "=" + escape(value) + ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString());
                }

                function getCookie(c_name) {
                    if (document.cookie.length > 0) {
                        c_start = document.cookie.indexOf(c_name + "=");
                        if (c_start != -1) {
                            c_start = c_start + c_name.length + 1;
                            c_end = document.cookie.indexOf(";", c_start);
                            if (c_end == -1) c_end = document.cookie.length;
                            return unescape(document.cookie.substring(c_start, c_end));
                        }
                    }
                    return "";
                }

                function deteleCookie(c_name) {
                    //到时候 cookie异常值要设定为0，次数不变
                    var temp = 0 + ',' + 0;
                    setCookie(c_name, temp, 365);
                }

                function checkCookie() {
                    var username = getCookie('result')
                    if (username != null) {
                        return true;
                    }
                    else {
                        return false;
                    }
                }
            </script>
        </div>

        </pre>
    </div>
</div>

</div>
</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


</html>
