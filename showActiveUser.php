<?php
$url = "http://18.219.29.53:5000/active_user";
//$curl = curl_init($url);
$json = file_get_contents($url);
file_put_contents('showActiveUser.json', $json);
//echo hhhhh;
?>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <script src="assets/js/jquery-1.10.2.js">
    </script>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>



</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    User List
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="table.html">
                        <i class="pe-7s-note2"></i>
                        <p>Active Users List</p>
                    </a>

            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Active Users List</a>
                </div>
                <div class="collapse navbar-collapse">


                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">
                                Account
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List of users</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>ID</th>


                                    </thead>
                                    <script language="JavaScript">
                                        var id = 0;
                                        $(document).ready(function () {
                                            $.getJSON("showActiveUser.json", function (result) {

                                                var json = result.message.users;

                                                for (var i = 0; i < json.length; i++) {
                                                    id = json[i];
                                                    document.getElementById('value')
                                                    $("#info").append(
                                                        '<tr><td>' + json[i] + '</td><td><a href= "getDetail.php?id=' + id + '"<p>'
                                                        + "Monitoring" +'</p></a><td>'+'<a href= "deactiveForAdmin.php?id=' + id + '"<p>'
                                                        +"Deactivate" + '</p ></a ></td></tr>');

                                                    //console.log(id);
                                                    //console.log(json[i][1]);
                                                }
                                                //console.log(json[0][0]);
                                            })
                                        })
                                        /*function myclick(ids){
                                            var url = "test.php?id=" + ids;
                                           // window.location.href = url;
                                            console.log(ids);
                                        }*/
                                    </script>
                                    <tbody id="info">
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <a href="addUser.html">
                        <p>Add</p>
                    </a>
                </div>
            </div>
            <a href="showUser.php">
                <p>back</p>
            </a>
        </div>
            </div>
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

