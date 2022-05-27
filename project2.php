<!DOCTYPE html>
<html>
<head>
<style>
img{
 border-radius: 20px;
 padding: 5px;
 max-width: 25%;
 height:auto;
}
h2 { font-weight:normal; }
</style>
</head>

<body style=
"display: block;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
 font-family: Arial, sans-serif;
 color: #ffffff;
 background-color: #1B262C;
 font-size: larger;
"
>

<div class="main-container" style=
"display: block;
margin: auto;
text-align: center;
"
>
<br>
<br>
<?php
  if (empty($_GET["userdata"])) {
    echo " 
        <h1>Countown Timer</h1>
        <h2>Enter date to countdown from! (please use the format: 'event'-Jun 25, 2022 16:00:00)</h2>
        <br>
        <br>
        ";

    echo "<form action='project2.php' method='GET'>" ;
    echo "  <textarea cols=80 rows=10 name='userdata'>"; 
    echo "enter event/date here, separated by semicolons ';'. EX: CS Midterm-Jun 25, 2022 16:00:00; PHYS122 Midterm-May 25, 2022 16:00:00; Graduation-Apr 23, 2022 16:00:00; Birthday-March 20, 2021 20:00:00" ;
    echo "  </textarea>" ;
    echo "  <input type=submit>" ;
    echo "</form>" ;

  } else {
    $dates = $_GET["userdata"] ;
    $datesarr = explode(";", $dates);
    $number = count($datesarr);

    for($i=0; $i<count($datesarr); $i++){
      $datessplit = explode("-", $datesarr[$i]);
      $wholething = $datesarr[$i];
      $datename = $datessplit[0];
      $actualdate = $datessplit[1];

      echo  "
            <div id='event-container_$i' style='
              width: 66%;
              margin-left:16.6666666667%;
              margin-bottom:30px;
              padding: 20px;
              background-color: #303841;
              border-radius: 30px;
              '
            >

            <h1>$datename</h1> 
            <h2>$actualdate</h2>
          
            ";
      echo "

            <div id='icon' style='
            margin-bottom:5px;
            '>
            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-calendar'><rect x='3' y='4' width='18' height='18' rx='2' ry='2'></rect><line x1='16' y1='2' x2='16' y2='6'></line><line x1='8' y1='2' x2='8' y2='6'></line><line x1='3' y1='10' x2='21' y2='10'></line></svg>
            </div>
            <span id='days_$i'></span>
            <span id='hours_$i'></span>
            <span id='mins_$i'></span>
            <span id='secs_$i'></span>
            <h2 id='end_$i'></h2>
            <script>
            // The data/time we want to countdown to
            var countDownDate_$i = new Date('$actualdate').getTime();
            
            // Run myfunc every second
            var myfunc_$i = setInterval(function() {
  
            var now = new Date().getTime();
            var timeleft = countDownDate_$i - now;
                
            // Calculating the days, hours, minutes and seconds left
            var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
                
            // Result is output to the specific element
            document.getElementById('days_$i').innerHTML = days + ' days '
            //if less than 1 day left, will show specific times 
            if (days <= 1){ 
            document.getElementById('hours_$i').innerHTML = hours + ' hrs ' 
            document.getElementById('mins_$i').innerHTML = minutes + ' mins ' 
            document.getElementById('secs_$i').innerHTML = seconds + ' secs ' 
            } else { 
              document.getElementById('hours_$i').innerHTML = '' 
              document.getElementById('mins_$i').innerHTML = ''
              document.getElementById('secs_$i').innerHTML = ''
            }
                
            // Display the message when countdown is over
            if (timeleft < 0) {
                clearInterval(myfunc_$i);
                document.getElementById('days_$i').innerHTML = ''
                document.getElementById('hours_$i').innerHTML = '' 
                document.getElementById('mins_$i').innerHTML = ''
                document.getElementById('secs_$i').innerHTML = ''
                document.getElementById('end_$i').innerHTML = 'TIME UP!!';
                document.getElementById('event-container_$i').style.color = '#39A2DB';

            }
            }, 1000);
            </script>
            
            
            </div>
            
            ";


    }
    
          

    echo "<br>"; 
  }  

?>
</div>
</body>
</html>