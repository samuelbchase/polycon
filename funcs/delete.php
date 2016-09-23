//This method deletes a game given that game's unique ID

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  To Delete<br>
  <input type="number" name="ID"><br>
  Password:<br>
  <input type="password" name="password"><br>
    <input type="submit" value="Submit">
</form>
<?php
$delete = $_POST["ID"];
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
$sql = "DELETE FROM games
        WHERE id=$delete";
$results = $conn->query($sql);
echo("Entry " . $delete . " deleted");
}
else if($pwd=="")
{

}
else{
    echo("<br>Invalid password");
}
?>