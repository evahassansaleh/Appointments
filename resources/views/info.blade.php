<!DOCTYPE html>
<html>
<body>

<h2>  Appointments </h2>

<p><strong>  Select</strong> Appointment Date: .</p>

<form action="/action_page.php">
    <label for="calender"> <Strong>Calendar</Strong> </label>
    <input type="date" id="calender" name="calender">
    <input type="submit" value="Submit">
</form>


<?php

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$ip = ( getUserIpAddr() == '127.0.0.1' ) ? "189.240.194.147" : getUserIpAddr() ;  //$_SERVER['REMOTE_ADDR']
$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
$ipInfo = json_decode($ipInfo);
$timezone = $ipInfo->timezone;
date_default_timezone_set($timezone);
echo date_default_timezone_get();
echo date('Y/m/d H:i:s');

echo "The Timezone is: ",date_default_timezone_get();

?>
<div class="container">


    <form>
        <div class="form-group">
            <label for="sel1"><Strong>Duration</Strong></label>
            <select class="form-control" id="sel1">
                <option>15 mins</option>
                <option>30 mins</option>
                <option>45 mins</option>
                <option>1 hour</option>
            </select>
            <br>

        </div>
        <div class="form-group">
            <label for="sel1"><Strong> Time slot </Strong></label>
            <select class="form-control" id="sel1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
            <br>

        </div>
    </form>
</div>


<div class="container">

    <h1>Laravel Bootstrap Timepicker</h1>

    <div style="position: relative">

        <strong>Timepicker:</strong>

        <input class="timepicker form-control" type="text">

    </div>

</div>

<script type="text/javascript">

    $('.timepicker').datetimepicker({

        format: 'HH:mm:ss'

    });

</script>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">

                </div>


            </div>
        </div>
    </body>
</html>
