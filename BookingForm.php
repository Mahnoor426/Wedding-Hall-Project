<!DOCTYPE html> 
<html>
    <head>
        <title>Booking Form</title>
        <!-- <script src="jquery-3.3.1.min.js"></script> -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>           
            .container{
                border: 5px solid rgb(117, 36, 36);
                width: 600px;
                text-align: center;
                background-color: rgba(158, 75, 75, 0.253);        
                left:32%;
                position:absolute;       
            }
            .yesbtn{
                color: rgb(117, 36, 36);
                height:30px;
                width: 80px;
                border:3px solid rgb(117, 36, 36);
                font-size:20px;
            }
            .tee{
                height:90px;
                background-color: rgb(134, 57, 57);
                text-align: center;
                margin-top: 0px;
                color:white;
            }
            .in{
                /*border: 2px solid rgb(117, 36, 36);*/
                height:100px;
                font-size: 20px;
                text-align: left;
                margin-left: 20px;
            }
            input[type=text]{
                width: 500px;
                border: 2px solid #aaa;
                border-radius: 15px;
                padding: 8px;
                margin: 10px;
                box-sizing: border-box;
                outline:none;
            }
            input[type=date]{
                width: 500px;
                border: 2px solid #aaa;
                border-radius: 15px;
                padding: 8px;
                margin: 10px;
                box-sizing: border-box;
                outline:none;
            }
            input[type=time]{
                width: 500px;
                border: 2px solid #aaa;
                border-radius: 15px;
                padding: 8px;
                margin: 10px;
                box-sizing: border-box;
                outline:none;
            }
            input[type=date]:focus{
                border-color:dodgerBlue;
                box-shadow:0 0 8px 0 dodgerBlue;
            }
            input[type=time]:focus{
                border-color:dodgerBlue;
                box-shadow:0 0 8px 0 dodgerBlue;
            }
            input[type=text]:focus{
                border-color:dodgerBlue;
                box-shadow:0 0 8px 0 dodgerBlue;
            }
            input[type=submit]{
                height:50px;
                width: 150px;
                background-color:rgb(117, 36, 36);
                color: white;
                font-size: 25px;
                border: 2px solid white;
                margin-bottom: 10px;
                border-radius: 20px;
            }
            #def{
                display:none;
            }
            #g{
                display:none;
            }
            .submitbtn{
                height:60px;
                width: 160px;
                background-color:rgb(117, 36, 36);
                color: white;
                font-size: 25px;
                border: 2px solid white;
                margin-bottom: 10px;
                border-radius: 20px;
            }
        </style>
    </head>
    <body>
    <?php
$conn= mysqli_connect("localhost","root","");
if(!$conn)
{
    echo "<b>Unable to connect with web server</b>";
    die();
}
else
/*echo "Connected with web server";*/

$db=mysqli_select_db ($conn, "weddinghalls");
if(!$db)
{
    echo "<br><b>Unable to connect with Database</b>";
    die();
}
else{
/*echo "<br><b>Connected with database</b>";*/}
$query="select * from hallinfo";
$answer=mysqli_query($conn,$query);
$rows=mysqli_fetch_assoc($answer);
?>
    <div class="container">
        <div class="one">
            <div class="two">
                <div class="tee">
                    <br>
                    <h1>Booking Form</h1>
                    <br>
                </div>
                <div class="bodi">
                    <form action=" " method="POST">
                        <div class="in">
                            <br>  
                            <label for="hallNo">Hall ID </label>
                            <input type="text" class="init" name="hallNo" value="<?php echo $rows['hallID']?>" /><br>
                        </div>
                        <div class="in">
                            <br>
                            <label for="clientNo">Enter your "UserID" </label>
                            <input type="text" class="init" name="clientNo" required/><br>
                        </div>
                        <div class="in">
                            <br>
                            <label for="dateOfEvent">Select the date for which you want to book this hall:</label><br>
                            <input type="date" class="init" name="dateOfEvent" required/>
                        </div>
                        <div class="in">
                            <label for="time">Enter the time of Event:</label><br>
                            <input type="time" class="init" name="time" required/>
                        </div>
                        <div class="in">
                            <label for="payment">Select Payment Method </label><br><br>
                            Cash<input type="checkbox" class="init" name="payment" id="abc" onclick="checkMe() required"/>
                            Credit Card<input type="checkbox" class="init" name="payment" id="xyz" onclick="chekMe()"/>
                            <p id="def">What is this</p>
                            <p id="g">Problem</p>
                        </div>
                       <button type="submit" id="button" name="submit" class="submitbtn" >Submit</button>                       
                        </div>
                        <div id="spinner" style="display:none">
  <img src="https://media.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.gif" width="25">
</div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('#button').click(function(){
    $("#spinner").css('display', 'block');
    setTimeout(function (){
       location.href = 'success.html';
    }, 3000);
  });
});
</script>
    <?php

if(isset($_POST['submit']))
{
    $clientNo=$_POST['clientNo'];
    $hallNo=$_POST['hallNo'];
    $dateOfEvent=$_POST['dateOfEvent'];
    $time=$_POST['time'];
$results=mysqli_query($conn,"insert into bookinginfo(clientNo,hallNo,dateOfEvent,time) values ('$clientNo','$hallNo','$dateOfEvent','$time')");

if ($results==true)
{ 
}
else
echo "FALSE";
}
?>

<script>   
//     function func(){
//         swal({
//   title: "Good job!",
//   text: "Your Hall is now booked. You can contact with the hall manager for further details.",
//   icon: "success red.jpg",
//   button: "OK",
// });
    // }
    function checkMe(){
        var a=document.getElementById("abc");
        var text= document.getElementById("def");
        if (a.checked==true){
            swal({
            title: "Remember!",
            text: "You will have to come to the hall that you have booked two days before the Event in order to do the payment by cash",
            icon: "info",
            button: "OK",
            });;
        }
        else{
            text.style.display="none";
        }
    }
    function chekMe(){
        var b=document.getElementById("xyz");
        var tex= document.getElementById("g");
        if (b.checked==true){
            location.href="credit.html";
        }
        else{
            tex.style.display="none";
        }
    }
</script>
    </body>
</html>