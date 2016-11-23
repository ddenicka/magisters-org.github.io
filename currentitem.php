<?php
@include_once('set.php');
@include_once('steamauth/steamauth.php');
if(!isset($_SESSION["steamid"])) {
	die("0");
}
$lastgame = fetchinfo("value","info","name","current_game");
$steam = $_SESSION["steamid"];
$result = mysql_query("SELECT COUNT(*) FROM `game$lastgame` WHERE `userid`='$steam'");
$row = mysql_fetch_assoc($result);
if(!isset($row["value"])){
 die("0");
 } else {
echo $row["value"];
}
?>