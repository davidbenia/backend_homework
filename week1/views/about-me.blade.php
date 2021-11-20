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
            flex-direction: column;
            position: absolute;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            background-color: gainsboro;
        }
        .header{
            align-items: center;
            justify-content: center;
            width: 100%;
            height:100px;
            background-color: darkgray;
        }
        .header p{
            font-size: 70px;
            font-weight: bold;
            text-align: center;
            color: white;
        }
        .content{
            justify-content: center;
            align-items: center;
        }
        .content p{
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }
        #homebutton{
            margin-top: 25%;
            margin-left: 85%;
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
        <div class="header">
            <p>About Me</p>
        </div>
        <div class="content">
            <p>
                Hello, my name is David.<br/><br/>
                I am an IT bachelor at BTU, on my 7th semester.<br/><br/>
                I am interested in software development, system/network administration and database management.<br/><br/>
                I am not good at front-end :)
            </p>
        </div>
        <div id="homebutton">
            <a href="/">Home Page</a>
        </div>
    </div>
</body>
</html>