//This

<h3> IF YOU DON'T WANT TO CHANGE AN ENTRY LEAVE IT BLANK </h3>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  Password:<br>
  <input type="text" name="password"><br>

  Unique ID <br>
  <input type="number" name="ID"><br>

  Event Name<br>
  <input type="text" name="name"><br>

  System<br>
  <input type="text" name="system"><br>

  GM<br>
  <input type="text" name="gm"><br>

  Type<br>
  <input type="text" name="type"><br>

  Day<br>
  <input type="text" name="day"><br>

  Start Time<br>
  <input type="text" name="time"><br>

  Duration<br>
  <input type="text" name="duration"><br>

    <input type="submit" value="Submit">
</form>
<?php
$id = $_POST["ID"];
$EventName = $_POST["name"];
$System = $_POST["system"];
$GM = $_POST["gm"];
$Type = $_POST["type"];
$Day = $_POST["day"];
$Time = $_POST["time"];
$Duration = $_POST["duration"];

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
echo("Editing Event: " . $id);

if($EventName != "")
{
    $sql = "UPDATE games
    SET EventName = '$EventName'
    WHERE id=$id";
    $results = $conn->query($sql);
    echo("<br>Event name updated");
}

if($System != "")
{
    $sql = "UPDATE games
    SET System = '$System'
    WHERE id=$id";
    $results = $conn->query($sql);
    echo("<br>System updated");
}

if($GM != "")
{
    $sql = "UPDATE games
    SET GM = '$GM'
    WHERE id=$id";
    $results = $conn->query($sql);
    echo("<br>GM name updated");
}

if($Type != "")
{
    $sql = "UPDATE games
    SET Type = '$Type'
    WHERE id=$id";
    $results = $conn->query($sql);
    echo("<br>Type updated");
}

if($Day != "")
{
    $sql = "UPDATE games
    SET Day = '$Day'
    WHERE id=$id";
    $results = $conn->query($sql);
    echo("<br>Type updated");
}
if($Time != "")
{
    $sql = "UPDATE games
    SET StartTime = '$Time'
    WHERE id=$id";
    $results = $conn->query($sql);
    echo("<br>Time updated");
}

if($Duration != "")
{
    $sql = "UPDATE games
    SET Runtime = '$Duration'
    WHERE id=$id";
    $results = $conn->query($sql);
    echo("<br>Duration updated");
}


}
else if($pwd=="")
{

}
else{
    echo("<br>Invalid password");
}
?>