<?php

@include_once $_SERVER['DOCUMENT_ROOT'].('/set.php');
require $_SERVER['DOCUMENT_ROOT'].('/steamauth/steamauth.php');
		if(!isset($_SESSION["steamid"])) {
					steamlogin();

echo '<html class=""><head>
   <title>Вход в административную панель</title>
      
		<meta name="robots" content="noindex, nofollow">
        <meta charset="UTF-8">
      
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">
<link href="/admin/style/login/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/admin/style/login/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="/admin/style/login/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/admin/style/login/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/admin/style/login/pages/css/login.css" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES --> 
<link href="/admin/style/login/global/css/components.css" id="style_components" rel="stylesheet" type="text/css">
<link href="/admin/style/login/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="/admin/style/login/layout/css/layout.css" rel="stylesheet" type="text/css">
<link href="/admin/style/login/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color">
<link href="/admin/style/login/layout/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico">
</head>
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="/admin/style/login/layout/img/logo-big.png" alt="">
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->

			<!--? echo form_open(); ?--> 
	<form class="login-form" action="/?login" novalidate="novalidate" style="display: block;">
		<h3 class="form-title">Вход</h3>
			 <!--? echo validation_errors(); ?-->
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
		
		
		<div class="form-actions">
		';
		
		
		mysql_query("UPDATE users SET name='".$steamprofile['personaname']."', avatar='".$steamprofile['avatarfull']."' WHERE steamid='".$_SESSION["steamid"]."'");

			echo '<a class="btn btn-success uppercase" style="
    width: 100%;
" href="/?login">Войти</a>';


			
			
		echo ' 	<!--<label class="rememberme check">
		<div class="checker"><span>	input type="checkbox" name="remember" value="1"></span></div>Remember </label>
			<a href="javascript:;" id="forget-password" class="forget-password">Забыли пароль?</a>-->
		</div>
		
		
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post" novalidate="novalidate" style="display: none;">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email">
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	
</div>
<div class="copyright">
	 © Copyright 2015. All rights reserved.
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/admin/style/login/global/plugins/respond.min.js"></script>
<script src="/admin/style/login/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script async="" src="//www.google-analytics.com/analytics.js"></script><script src="/admin/style/login/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/admin/style/login/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/admin/style/login/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/admin/style/login/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/admin/style/login/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/admin/style/login/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/admin/style/login/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admin/style/login/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/admin/style/login/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/admin/style/login/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/admin/style/login/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>



<!-- END BODY --> 


</body></html>' ;	

}
else
{
@include_once $_SERVER['DOCUMENT_ROOT'].('/set.php');
@include_once $_SERVER['DOCUMENT_ROOT'].('/steamauth/steamauth.php');
@include_once $_SERVER['DOCUMENT_ROOT'].('/steamauth/userInfo.php');
$login = $_SESSION["steamid"];
$sql = "SELECT *
FROM `users` WHERE `steamid` LIKE '$login'";
$result = mysql_query($sql);
$row = mysql_fetch_object($result);
if ($row->admin !== '1') {

echo 'Доступ закрыт' ;	

}
else{
	
include $_SERVER['DOCUMENT_ROOT'].'/admin/components/head.php';
echo '
		
 <!-- Bordered datatable inside panel -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title">Игры</h6></div>
                <div class="datatable">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                 <th>id</th>
                                <th>Победитель</th>
                                <th>Выигрышь</th>
                                <th>Процент</th>
                            </tr>
                        </thead>
                        <tbody>
                           ';
                          

$rs = mysql_query("SELECT * FROM `games` ORDER BY `id` ");
while($row = mysql_fetch_array($rs)) {


if (empty($row["winner"]))
{
	

}	
else
{						 
	echo '<tr>';
                             echo '   <td>'.$row["id"].'</td>';
                             echo '   <td>'.$row["winner"].'</td>';
                               echo ' <td>'.$row["cost"].'</td>';
                               echo ' <td>'.$row["percent"].'</td>';
                          echo '  </tr>';
							echo '</tr>';


}

}
                           
                     	echo ' 
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /bordered datatable inside panel -->
		
            
         
			
	
             
			
			
			
            <!-- Footer -->
            <div class="footer">
                © Copyright 2015. All rights reserved.
            </div>
            <!-- /footer -->

        </div>
    </div>



</body></html>

';



}

}
?>