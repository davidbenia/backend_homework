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
        .homepageHeader{
            position: relative;
            left: 35%;
            align-items: center;
            justify-content: center;
            background-color: darkgray;
            padding: 0px 10px 0px 10px;
            width: 500px;
            height:100px
        }
        .homepageHeader p{
            font-size: 70px;
            font-weight: bold;
            text-align: center;
            color: white;
        }
        .routeContainer{
            position: absolute;
            display: inline-flex;
            top:30%;
            left: 25%;
            justify-content: center;
            align-items: center;
        }
        .routeContainer #about-me a{
            position: relative;
            left: 25%;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            color: white;
            background-color: darkgray;
            padding: 5px;
            text-decoration: none;
        }
        .routeContainer #experience a{
            position: relative;
            left: 50%;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            color: white;
            background-color: darkgray;
            padding: 5px;
            text-decoration: none;
        }
        .routeContainer #example-page-1 a{
            position: relative;
            left: 75%;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            color: white;
            background-color: darkgray;
            padding: 5px;
            text-decoration: none;
        }
        .routeContainer #example-page-2 a{
            position: relative;
            left: 100%;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            color: white;
            background-color: darkgray;
            padding: 5px;
            text-decoration: none;
        }
    </style>
    <title>Homework 1</title>
</head>
<body>
    <div class="container">
        <div class="homepageHeader">
            <p>David Benia</p>
        </div>
        <div class="routeContainer">
            <div id="about-me">
                <a href="about-me">about me</a>
            </div>
            <div id="experience">
                <a href="experience">my experience</a>
            </div>
            <div id="example-page-1">
                <a href="example-page-1">example page 1</a>
            </div>
            <div id="example-page-2">
                <a href="example-page-2">example page 2</a>
            </div>
        </div>
    </div>
</body>
</html>