<?php
include_once '../views/template.php';
include_once '../functions/getFunctions.php';
include_once '../functions/getFunctionsQRY.php';
include_once '../functions/misc.php';
include_once '../config/DBConnect-QRY.php';

$rolUser1=$_SESSION['rolUser'];

head("user", $rolUser1);
$_ticket=$_GET['st'];
$data=getTicketById($_ticket);
if ($data==false){
	alert('No existe el ticket','../web/semaforo3.php');
}
// allValues($_SESSION);

?>

<div class="ibm-fluid ibm-padding-top-2">
	<div class="ibm-col-12-4">
		<p class="ibm-ind-link ibm-icononly">
			<a class="ibm-back-link" href="../web/semaforo3.php"></a>	&nbsp;
		</p>
	</div>
	<div class="ibm-col-12-4">
	</div>
	<div class="ibm-col-12-4" align="right">
		<?php
		$estado="";
		$color="";
		$bgcolor="";
		switch ($data['estado']) {
			case '1':
				$estado="Abierto";
				$color="ibm-textcolor-red-50";
				$bgcolor="ibm-background-red-40";
				break;
			case '2':
				$estado="En Progreso";
				$color="ibm-textcolor-yellow-30";
				$bgcolor="ibm-background-yellow-30";
				break;
			case '3':
				$estado="Resuelto"; $color="ibm-textcolor-green-50";
				$bgcolor="ibm-background-green-50";
				break;
		}
		?>
		<p><a class="ibm-ticket-link ibm-inlinelink <?php echo $color;?>">Estado: <strong><?php echo "$estado"; ?></strong></a></p>
	</div>
</div>

<div class="ibm-colums ibm-padding-top-1 ibm-padding-content">
	<div class="ibm-card">
		<div class="ibm-card__image <?php echo $bgcolor;?>" align="center">
			<p class="ibm-h4 ibm-textcolor-white-core ibm-padding-top-1">
				Ticket TC<?php echo $data['id'];?>
			</p>
		</div>
		<div class="ibm-card__content">
			<main role="main" aria-labelledby="ibm-pagetitle-h1">
				<div id="ibm-pcon">
					<div id="ibm-content">
						<div id="ibm-content-body">
							<div id="ibm-content-main">
								<!------------------------------------------ TICKET_DETAILS ------------------------------------------>
								<section id="changePassword ibm-background-cool-white-10">
									<div class="ibm-fluid">
										<div class="ibm-fluid">
											<div class="ibm-padding-content">
												<div class="ibm-col-12-6 ibm-col-medium-12-6">
													<p>
														<label class="ibm-h3 ibm-icon-nolink ibm-tools-link" for="txtSystemNumber">Sales Order:</label>
														<span>
															<input type="text" class="ibm-styled-input ibm-background-cool-white-20 ibm-fullwidth" value="<?php echo $data['sales_order']; ?>"  id="tSalesOrder" name="tSalesOrder" readonly>
															<!-- <input type="hidden" name="tIdError" value="<?php echo $data['id_error']; ?>"> -->
														</span>
													</p>
												</div>
												<!-- <div class="ibm-col-12-4 ibm-col-medium-12-6">
												<p>
												<label class="ibm-h3 ibm-icon-nolink ibm-setting-link" for="txtWorkUnit"><strike>Work unit:</strike></label>
												<span>
												<input disabled type="text" class="ibm-styled-input ibm-background-cool-white-20 ibm-fullwidth" value="<?php echo $data['work_unit'] ." / ". $data['wuprod']; ?>" id="tWorkUnit" name="tWorkUnit" readonly>
											</span>
										</p>
									</div> -->
									<div class="ibm-col-12-6 ibm-col-medium-12-6">
										<p>
											<label class="ibm-h3 ibm-icon-nolink ibm-person-link" for="txtAuthor">Autor:</label>
											<span>
												<?php
												$_correo=getUserById($data['autor_id']);
												$_correo=$_correo['usuario'];
												?>
												<input type="text" class="ibm-styled-input ibm-background-cool-white-20 ibm-fullwidth" value="<?php echo $_correo; ?>" id="tAuthor" name="tAuthor" readonly>
											</span>
										</p>
									</div>
								</div>
							</div>
							<div class="ibm-fluid">
								<div class="ibm-padding-content">
									<div class="ibm-col-12-6 ibm-col-medium-12-6">
										<p>
											<label class="ibm-h3 ibm-icon-nolink ibm-home-link" for="txtArea">Proceso:</label>
											<span>
												<?php
												$_proceso=getProcesoById($data['proceso_id']);
												$_proceso=$_proceso['proceso_name'];
												?>
												<input type="text" class="ibm-styled-input ibm-background-cool-white-20 ibm-fullwidth" value="<?php echo $_proceso; ?>" id="tArea" name="tArea" readonly>
											</span>
										</p>
									</div>
									<div class="ibm-col-12-6 ibm-col-medium-12-6">
										<p>
											<label class="ibm-h3 ibm-icon-nolink ibm-calendar-link" for="txtRequestDate">Fecha de creaci&oacute;n:</label>
											<span>
												<input type="text" class="ibm-styled-input ibm-background-cool-white-20 ibm-fullwidth" value="<?php echo date("d-M-Y H:i",strtotime($data['fec_creacion'])) ?>" id="tRequestDate" name="tRequestDate" readonly>
											</span>
										</p>
									</div>
								</div>
							</div>
							<div class="ibm-fluid">
								<div class="ibm-padding-content">
									<div class="ibm-col-12-6 ibm-col-medium-12-6">
										<p>
											<label class="ibm-h3 ibm-icon-nolink ibm-caution-link" for="txtError">Error:</label>
											<span>
												<?php
												$_error=getErrorById($data['error_id']);
												$_error=$_error['error_name'];
												?>
												<input type="text" class="ibm-styled-input ibm-background-cool-white-20 ibm-fullwidth" value="<?php echo $_error; ?>" id="tError" name="tError" readonly>
											</span>
										</p>
										<br>
										<p>
											<label class="ibm-h3 ibm-icon-nolink ibm-blog-link" for="txtDescription">Descripci&oacute;n:</label>
											<span>
												<textarea class="ibm-styled-input ibm-background-cool-white-20 ibm-fullwidth" cols="47" rows="5" maxlength="500" id="tDescription" name="tDescription" readonly><?php echo $data['descripcion_problema']; ?></textarea>
											</span>
										</p>
									</div>
									<div class="ibm-col-12-6 ibm-col-medium-12-6">
										<p>
											<label class="ibm-h3 ibm-icon-nolink ibm-caution-link" for="txtError">PSSD:</label>
											<span>
												<?php
												$SO=$data['sales_order'];
												$pssd=getPSSD($SO);
												//print_r($pssd);

												?>
												<input type="text" class="ibm-styled-input ibm-background-cool-white-20 ibm-fullwidth" value="<?php echo $pssd[0][0]; ?>" id="tError" name="tError" readonly>
											</span>
										</p>
										
										<?php if ( $data['dir_screenshot'] != "") { ?>
											<label class="ibm-h3 ibm-icon-nolink ibm-picture-link" for="figScreenshot">Screenshot:</label>
											<a href="#" onclick="IBMCore.common.widget.overlay.show('overlayScreen'); return false;">
												<figure id="imgScreen">
													<img src="<?php echo "../../" . $data['dir_screenshot']; ?>" width="100%" height="200" alt="Error image">
													<!-- <img src="https://serebii.net/sunmoon/charizardgift.jpg"> -->
												</figure>
											</a>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</section>

<?php  if(($_SESSION['rolUser']==2) && ($data['estado']==1 || $data['estado']==2) ){?>
<div class="ibm-fluid">
	<div class="ibm-col-xlarge-12-6 ibm-col-large-12-6 ibm-col-medium-12-8">
		<div data-widget="showhide" data-type="panel" class="ibm-show-hide ibm-alternate">
			<h2>Reasignar</h2>
			<div class="ibm-container-body">
				<form method="post" action="../operations/userOperations.php?operation=reasignar">
					<label>Usuario</label>
					<p class="ibm-form-elem-grp">
						<span>
							<select id="" class="ibm-styled-input" style="width: 100%" name="usuario_rea">
								<option value="">Seleccione...</option>

								<?php
								// aqui va codigo que permite cargar los usuarios y ponerlos en el select.
								$usrs=getShippingUsers();
								foreach ($usrs as $key => $value) {
								?>
									<option value="<?php echo $value['id_usuario']?>">
										<?php
											echo $value['nombre'];
											echo " - ";
											echo $value['usuario'];
										?>
									</option>
								<?php
								}
								?>

							</select>
						</span>
					</p>
					<label>Comentario</label>
					<span>
						<textarea placeholder="M&aacute;x. 500 caracteres" class="ibm-styled-input" cols="97" id="" name="comen_rea" rows="3"></textarea>
					</span>
					<div class="ibm-padding-top-1" align="center">
						<input type="hidden" name="ticketId" value="<?php echo $data['id'];?>">
						<p class="ibm-btn-row">
							<button type="submit" name="reasignar" class="ibm-btn-sec ibm.btn-green-50 ibm-btn-small">Enviar</button>
						</p>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
}
?>
</div>
					<!-- <div hidden="hidden">Should I have a  Solution Description here?</div> -->
					<!-- Botones -->
					<div align="center" class="ibm-col-12-4 ibm-center-block">
						<?php
						if($data['estado']==1 && $rolUser1 == 1 || $data['estado']==1 && $rolUser1 == 2){
							?>

							<form id="formTakeTicket" method="post" action="../operations/userOperations.php?operation=takeTicket">
								<input type="hidden" name="_ticket" value="<?php echo $data['id'];?>">
								<input type="hidden" name="_severidad" value="<?php echo $data['severidad'];?>">
								<input type="hidden" name="_fecrea" value="<?php echo $data['fec_creacion'];?>">
								<input type="hidden" name="_autor" value="<?php echo $_SESSION['idUser'];?>">
								<button type="submit" name="btn-take" class="ibm-btn-teal-50 ibm-btn-pri">Tomar</button>
							</form>
							<?php
						}
						elseif($data['estado']==2 && $rolUser1 == 1 || $data['estado']==2 && $rolUser1 == 2){
							?>
							<form id="formSolveTicket">
								<input type="hidden" id="_proceso" name="_proceso" value="<?php echo $data['proceso_id']?>">
								<input type="hidden" id="_errorId" name="_errorId" value="<?php echo $data['error_id'];?>">
								<input type="hidden" id="_author" name="_author" value="<?php echo $_SESSION['idUser'];?>">
								<input type="hidden" id="_id" name="_id" value="<?php echo $_GET['st'];?>">
								<button type="button" id="btn-solve" name="btn-solve" class="ibm-btn-pri ibm-btn-teal-50">Solucionar</button>
							</form>
							<?php
						}
						?>
					</div>
					<div>
						<?php
						if($data['estado']==3){
						?>
						<div class="ibm-fluid">
							<div class="ibm-padding-content">
								<?php if ($rolUser1 == 1 || $rolUser1 == 2): ?>
									
								
								<div class="ibm-col-12-4 ibm-col-medium-12-6">
									<p>
										<label>
											<!-- ponerle icono en label -->
											Soluci&oacute;n
										</label>
										<?php

										?>
										<input type="text" class="ibm-styled-input ibm-background-cool-white-20 ibm-fullwidth" value="<?php echo $data['solucion_desc'];?>" id="tSolucion" name="tSolucion" readonly>
									</p>
								</div>
								<div class="ibm-col-12-4 ibm-col-medium-12-6">
									<p>
										<label>
											<!-- ponerle icono dentro de label--> Descripci&oacute;n Soluci&oacute;n (Shipping)
										</label>
										<span>
											<textarea class="ibm-styled-input ibm-background-cool-white-20 ibm-fullwidth" cols="47" rows="5" maxlength="500" id="tComentario_" name="tComentario_" readonly><?php echo $data['descripcion_solucion'];?></textarea>
									</p>
									<?php if ($data['screen_a']!=""): ?>
									<p>
										<a href="#" onclick="IBMCore.common.widget.overlay.show('overlayScreen_a'); return false;">
											<img src="<?php echo "../../".$data['screen_a'];?>" width="100%" height="200"  alt="">
										</a>
									</p>
									<?php endif ?>
								</div>
								<?php endif ?>
								<div class="ibm-col-12-4 ibm-col-medium-12-6">
									<p>
										<label>
											<!-- ponerle icono dentro de label--> Descripci&oacute;n Soluci&oacute;n (Geodis)
										</label>
										<span>
											<textarea class="ibm-styled-input ibm-background-cool-white-20 ibm-fullwidth" cols="47" rows="5" maxlength="500" id="tComentario_" name="tComentario_" readonly><?php echo $data['comentario_solucion'];?></textarea>
									</p>
									<?php if ($data['screen_b']!=""): ?>
										<p>
											<a href="#" onclick="IBMCore.common.widget.overlay.show('overlayScreen_b'); return false;">
												<img src="<?php echo "../../".$data['screen_b'];?>" width="100%" height="200"  alt="">
											</a>
										</p>
									<?php endif ?>
									
								</div>

						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
</div>
</div>

<section id="overlayDetails">
	<!-- OVERLAY IMAGE  -->
	<div id="overlayScreen_a" data-widget="overlay" class="ibm-common-overlay ibm-overlay-alt-three">
		<div class="ibm-mo__image">
			<figure>
				<img src="<?php echo "../../" . $data['screen_a'];?>" width="100%" alt="Error image"/>
			</figure>
		</div>
	</div>
	<!-- OVERLAY SCREEN1  -->
	<div id="overlayScreen_b" data-widget="overlay" class="ibm-common-overlay ibm-overlay-alt-three">
		<div class="ibm-mo__image">
			<figure>
				<img src="<?php echo "../../" . $data['screen_b'];?>" width="100%" alt="Error image"/>
			</figure>
		</div>
	</div>
	<!-- OVERLAY SCREEN2  -->
	<div id="overlayScreen" data-widget="overlay" class="ibm-common-overlay ibm-overlay-alt-three">
		<div class="ibm-mo__image">
			<figure>
				<img src="<?php echo "../../" . $data['dir_screenshot'];?>" width="100%" alt="Error image"/>
			</figure>
		</div>
	</div>
	<div class="ibm-common-overlay ibm-overlay-alt" data-widget="overlay" id="overlaySolveTicket">
		<p class="ibm-h3 ibm-textcolor-blue-50">Resolver ticket</p>
		<div class="ibm-rule ibm-alternate ibm-gray-30"><hr></div>
		<div data-widget="scrollable" data-height="550">
			<form class="ibm-row-form" enctype="multipart/form-data" method="post" action="../operations/userOperations.php?operation=solveTicket">
				<div id="ovl-solveTicket">
					<p id="spinner"></p>
				</div>
			</form>
		</div>
	</div>
</section>

<?php
footer(); ?>
<script src="../js/ticketDetails.js"></script>
<script src="../js/solveTicket.js"></script>
<!-- <script>
$(document).on("click","#btn-solve",function() {
  console.log("le picaste a solve D:");
  console.log("i live");
  alert('a la voz de barco viene');
});
</script> -->
