 <?php
 	

include $_SERVER['DOCUMENT_ROOT'].'/admin/components/adm_head.php' ;
echo '<body class="wysihtml5-supported">

    <!-- Navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="hidden-lg pull-right">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-right">
                        <span class="sr-only">Р РЋР Р†Р ВµРЎР‚Р Р…РЎС“РЎвЂљРЎРЉ</span>
                        <i class="fa fa-chevron-down"></i>
                    </button>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar">
                        <span class="sr-only">Toggle sidebar</span>
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <ul class="nav navbar-nav navbar-left-custom">
                    <li class="user dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="'.$steamprofile['avatarfull'].'" alt="">
                            <span> '.$steamprofile['personaname'].'</span>
                        
                        </a>
                        
                    </li>
                    <li><a class="nav-icon sidebar-toggle"><i class="fa fa-bars"></i></a></li>
                </ul>




				</div>
				
				<ul class="nav navbar-nav navbar-right collapse" id="navbar-right">
                <li>
                    <a href="/logout">
                        <i class="fa fa-sign-out"></i>
                        <span>Выход</span>
                        
                    </a>
                </li>

                

                
            </ul>
				
           

          
        </div>
    </div>
    <!-- /navbar -->




    <!-- Page header -->
    <div class="container-fluid">
	
        <div class="page-header">
            <div class="logo"><a href="/admin/" title=""><img src="../css/img/icon-logo.png" alt=""></a></div>
			<div class="panel-body" style=" width: 400px; left: 285px; top: 36px; position: absolute; ">

                            
                            
                            
                            
                            
                            
                            
                        </div>
            <ul class="middle-nav">
	
                <li><a href="#" class="btn btn-default"><i class="fa fa-comments-o"></i> <span>Чат</span></a></li>
            
                <li><a href="/admin/users" class="btn btn-default"><i class="fa fa-male"></i> <span>Пользователи</span></a></li>

            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Page container -->
    <div class="page-container container-fluid">
    	
    	<!-- Sidebar -->
        <div class="sidebar collapse">
        	<ul class="navigation">
            	<li><a href="/admin/"><i class="fa fa-home "></i>Главная</a></li>
					<li><a href="/"><i class="fa fa-gamepad"></i>Сайт</a></li>
               
            
             
                <li><a href="#" class="expand level-closed"><i class="fa fa-user"></i>Пользователи</a>
                	<ul style="display: none;">
					 <li><a href="/admin/users">Пользователи</a></li>
				
                    </ul>
                </li>
                
            </ul>
			
			
			<div class="col-md-6" style=" width: 260px; right: 15px; top: 10px; ">

                    <!-- Text styles -->
                    <div class="panel panel-default">
                        <div class="panel-heading"><h6 class="panel-title">Пользователей на сайте : '; 
							
include $_SERVER['DOCUMENT_ROOT'].'/online.php';

				
						
						echo '</h6></div>
                    
                    </div>
                    <!-- /text styles -->

                </div>
			
			
			
        </div>
        <!-- /sidebar -->
		
		

    
        <!-- Page content -->
        <div class="page-content">

            <!-- Page title -->
        	<div class="page-title">
                <h5><i class="fa fa-bars"></i>  '.$steamprofile['personaname'].' <small>, Добро пожаловать ! </small></h5>
                
            </div>
            <!-- /page title -->';
			
?>