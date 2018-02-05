<?php
/**
 * Created by PhpStorm.
 * User: Alan Bosco
 * Date: 02-02-2018
 * Time: 03:55 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<div class="nav">
 <img src="enq.png">
</div>
<div class="content" style="color: white">
    <h1>Preliminary Round</h1>
    <p style="font-family: Arial, Helvetica, sans-serif;font-size: 2.5em;">Instructions</p>
    <p>1.Switch off Mobile phones and Smart watches.
        <br>2.Total 20 minutes of time.
        <br>3.Total 40 questions.
        <br>4.Negative Marks are there.
        <br>5.Correct answer will get 4 marks.
        <br>6.Wrong answer will get -1 marks.
        <br>7.Sit in teams only.
        <br>8.Discussions are only between tem members.
        <br>9.Marks are finalized by judges. </p>
</div>

<div id="container">
    <div id="inputArea"></div>

    <h1 id="time">0:00</h1>
</div>
<button href="rapid.php" class="button1" ">Next</button>
<script type="text/javascript">

    //timer function
    var secondsRemaining;
    var intervalHandle;

    function resetPage(){

        document.getElementById("inputArea").style.display = "block";

    }

    function tick(){
        // grab the h1
        var timeDisplay = document.getElementById("time");

        // turn the seconds into mm:ss
        var min = Math.floor(secondsRemaining / 60);
        var sec = secondsRemaining - (min * 60);

        //add a leading zero (as a string value) if seconds less than 10
        if (sec < 10) {
            sec = "0" + sec;
        }

        // concatenate with colon
        var message = min.toString() + ":" + sec;

        // now change the display
        timeDisplay.innerHTML = message;

        // stop is down to zero
        if (secondsRemaining === 0){
            alert("Done!");
            clearInterval(intervalHandle);
            resetPage();
        }

        //subtract from seconds remaining
        secondsRemaining--;

    }

    function startCountdown(){

        function resetPage(){
            document.getElementById("inputArea").style.display = "block";
        }

        // get countents of the "minutes" text box
        var minutes = 20;

        // check if not a number
        if (isNaN(minutes)){
            alert("Please enter a number");
            return; // stops function if true
        }

        // how many seconds
        secondsRemaining = minutes * 60;

        //every second, call the "tick" function
        // have to make it into a variable so that you can stop the interval later!!!
        intervalHandle = setInterval(tick, 1000);

        // hide the form
        document.getElementById("inputArea").style.display = "none";


    }
    window.onload = function(){

        // create input text box and give it an id of "min"
        var inputMinutes = document.createElement("input");
        inputMinutes.setAttribute("id", "minutes");
        inputMinutes.setAttribute("type", "text");

        //create a button
        var startButton = document.createElement("input");
        startButton.setAttribute("type","button");
        startButton.setAttribute("value","Start Countdown");
        startButton.onclick = function(){
            startCountdown();
        };

        //add to the DOM, to the div called "inputArea"
        //document.getElementById("inputArea").appendChild(inputMinutes);
        document.getElementById("inputArea").appendChild(startButton)

    }


</script>
</body>
</html>