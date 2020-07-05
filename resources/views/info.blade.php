<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
$experts= array(array("William Jordan", "Doctor", "Anabar","New Zealand Standard Time (GMT +12)","6 AM -> 5 PM"),
    array("Qusai shawa","Civil Engineer","Syria","Eastern European Summer Time(GMT +4)","6 AM -> 12PM"),
    array("Shimaa Badawy", "Computer Engineer", "Egypt","Eastern European Summer Time(GMT+2)","1PM -> 2 PM"));
$ExpertOne = $experts[(int)request()->route()->id];
?>
<div class="container">
    <img src="https://i.stack.imgur.com/34AD2.jpg"  style="width:25%;">
    <div>
        {{$ExpertOne[0]}}
    </div>
    <div>
        {{$ExpertOne[1]}}
    </div>
    <div style="border-style: solid;">
        <div>
            Country: {{$ExpertOne[2]}}
        </div>
        <div>
            Working hours:  {{$ExpertOne[4]}}
        </div>
    </div>
    <form>
        <input class = "button" type="button" value="Book now" onclick="window.location.href='http://appointments.algoroot.com/appointments/{{request()->route()->id}}'" />
    </form>
</div>


</body>
</html>

