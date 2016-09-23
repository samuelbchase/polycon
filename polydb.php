

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="text" placeholder="Event Name"name="eventName"><br>
    <input type="text" placeholder="GM name"name="gm"><br>
    <input type="text" placeholder="System"name="System"><br>
    <input type="text" placeholder="Type (ie RPG, card game)"name="Type"><br>
    <input type="text" placeholder="Day"name="Day"><br>
    <input type="text" placeholder="Time"name="Time"><br>
    <input type="submit" value="Search">
</form>




<?php
$EventName = $_POST["eventName"];
$GM = $_POST["gm"];
$System = $_POST["System"];
$Type = $_POST["Type"];
$Day = $_POST["Day"];
$Time = $_POST["Time"];

$servername = "localhost";
$username = "USR";
$password = "PWD";
$dbname = "DBNAME";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    //echo("Connection failed: " . $conn->connect_error);
}
else{
    //echo("Connection success");
}
//import css
$css = file_get_contents('css/polydb.css');
echo $css;

$sql= "CREATE TABLE games(
id int AUTO_INCREMENT primary key NOT NULL,
EventName VARCHAR(60) NOT NULL,
System VARCHAR(60) NOT NULL,
GM VARCHAR(60) NOT NULL,
Type VARCHAR(60) NOT NULL,
Day VARCHAR(10) NOT NULL,
StartTime VARCHAR(10) NOT NULL,
Runtime VARCHAR(20) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    //echo("Table polydb created successfully");
} else {
    //echo("<br>Error creating table: " . "<br>" . $conn->error);
}
?>
<div id='titlebar'>
    <h2> Welcome to PolyDB! </h2>
    <p> PolyDB allows you to view all of the events to be held at our next PolyCon convention,
        and provides you with an easy search feature to find the games you're looking for.
        Use the search options to the left, or look at the total game list below.
        <br>
        <br>
        To reset your search completely press the reset button below.
    </p>

    <div class='polyDBbutton' onclick="javascript:location.href='polydb.php'"
    >
        Reset
    </div>

</div>



<?php

//Display current tickets
//if($EventName == "" && $GM == "" && $System == "" && )
$sql = "SELECT * FROM games
        WHERE GM LIKE '%$GM%' 
        AND EventName LIKE '%$EventName%'
        AND System LIKE '%$System%'
        AND Type LIKE '%$Type%'
        AND Day LIKE '%$Day%'
        AND StartTime LIKE '%$Time%'
        ";

$result = $conn->query($sql);
echo("<br>");
$alternate = 0;
if($result->num_rows > 0)
{   echo("<tr>");
    while($row = $result->fetch_assoc()){
        if($alternate == 0)
        {
            //Grey div
            echo("<div id='grey'>");
            echo("<h4>" .  $row["EventName"] . "</h4>". "<p>" . "<b>GM: </b>" . $row["GM"] . "<br>" . "<b>System: </b>" . $row["System"] .
                " - " . $row["Type"] . "<br>" . "<b>Day: </b>". $row["Day"] . "<br>" . "<b>Time: </b>" .
                $row["StartTime"] . "<br>" . "<b>Duration: </b>" . $row["Runtime"] . "<span>" . $row["id"] . "</span>" . "</p>" );
            echo("<div>");
            $alternate=1;
        }
        else {
            echo("<div id='white'>");
            echo("<h4>" .  $row["EventName"] . "</h4>". "<p>" . "<b>GM: </b>" . $row["GM"] . "<br>" . "<b>System: </b>" . $row["System"] .
                " - " . $row["Type"] . "<br>" . "<b>Day: </b>". $row["Day"] . "<br>" . "<b>Time: </b>" .
                $row["StartTime"] . "<br>" . "<b>Duration: </b>" . $row["Runtime"] . "<span>" . $row["id"] . "</span>" . "</p>" );
            echo("<div>");
            $alternate = 0;
        }


    }
}

else {
    echo("No games found");
}
echo("</table>");
?>




<?php
$conn->close();
?>