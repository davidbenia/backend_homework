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
        #page{
            color: white;
            font-size: 50px;
            font-weight: bold;
            background-color: darkgray;
            padding: 5px;
            text-align: center;
        }
        .catFact{
            margin-bottom: 100px;
            padding-left: 10px;
        }
        .boredFact{
            margin-bottom: 100px;
            padding-left: 10px;
        }
        .dogPic{
            margin-bottom: 100px;
            padding-left: 10px;
        }
        .catFact #catLabel{
            color: white;
            background-color: darkgray;
            display: inline;
            font-size: 25px;
            font-weight: bold;
            padding: 5px;
        }
        .catFact #cFact{
            color: #3d3d3d;
            font-weight: bold;
            font-size: 25px;
            word-wrap: break-word;
        }
        .boredFact #bFact{
            color: #3d3d3d;
            font-weight: bold;
            font-size: 25px;
            word-wrap: break-word;
        }
        .boredFact #boredLabel{
            color: white;
            background-color: darkgray;
            display: inline;
            font-size: 25px;
            font-weight: bold;
            padding: 5px;
        }
        .dogPic #dogLabel{
            color: white;
            background-color: darkgray;
            display: inline;
            font-size: 25px;
            font-weight: bold;
            padding: 5px;
        }
        .dogPic #dImg{
            max-width:300px;
            max-height:300px;
            width: auto;
            height: auto;
        }
       
        #homebutton{
            position: absolute;
            bottom: 20%;
            left: 75%;
        }
        #homebutton #refresh{
            position: absolute;
            bottom: 100px;
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
        <p id="page">Random Stuff</p>
        <div class="catFact">
            <p id='catLabel'>Random cat fact:</p><br>
            <p id='cFact'>pending</p>
        </div>
        <div class="boredFact">
            <p id='boredLabel'>Random activity if you're bored:</p><br>
            <p id='bFact'>pending</p>
        </div>
        <div class="dogPic">
            <p id='dogLabel'>Random dog picture:</p><br><br>
            <img id='dImg'>
        </div>
        <div id="homebutton">
            <a id='refresh' href="">Refresh</a><br>
            <a href="/">Home Page</a>
        </div>

        <script>
            const getCat = async () =>{
                let fact = await fetch('https://catfact.ninja/fact');
                fact = await fact.json();
                document.getElementById('cFact').innerHTML = fact['fact'];
            }
            const getBored = async () =>{
                let fact = await fetch('https://www.boredapi.com/api/activity');
                fact = await fact.json();
                let elem = document.getElementById('bFact');
                elem.innerHTML = fact['activity'];
                elem.style.fontSize = "25px";
                elem.style.fontWeight = 'bold';
                elem.style.color = '#3d3d3d';
            }
            const getDog = async () =>{
                let pic = await fetch('https://dog.ceo/api/breeds/image/random');
                pic = await pic.json();
                pic = pic['message'];
                let elem = document.getElementById('dImg');
                elem.style.width = '300px';
                elem.style.height = '300px';
                elem.src = pic;
            }

            getCat();
            getBored();
            getDog();
        </script>
    </div>
</body>
</html>