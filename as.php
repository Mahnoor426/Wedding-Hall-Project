<!DOCTYPE html>
<h1>going to connect with web server</h1>
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
<form action="" method='POST'>
<table align="center" border = "5px" cellpadding="15 px" cellspacing="10 px ">
<tr>
<td> Name </td>
<td><input type = "varchar" name="Name" id="Name" placeholder = "Enter your name"></td>
</tr>
<tr>
<td> Email </td>
<td><input type = "varchar" name="Email" id="Email" placeholder = "Enter your email"></td>
</tr>
<tr>
    <td> Password </td>
    <td><input type = "varchar" name="Password" id="Password" placeholder = "Enter your Password"></td>
</tr>
<tr>
    <td> CNIC No </td>
    <td><input type = "varchar" name="CNIC" id="CNIC" placeholder = "Enter your CNIC No"></td>
</tr>
<tr>
    <td> Contact number </td>
    <td><input type = "int" name="contactNo" id="contactNo" placeholder = "Enter your Contact number"></td>
</tr>
<tr>
<td>How did you come to know about us?</td>
<td>
<input type = "radio" name="level" value= " Social Media" > Social Media </input><br>
<input type = "radio" name="level" value= " Friends" >Friends </input><br>
<input type = "radio" name="level" value= " Advertisement" > Advertisement </input>
</td>
</tr>
<tr>
<td> </td>
<td><input type = "Checkbox" name="m1">Have you done online booking of a wedding hall before?</input></td>
</tr>
<tr>
<td> </td>
<td><input type = "button" name="submit" value="submit" >
<input type = "button" name="reset" value="reset" ></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Password=$_POST['Password'];
$CNIC=$_POST['CNIC'];
$contactNo=$_POST['contactNo'];

//echo "your name is" .$Name. "<br>";
$results=mysqli_query($conn,"insert into clientinfo(Name,Email,Password,CNIC,contactNo) values ('$Name','$Email','$Password','$CNIC','$contactNo')");

if ($results==true)
{
    echo "One record has been added";
}
else
echo "FALSE";
}
?>
</html>










