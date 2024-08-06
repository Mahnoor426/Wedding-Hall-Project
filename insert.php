<!DOCTYPE html>
<html>
    <head>
        <title> </title>
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
echo "Connected with web server";

$db=mysqli_select_db ($conn, "weddinghalls");
if(!$db)
{
    echo "<br><b>Unable to connect with Database</b>";
    die();
}
else
echo "<br><b>Connected with database</b>";
?>
    <div class="container">
        <div class="one">
            <div class="two">
                <div class="tee">
                    <h1>Registration Form</h1>
                </div>
                <div class="bodi">
                    <form action=" " method="POST">
                        <div class="in">
                            <label for="Name">Name </label>
                            <input type="text" class="init" id="Name"/>
                        </div>
                        <div class="in">
                            <label for="Email">Email </label>
                            <input type="text" class="init" id="Email"/>
                        </div>
                        <div class="in">
                            <label for="Password">Password </label>
                            <input type="text" class="init" id="Password"/>
                        </div>
                        <div class="in">
                            <label for="CNIC">CNIC No</label>
                            <input type="text" class="init" id="CNIC"/>
                        </div>
                        <div class="in">
                            <label for="contactNo">Contact Number </label>
                            <input type="text" class="init" id="contactNo"/>
                        </div>
                        <input type="submit" class="submitbtn">
                    </form>
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
$results=mysqli_query($conn,"insert into clientinfo(Name,Email,Password,CNIC,contactNo) values ('$Name','$Email','$Password','$CNIC','contactNo')");

if ($results==true)
{
    echo "One record has been added";
}
else
echo "FALSE";
}
?>
</body>
</html>