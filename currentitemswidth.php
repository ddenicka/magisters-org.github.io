<?php
@include_once ("set.php");
$game = fetchinfo("value","info","name","current_game");
$itgave =  fetchinfo("itemsnum","games","id",$game);
$widme = $itgave * 8;
echo $widme;
?>