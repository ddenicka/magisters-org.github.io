<?php
@include_once('set.php');
@include_once('steamauth/steamauth.php');
@include_once "langdoc.php";
$lang = $_COOKIE["lang"];

$gamenum = fetchinfo("value","info","name","current_game");
$bank = fetchinfo("cost","games","id",$gamenum);
$timeleft = fetchinfo("starttime","games","id",$gamenum);
if($timeleft == 2147483647) $timeleft = 120;
$timeleft += 120-time();
if($timeleft === 1) {
	echo '<script>
	if(roulet == 0) { roulet = 1;
	$(".stop-game").removeClass("hidden");
	setTimeout(function(){	
	$.ajax({
		type: "GET",
		url: "loadr.php",
		success: function(msg){
			$(\'.kjmhgd\').before(msg);
		}
	});},2000)
	}</script>';
}
if(!isset($_SESSION["steamid"])) $admin = 0;
else $admin = fetchinfo("admin","users","steamid",$_SESSION["steamid"]);
$ls=0;
$rs = mysql_query("SELECT * FROM `game".$gamenum."` GROUP BY `userid` ORDER BY `id` DESC");
$crs = "";
$td = "";
if(mysql_num_rows($rs) == 0) {
	
} else {
	$td = '<div class="players-percent"><div class="players-tape">';
	while($row = mysql_fetch_array($rs)) {
		$ls++;
		$avatar = $row["avatar"];
		$userid = $row["userid"];
		$username = fetchinfo("name","users","steamid",$userid);
		$rs2 = mysql_query("SELECT SUM(value) AS value FROM `game".$gamenum."` WHERE `userid`='$userid'");						
		$row = mysql_fetch_assoc($rs2);
		$sumvalue = $row["value"];
		if($admin > 0) $admtext = "<a style=\"color: #FF0000\" href=\"setwinner.php?user=$userid\"> (Победитель)</a>"; 
		else $admtext = "";
		
		$crs .= '<section class="selector-rates shop">
				<article class="selector-rate">
				<div class="investment clearfix">
					<img class="selector-rate-depositor-image" src="'.$avatar.'">
					<p>
						<a class="selector-current-item-depositor" href="http://steamcommunity.com/profiles/'.$userid.'" target="_blank">'.$username.'</a>
						внес предметов на
						<span>(<span class="selector-curren-item-price">'.round($sumvalue,2).'</span><span class="ezpz-price"></span>)</span>
					</p>
				</div>
				<div class="objects clearfix">
					<div class="selector-items">';
					$rs3 = mysql_query("SELECT * FROM `game".$gamenum."` WHERE `userid`='$userid'");
					while($row33 = mysql_fetch_array($rs3)) {
					$crs .= '
							<div class="itm tooltip tooltip-effect-1">
								<img class="selector-current-item-image" src="https://steamcommunity-a.akamaihd.net/economy/image/'.$row33["image"].'/70fx70f" alt="'.$row33["item"].'" title="'.$row33["item"].'" height="60" width="70">
								<span class="tooltip-content clearfix">
									<span class="selector-current-item-name tooltip-text">'.$row33["item"].'</span>
								</span>
							</div>';
					}
					$crs .= '</div>
					<h4 class="tooltip2 tooltip-effect-1">
						<span class="selector-chance">'.round(100*$sumvalue/$bank,1).'</span> %
						<span class="tooltip-content2 clearfix">
							<span class="tooltip-text2">
								Шанс выигрыша с этими предметами
								<a href="about.php">Читать подробнее</a>
							</span>
						</span>
					</h4>
				</div>
		</article>
		</section>';
		$td .= '<div class="players-percent-block" style="margin: 10px 6px;">
				<img src="'.$avatar.'">
				<div class="players-percent-text" style="font: 700 19px "RobotoRegular";">'.round(100*$sumvalue/$bank,1).'%</div>
				</div>';
	}
	$td .= '</div></div>';
}
echo $td.$crs;
echo "<script>if(bets < $ls) { audioElement2.play();} bets = $ls;</script>";

if(isset($_SESSION['steamid'])) {
	$rs = mysql_query("SELECT * FROM messages WHERE `userid` = '".$_SESSION['steamid']."'");
	while($row = mysql_fetch_array($rs)) {
		$mng = $row["msg"];
		if(strlen($msg[$lang][$mng]) > 0) echo "<script type=\"text/javascript\">alert2('<span class=from>".$row["from"].":</span><br/><span class=msg>".$msg[$lang][$mng]."</span>','information');</script>";
		else echo "<script type=\"text/javascript\">alert2('<span class=from>".$row["from"].":</span><br/><span class=msg>".$row["msg"]."</span>','information');</script>";
		mysql_query("DELETE FROM messages WHERE `id`='".$row["id"]."'");
	}
}

?>