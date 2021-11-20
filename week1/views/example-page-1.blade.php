<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            margin: 0;
        }
        .container{
            position: absolute;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            background-color: gainsboro;
        }
        #clock{
            color: white;
            font-size: 50px;
            font-weight: bold;
            background-color: darkgray;
            padding: 5px;
            text-align: center;
        }
        #homebutton{
            position: absolute;
            left: 45%;
        }
        #homebutton a{
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            padding: 5px;
            color: white;
            background-color: darkgray;
            text-decoration: none;
        }
    </style>
    <title>Homework 1</title>
</head>
<body>
    <div class="container">
        <p id="clock">pending</p>
        <script>
            const clock = function(){
                let date = new Date();
                let time = `${date.getHours()}:${date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes()}:${date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds()}`;
                document.getElementById('clock').innerHTML = time;
            }
            setInterval(() => clock(), 1000);
        </script>
        <div id="homebutton">
            <a href="/">Home Page</a>
        </div>
    </div>
</body>
</html>