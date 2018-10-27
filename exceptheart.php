<?php
echo "hello world";
$count = $_GET["id"];
//echo "$count";

$url = "http://18.219.29.53:5000/active_user/";
$url.= $count;
$url.="/heart_rate";
$curl = curl_init($url);
$json = file_get_contents($url);
//downing the person detail to b.json file
file_put_contents('heartrate.json', $json);
//echo $url;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="assets/js/jquery-1.10.2.js">
    </script>
    <title>Title</title>
</head>
<body id="body" background="mohu.jpg"

      style=" background-repeat:no-repeat ;

background-size:100% 100%;

background-attachment:fixed;">

<script language="JavaScript">

    setTimeout(function(){location.reload()},3000); //refresh
</script>
<script>
    var elem = document.getElementById("body");

   elem.onclick = function() {
        req = elem.requestFullScreen || elem.webkitRequestFullScreen || elem.mozRequestFullScreen;
        req.call(elem);
    }
    elem.onmousewheel = function() {
        req = elem.requestFullScreen || elem.webkitRequestFullScreen || elem.mozRequestFullScreen;
        req.call(elem);
    }



</script>
<div class="content">
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

                top.window.resizeTo(screen.availWidth, screen.availHeight);
                var i = 0;
                //最大心率
                var maxbeat = 0;
                //心率
                var beats = 0;
                //exception
                var d = document.getElementById("heart");
                var exception = 0;
                var id = 0;
                //deteleCookie('result');
                var str = i + ',' + exception;

                console.log(i);
                console.log(exception);
                //alert("Warning");
                $(document).ready(function () {
                    $.getJSON("heartrate.json", function (result) {
                        //console.log(result);
                        // d = result.PID;
                        d.innerHTML = result.message.heart_rate;
                        beats = result.message.heart_rate;
                        //maxbeat = result.HR_Max;
                        i=result.message.heart_count;
                        console.log(i);
                        //i = spit();
                        exception = spit1();
                        maxbeat = spit2();
                        id = spit3();
                        /*if (i > 360){
                            deleteCookie('result');
                        }*/
                        if (i < 31 || i > 300) {
                            //normal
                            if (beats >= 0.45 * maxbeat && beats <= 0.55 * maxbeat) {
                                //green heart
                                document.getElementById("picture").src = "green.png";
                                i++;
                                exception = 0;
                                str = i + ',' + exception  +','+maxbeat + ',' +id;
                                setCookie('result', str, 365);
                                window.location.href = "normalheart.php?id="+id;
                                //setcookie, time +1 , exception = 0;
                            }

                            //document.getElementById("1sound").src = "1.mp3";
                            //too high
                            else if (beats > 0.55 * maxbeat) {
                                //red heart
                                document.getElementById("picture").src = "red.png";
                                document.getElementById("arrow").src = "down.png";
                                i++;
                                exception++;
                                str = i + ',' + exception  +','+maxbeat + ',' +id;
                                setCookie('result', str, 365);
                            }
                            //too low
                            else {
                                document.getElementById("picture").src = "red.png";
                                document.getElementById("arrow").src = "up.png";
                                i++;
                                exception++;
                                str = i + ',' + exception  +','+maxbeat + ',' +id;
                                setCookie('result', str, 365);
                            }
                        }

                        //exercising
                        else {
                            //normal
                            if (beats >= 0.65 * maxbeat && beats <= 0.75 * maxbeat) {
                                //green heart
                                document.getElementById("picture").src = "green.png";
                                i++;
                                exception = 0;
                                str = i + ',' + exception  +','+maxbeat + ',' +id;
                                setCookie('result', str, 365);
                                window.location.href = "normalheart.php?id="+id;
                                //setcookie, time +1 , exception = 0;
                            }

                            //document.getElementById("1sound").src = "1.mp3";
                            //too high
                            else if (beats > 0.75 * maxbeat) {
                                //red heart
                                document.getElementById("picture").src = "red.png";
                                document.getElementById("arrow").src = "down.png";
                                i++;
                                exception++;
                                str = i + ',' + exception  +','+maxbeat + ',' +id;
                                setCookie('result', str, 365);
                            }
                            //too low
                            else {
                                document.getElementById("picture").src = "red.png";
                                document.getElementById("arrow").src = "up.png";
                                i++;
                                exception++;
                                str = i + ',' + exception  +','+maxbeat + ',' +id;
                                setCookie('result', str, 365);
                            }
                        }

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
                                //document.write(arr[1]);
                            }
                            console.log(arr[1]);
                            return (arr[1]);
                        };

                        function spit2() {
                            if (checkCookie()) {
                                var str = getCookie('result');
                                var arr = str.split(',');
                                //document.write(arr[1]);
                            }
                            console.log(arr[2]);
                            return (arr[2]);
                        };
                        function spit3() {
                            if (checkCookie()) {
                                var str = getCookie('result');
                                var arr = str.split(',');
                                //document.write(arr[1]);
                            }
                            console.log(arr[3]);
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

                    })
                });


            </script>
        </div>

            </pre>
</div>
</div>

</div>
</body>
</html>