<?php
$mydb="weddinghalls";
$conn=mysqli_connect("localhost","root","");
if(!$conn)
{
    echo("Unable to connect with server");
    die();
}
else
{
    echo("Connected with webs server");
}
$DB=mysqli_select_db($conn,$mydb);
if(!$DB)
{
    echo("<br>Unable to connect with Database");
    die();
}
else
{
   echo("<br>Database connected successfully");
if(isset($_POST['submit']))
{
    $clientNo=$_POST['clientNo'];
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $CNIC=$_POST['CNIC'];
    $contactNo=$_POST['contactNo'];

    $result=mysqli_query($conn,"INSERT INTO clientinfo(clientNo,Name,Email,Password,CNIC,contactNo) VALUES('$clientNo', '$Name','$Email','$Password','$CNIC', '$contactNo')");
    if($result==TRUE)
    {
    echo "One record has been added";
    }
    else
    echo "FALSE";
}
}
?>