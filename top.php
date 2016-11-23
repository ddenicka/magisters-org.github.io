<?php 
@include_once "langdoc.php";
if(!isset($_COOKIE['lang'])) {
	setcookie("lang","ru",2147485547);
	$lang = "ru";
} else $lang = $_COOKIE["lang"];
$sitename = "Lucky-Strikee";
$title = "$sitename - TOP10";
@include_once('set.php');
@include_once('steamauth/steamauth.php');
@include_once('steamauth/userInfo.php');


$lastgame = fetchinfo("value","info","name","current_game");
$lastwinner = fetchinfo("userid","games","id",$lastgame-1);
$winnercost = fetchinfo("cost","games","id",$lastgame-1);
$winnerpercent = round(fetchinfo("percent","games","id",$lastgame-1),1);
$winneravatar = fetchinfo("avatar","users","steamid",$lastwinner);
$winnername = fetchinfo("name","users","steamid",$lastwinner);
$mytrade = fetchinfo("tlink","users","steamid",$_SESSION["steamid"]);
?>



<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $title ?></title>
	<meta name="keywords" content="Рулетка Lucky-Strikee, сайт-рулетка cs go, рулетка cs go gl, лотерея csgo, лотерея cs go, лотерея csgo gl, сайт-лотерея cs go, скины csgo бесплатно, конкурс на скины csgo, купить скины csgo">
	<meta name="description" content="Сайт-лотерея Lucky-Strikee . Поднимись с ширпотреба до ножа! В чем принцип? Когда набирается необходимое количество предметов или проходит отведенное на игру время, система случайным образом выбирает победителя, который забирает все предметы. Чаще выигрывает тот, кто добавил более дорогие скины, но есть шанс у каждого!"> 
	<link rel="stylesheet" href="css/style.css">
	<link rel="SHORTCUT ICON" href="favicon.ico">
	<script src="js/libs/jquery-2.1.3.min.js"></script>
	<script src="js/libs/jquery-ui.min.js"></script>
	<script src="js/jquery.noty.packaged.min.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script src="js/libs/jquery.arcticmodal-0.3.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="js/script.js"></script>
    <script type="text/javascript" src="chat/chat.js"></script>
	<link rel="stylesheet" href="chat/chat.css" type="text/css" />
    <script type="text/javascript">
    
        // ask user for name with popup prompt    
        var name = "<?php echo $steamprofile['personaname'] ?>";
		var ava = "<?php echo $steamprofile['avatarfull'] ?>";
    	
    	// display name on page
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = 57;  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name, ava);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>
</head>

<body class="ezpz-currency-ru"  onload="setInterval('chat.update()', 1000)">

<div class="chat" style="height: auto; z-index: 1000;">
  <header>
    <h2 class="title"><a>ЧАТ</a></h2>
    <ul class="tools"><li><a class="fa fa-minus closech" >↑</a> <a class="fa fa-minus closechs hidden" >↓</a></li></ul>
  </header>
	<div id="page-wrap" class="hjgf hidden">
        <p id="name-area"></p>
        <div id="chat-wrap"><div id="chat-area"></div></div>
		<?php
						if(!isset($_SESSION["steamid"])){
						echo '<div id="otpsoob"><div style="padding-top: 7px;">
									<a class="ezpz-loginas" style="font-size: 12px;border: 2px solid #db073d;margin: auto;padding-top: 12px;width: 230;min-height: 30px;height: 45;" href="/?login">Авторизоваться в STEAM</a>
								</div></div>';
						} else {
						echo '<div id="otpsoob"><form id="send-message-area">
								<textarea id="sendie" maxlength = "100" placeholder="Введите сообщение и нажмите ENTER..."></textarea>
								</form></div>';
						}
						?>
    </div>
</div>



<div class="wrapper">
		<header class="header">
			<div class="header-inside clearfix">
				<a href="index.php" class="logo"><img src="css/img/icon-logo.png" height="45" width="215" alt=""></a>
				<ul class="clearfix">                        
					<li><a href="index.php">ГЛАВНАЯ</a></li>
					<li><a href="support.php">ПОДДЕРЖКА</a></li>
					<li><a href="about.php">О САЙТЕ</a></li>
				</ul>
				<ul class="clearfix">                                                
					<li><a href="history.php">ИСТОРИЯ ИГР</a></li>
					<li><a href="rls.php">ПРАВИЛА</a></li>
					<li><a href="top.php">ТОП</a></li>
				</ul>
			</div>
		</header>
		<section class="after-header">
			<section class="after-header-language"><a href="ru.php">RU</a> | <a href="en.php">EN</a></section>
			<section class="after-header-inside"> 
				<article class="item clearfix">
					<ul class="stat clearfix">            
						<li>
							<h6 class="selector-online-users"><?php include 'online.php';?></h6>
							<p>человек онлайн</p>
						</li>
						<li>
							<h6 class="selector-stat-today-matches"><?php
											$result = mysql_query("SELECT id FROM games WHERE `starttime` > ".(time()-86400));
											echo mysql_num_rows($result);
										?></h6>
							<p>игр сегодня</p>
						</li>
						<li>
							<h6 class="selector-stat-today-players"><?php
										$row = mysql_fetch_array($result);
										$pls = 0;
										$itms = 0;
										for($i=$row["id"]; $i <= $lastgame; $i++) {
											$rst = mysql_query("SELECT id FROM game".$i." GROUP BY userid");
											$pls += mysql_num_rows($rst);
										}
										echo $pls;
										?></h6>
							<p>игроков сегодня</p>
						</li>
						<li>
						<?php 
						$result = mysql_query("SELECT MAX(cost) AS cost FROM games");
						$row = mysql_fetch_assoc($result);
						$maxcost =  $row["cost"];
						?>
							<h6 class="selector-stat-max-sum" id="inf10"><?php echo round($maxcost,2); ?><span class="ezpz-price"></h6>
							<p>макс. выигрыш</p>
						</li>
					</ul>
					<?php
					if(!isset($_SESSION["steamid"])) {
						steamlogin();
						echo '<a class="ezpz-loginas" style="font-size: 12px;border: 2px solid #db073d;margin: 60px auto 0px;padding-top: 22px;" href="/?login">Авторизоваться для начала игры</a>';
							} else {
						echo '<article class="jfrs clearfix">
							<img src="'.$steamprofile['avatarfull'].'" height="74" width="74" alt="">
							<p>'.$steamprofile['personaname'].' <a href="steamauth/logout.php">ВЫЙТИ</a></p>
							<ul class="clearfix">
								<li><a href="http://steamcommunity.com/id/me/tradeoffers/privacy#trade_offer_access_url" target="_blank">Где взять?</a></li>
							</ul>
						</article>
						
						<div class="buy">
							<p>Добавь в свой ник и получи бонус к выигрышу +5%!</p>
							<h6>LUCKY-STRIKEE.RU</h6>
						</div>
						
						<form method="POST" action="./updatelink.php">
						<input type="text" class="main-link" name="link" id="link" value="'.$mytrade.'" placeholder="Вставьте ссылку на обмен ...">
						<input type="submit" class="main-link-check" href="#" value="">
						</form>';
						mysql_query("UPDATE users SET name='".$steamprofile['personaname']."', avatar='".$steamprofile['avatarfull']."' WHERE steamid='".$_SESSION["steamid"]."'");
					}
					?>
				</article>
			</section> 
		</section>

		
	<section class="top-table"> 
		<table border="0">
			<tbody>                                                   
				<tr>
					<td><h6>МЕСТО</h6></td>
					<td><h6>ПРОФИЛЬ</h6></td>
					<td><h6>ПОБЕД</h6></td>
					<td><h6>СУММА БАНКОВ</h6></td>
				</tr>
					<?php
						$rs = mysql_query("SELECT * FROM `users` ORDER BY `won` DESC LIMIT 10");
						$i = 1;
						while($row = mysql_fetch_array($rs)) {
						echo '
						<tr class="selector-profile">
						<td><span>'.$i.'</span></td>
						<td><p>'.$row["name"].'</p></td>
						<td><p>'.$row["games"].'</p></td>
						<td><p>'.round($row["won"],2).'<span class="ezpz-price"></span></p></td>
						</tr>
						';
						$i++;
						}
					?>
			</tbody>
		</table>
	</section>
							
							
	
	<footer class="footer">
			<p>Lucky-Strikee.ru © 2015</p>
			<p>Любое копирование элементов запрещено!</p>
			<img src="css/img/item-designed.png" height="150" width="150" alt="">
		</footer>
</div>
</body>
</html>