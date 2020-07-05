<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Experts</h2>
    <div class="media">
        <div class="media">
            <img src="https://i.stack.imgur.com/34AD2.jpg"  class="media-object" style="width:70px">
        </div>
        <div class="media-body">
            <h4 class="media-heading">William Jordan <small><i>Doctor </i> </small></h4>

            <form action="http://appointments.algoroot.com/info/0">
                <button type="submit" value="button1">More Info</button>
            </form>


            <!-- Nested media object -->
            <div class="media">
                <div class="media">
                    <img src="https://i.stack.imgur.com/34AD2.jpg" class="media-object" style="width:70px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Quasi Shawa <small><i>Civil Engineer</i></small></h4>
                    <form action="http://appointments.algoroot.com/info/1">
                        <button type="submit" value="button2">More Info</button>
                    </form>

                    <!-- Nested media object -->
                    <div class="media">
                        <div class="media">
                            <img src="https://i.stack.imgur.com/34AD2.jpg" class="media-object" style="width:70px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Shimaa Badawy <small><i>Computer Engineer</i></small></h4>
                            <form action="http://appointments.algoroot.com/info/2">
                                <button type="submit" value="button3">More Info</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
