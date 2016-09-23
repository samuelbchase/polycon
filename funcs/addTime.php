//This function takes an existing database entry and modifies it to add a time

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

  Unique ID <br>
  <input type="number" name="ID"><br>

  Day<br>
  <input type="text" name="Day"><br>

  Start Time<br>
  <input type="text" name="Time"><br>

  Password:<br>
  <input type="text" name="password"><br>

    <input type="submit" value="Submit">
</form>
<?php
$id = $_POST["ID"];
$Day = $_POST["Day"];
$Time = $_POST["Time"];

$pwd = $_POST["password"];

if($pwd == "PASSWORD")
{
$servername = "localhost";
$username = "USR";
$password = "PWD";
$dbname = "DBNAME";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        echo("Connection failed: " . $conn->connect_error);
    } 
    else{
    //    echo("Connection success");
    }
$sql = "UPDATE games
        SET Day = '$Day', StartTime = '$Time'
        WHERE id=$id";
$results = $conn->query($sql);
echo("Entry " . $delete . " updated");
}
else if($pwd=="")
{

}
else{
    echo("<br>Invalid password");
}
?>
