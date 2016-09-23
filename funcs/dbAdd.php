//This function adds a new DB entry
//(Without a time)

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

  Event Name:<br>
  <input type="text" name="eventname"><br>

  GM:<br>
  <input type="text" name="GM"><br>

  System:<br>
  <input type="text" name="system"><br>

  Type:<br>
<select name="Type">
  <option value="Board Game">Board Game</option>
  <option value="Card Game">Card Game</option>
  <option value="RPG">RPG</option>
  <option value="LARP">LARP</option>
  <option value="Miniatures">Miniatures</option>
  <option value="Other">Other</option><br>
</select>

  <br>Duration:<br>
  <input type="text" name="Runtime"><br>
  password:<br>
  <input type="password" name="pwd"><br>
    <input type="submit" value="Submit">
</form>


<?php
$EventName = $_POST["eventname"];
$GM = $_POST["GM"];
$System= $_POST["system"];
$Type= $_POST["Type"];
$Runtime = $_POST["Runtime"];
$pwd = $_POST["pwd"];

$servername = "localhost";
$username = "USR";
$password = "PWD";
$dbname = "DBNAME";

if(strcmp($pwd,"PASSWORD") == 0)
{
    echo("Correct Password");
        // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        echo("Connection failed: " . $conn->connect_error);
    } 
    else{
     //echo("Connection success");
    }
    //Date and time to be added at later time
    $sql= "
    INSERT INTO games (EventName,System,GM,Type,Day,StartTime,Runtime) 
    VALUES ('$EventName', '$System', '$GM', '$Type','','', '$Runtime' ); 
    ";

    if ($conn->query($sql) === TRUE) {
        echo(" <br> Successfully inserted");
    } else {
     echo("<br>Error inserting: " . "<br>" . $conn->error);
    }
}
else if($pwd=="")
{

}
else{
    echo("<br>Invalid password");
}


?>
