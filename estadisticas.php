<?php
 
 if (isset($_GET['rol'])) {
 	$rol=$_GET['rol'];  
  
 } 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Seccion Estadisticas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link rel="stylesheet" href="./css/main.css">
	 <link rel="stylesheet" href="./css/beacons.css">
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
-->
  
</head>
<body>
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				UABC Conecta <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="./assets/img/logo_200x200.jpg" alt="UserIcon">
					<figcaption class="text-center text-titles">Bienvenido <?php echo $rol;?></figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="#!">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
					<li>
						<a href="#!" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				
				  <?php 
                   if($rol=="admin"){
				     include("menu.php");
				   } ?>
				    
			</ul>
		</div>
	</section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<li>
					<a href="#!" class="btn-Notifications-area">
						<i class="zmdi zmdi-notifications-none"></i>
						<span class="badge">7</span>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-chart zmdi-hc-fw"></i> Administración <small>Reportes</small></h1>
			</div>
			<form name="variable" method="">
			   <input type="hidden" name="el_rol" id="el_rol" value="<?php echo $rol;?>">

			</form>
			
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
                                                          
								<div class="row" id="ubicaciones">
									<div class="col-xs-6 col-md-6"> <!-- action="main.php?op=GN&c=N" -->
									    <img src="./assets/img/en_construccion.jpg">
									</div>
								</div>
							</div>
						</div>
					  
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Notifications area -->
	<section class="full-box Notifications-area">
		<div class="full-box Notifications-bg btn-Notifications-area"></div>
		<div class="full-box Notifications-body">
			<div class="Notifications-body-title text-titles text-center">
				Notificaciones <i class="zmdi zmdi-close btn-Notifications-area"></i>
			</div>
			<div class="list-group">
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-triangle"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">17m</div>
				      	<h4 class="list-group-item-heading">Agregados Recientemente</h4>
				      	<p class="list-group-item-text">Muestra los Nodos Agregados Recientemente.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-octagon"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">15m</div>
				      	<h4 class="list-group-item-heading">Ultima conexion</h4>
				      	<p class="list-group-item-text">Muestra los ultimos nodos conectados.</p>
				    </div>
			  	</div>
			  	

		</div>
	</section>

	<!-- Dialog help -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Dialog-Help">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Ayuda</h4>
			    </div>
			    <div class="modal-body">
			        <p>
			        	Si requieres apoyo te puedes ir al menu de ayuda y llenar el formulario y en breve nos contactaremos contigo.
			        </p>
			    </div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
		      	</div>
		    </div>
	  	</div>
	</div>
	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>

	<script src="./js/funciones_beacons.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>  -->
	<!-- <script src="./js/form-validation-beacons.js"></script>-->

	<script>
		$.material.init();
	</script>
</body>
</html>