<!DOCTYPE html>
<html lang="es">
<head>
	<title>Seccion Nodos</title>
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
					<figcaption class="text-center text-titles">Bienvenido Administrador</figcaption>
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
				
				  <?php include("menu.php"); ?>
				<li>
					</li>
					</ul>
				</li>
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
			  <h1 class="text-titles"><i class="zmdi zmdi-pin zmdi-hc-fw"></i> Administración <small>Nodos</small></h1>
			</div>
			
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#new" data-toggle="tab">Nuevo Nodo</a></li>
					  	<li><a href="#list" data-toggle="tab">Lista de nodos</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
                                                          
								<div class="row">
									<div class="col-xs-6 col-md-6 col-md-offset-1"> <!-- action="main.php?op=GN&c=N" -->
									    <form name="form-registro-nodo" id="form-registro-nodo" method="POST" action="">

                                             <input type="hidden" name="fechaFormateada"  id="fechaFormateada" class="form-control">
									    	<div class="form-group label-floating">
											  <label class="control-label">Nombre del Nodo</label>
											  <input name="nombreNodo"  id="nombreNodo" class="form-control" type="text">
											  <label class="error uncolor" for="nombreNodo" id="name_error">Debe introducir nombre del nodo.</label><br><br>
											</div>
									    	<div class="form-group label-floating">
											  <label class="control-label">Latitud </label>
											  <input name="latitud" id="latitud" class="form-control" type="text">
											  <label class="error uncolor" for="lat" id="lat_error">Debe introducir latitud .</label>
											  <label class="error uncolor" for="latitud" id="latitud_error">Error dato invalido, intente de nuevo</label><br>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Longitud</label>
											  <input name="longitud" id="longitud" class="form-control" type="text">
											  <label class="error uncolor" for="latitud" id="lon_error">Debe introducir longitud valida.</label><br>
											</div>

											<div class="form-group label-floating">
											  <label class="control-label">Fecha de Instalación (dd/mm/yyy)</label>
											  <input name="fechaInstalacion"  id="fechaInstalacion" class="form-control" type="text">
											  <label class="error" for="finstalacion" id="finsta_error">Debe introducir una fecha.</label>
											  <label class="error" for="finstalacion" id="finstala_error">Error, la fecha es incorrecta intente de nuevo</label><br>
											</div>
											
											
											<div class="form-group">
										      <label class="control-label">Status</label>
										        <select name="estado" id="estado" class="form-control">
										          <option>Activo</option>
										          <option>Inactivo</option>
										        </select>
										    </div>
										    <div>
											<div class="form-group label-floating">
											  <label class="control-label">Número Máximo de Personas</label>
											  <input name="numPerson" id="numPerson" class="form-control" type="text">
											  <label class="error" for="npersonas" id="numpersonas_error">Debe introducir una cantidad de personas</label>
											  <label class="error" for="noesentero" id="noesentero_error">Solo se permite capturar numeros</label><br>
											</div>

										    <p class="text-center">
										    	<button  id="btnGuardar" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>

										   
										    </p>
									    </form>
									</div>
								</div>
							</div>
						</div>
					  	<div class="tab-pane fade" id="list">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">Code</th>
											<th class="text-center">Name</th>
											<th class="text-center">Status</th>
											<th class="text-center">Update</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>100</td>
											<td>Mathematics</td>
											<td>Active</td>
											<td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
											<td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>500</td>
											<td>Science</td>
											<td>Active</td>
											<td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
											<td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
										</tr>
										<tr>
											<td>3</td>
											<td>300</td>
											<td>Social</td>
											<td>Active</td>
											<td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
											<td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
										</tr>
										<tr>
											<td>4</td>
											<td>700</td>
											<td>English</td>
											<td>Active</td>
											<td><a href="#!" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
											<td><a href="#!" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
										</tr>
									</tbody>
								</table>
								<ul class="pagination pagination-sm">
								  	<li class="disabled"><a href="#!">«</a></li>
								  	<li class="active"><a href="#!">1</a></li>
								  	<li><a href="#!">2</a></li>
								  	<li><a href="#!">3</a></li>
								  	<li><a href="#!">4</a></li>
								  	<li><a href="#!">5</a></li>
								  	<li><a href="#!">»</a></li>
								</ul>
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
			  	<div class="list-group-separator"></div>
				<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-help"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">10m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
				</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-info"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">8m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
			  	</div>
			</div>

		</div>
	</section>

	<!-- Dialog Aviso se guardo exitosamente-->
	<div class="modal fade" tabindex="-1" role="dialog" id="Aviso-Exito">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Aviso</h4>
			    </div>
			    <div class="modal-body">
			        <p>
			        	La información se registro exitosamente..
			        </p>
			    </div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
		      	</div>
		    </div>
	  	</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="Aviso-Sinexito">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Aviso</h4>
			    </div>
			    <div class="modal-body">
			        <p>
			        	Lo sentimos no se guardo la información, intente de nuevo
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