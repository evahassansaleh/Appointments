<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href= asset('css/app.css') rel= stylesheet>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
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
    //echo date_default_timezone_get();
    //echo date('Y/m/d H:i:s');

    //echo "The Timezone is: ",date_default_timezone_get();

    ?>

    <body>
        <div>
            <div class="container" id="app">
                <example-component ip="{{getUserIpAddr()}}" expertOffset="{{180}}"  :start="{{12*60}}" :end="{{15*60}}" ></example-component>
            </div>
        </div>
       <script src="js/app.js"></script>
    </body>
</html>
