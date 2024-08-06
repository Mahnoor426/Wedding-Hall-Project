<!DOCTYPE html> 
<html>
    <head>
        <title>Booking Form</title>
        <style>
            
            .container{
                border: 5px solid rgb(117, 36, 36);
                width: 600px;
                text-align: center;
                background-color: rgba(158, 75, 75, 0.253);
                left:32%;
                position:absolute;
                border-radius: 10px;
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
            input[type=Password]:focus{
                border-color:dodgerBlue;
                box-shadow:0 0 8px 0 dodgerBlue;
            }
            input[type=Password]{
                width: 500px;
                border: 2px solid #aaa;
                border-radius: 15px;
                padding: 8px;
                margin: 10px;
                box-sizing: border-box;
                outline:none;
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
            .bookbtn{
                height:80px;
                width: 250px;
                background-color:rgb(117, 36, 36);
                color: white;
                font-size: 25px;
                border: 5px solid white;
                margin-bottom: 10px;
                border-radius: 20px;
            }
            .yesbtn{
                color: rgb(117, 36, 36);
                height:30px;
                width: 80px;
                border:3px solid rgb(117, 36, 36);
                font-size:20px;
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
$query="select * from clientinfo";
$answer=mysqli_query($conn,$query);
$rows=mysqli_fetch_assoc($answer);
?>
    <div class="container">
        <div class="one">
            <div class="two">
                <div class="tee">
                    <br>
                    <h1>Registration Form</h1>
                    <br>
                </div>
                <div class="bodi">
                    <form action=" " method="POST">
                        <div class="in">
                            <br>
                            <label for="Name">Name</label><br>
                            <input type="text" class="init" name="Name" required/>
                        </div>
                        <div class="in">
                            <br>
                            <label for="Email">Email Address </label><br>
                            <input type="text" class="init" name="Email" required/><br>
                        </div>
                        <div class="in">
                            <br>
                            <label for="CNIC">CNIC Number</label><br>
                            <input type="text" class="init" name="CNIC" required/>
                        </div>
                        <div class="in">
                            <br>
                            <label for="Password">Password:</label><br>
                            <input type="Password" class="init" name="Password" required/>
                        </div>
                        <div class="in">
                            <label for="contactNo" >Contact Number </label><br>
                            <input type="text" class="init" name="contactNo" required/>
                        </div>
                        <div>
                       <!-- <input type = "submit" name="submit" value="Submit" > -->
                       <button type="submit" name="submit" class="submitbtn" >Submit</button>                       
                        </div>
                    </form>
                    <h3>Are you sure you have entered the correct information?<h3>
                    <button onclick="func()" class="yesbtn">YES</button> <button class="yesbtn">NO</button><br>
                    <br><button class="bookbtn" onclick="funct()">BOOK HALL NOW</button>
                </div>
            </div>
        </div>
    </div>
    <?php
if(isset($_POST['submit']))
{
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $CNIC=$_POST['CNIC'];
    $contactNo=$_POST['contactNo'];
$results=mysqli_query($conn,"insert into clientinfo(Name,Email,Password,CNIC,contactNo) values ('$Name','$Email','$Password','$CNIC','$contactNo')");
if ($results==true)
{/*echo "Your Record has been added! Thanks <br> Now you can book halls by clicking here: ";*/}
else
echo "FALSE";
}
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>   
    function func(){
        swal({
  title: "Good job!",
  text: "Your Record has been added! YOUR USER_ID is <?php echo $rows['clientNo']?> Now you can easily book hall by clicking on BOOK HALL NOW Button below",
  icon: "success",
  button: "OK",
});
    }
function funct()
{
    location.href="Bookhall.html";
}
</script>
    </body>
</html>