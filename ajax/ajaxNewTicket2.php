<?php
include_once "../functions/getFunctions.php";
include_once "../functions/getFunctionsSAP.php";
include_once "../functions/misc.php";

$sales=$_POST['_salesOrder'];
// $sales2='0021685522';
// error_reporting(E_ALL);
// ini_set('display_errors', 'on');

$res=testSalesOrder($sales);

if($res==false){
	$resipr=testSalesOrderIpr($sales);
	if($resipr==false){
		$resub=testSalesOrderUb($sales);
		if($resub==false){

		
		?>
		<script>
		$.ajax({
			type:"POST",
			url:"../ajax/ajaxNewTicket1.php",
			beforeSend: function(){
				$("#spinner").addClass('ibm-spinner');
			},
			success: function(response){
				$("#ovl-newTicket").html(response);
			},
			error: function(xhr,ajaxOptions,thrownError) {
				$('#ovl-newTicket').html('<div><p>An error has occurred</p>'+xhr.status+": "+thrownError+'</div>');
			}
		});
		</script>
	<?php
	consoleLog("res es falso");
	alert("Sales order inválido");
		}
	}
		
}
?>
<div id="spinner"></div>
<div class="ibm-fluid">
	<div class="ibm-col-12-9">
		<p>
			<label for="frm-salesOrder">Sales Order: <span class="ibm-required">*</span></label>
			<span>
				<input type="text" class="ibm-styled-input ibm-fullwidth ibm-textcolor-green-50" value="<?php echo "$sales";?>" placeholder="Ex. 0012345678" maxlength="10" id="frm-salesOrder" name="frm-salesOrder" required readonly>
			</span>
		</p>
	</div>
	<div class="ibm-col-12-3">
		<p>
			<br>
			<button type="button" class="ibm-btn-pri ibm-btn-small ibm-btn-teal-50 ibm-fullwidth" id="btnSalesOrder" name="btnSalesOrder" disabled>Check</button>
		</p>
	</div>
</div>
</div>
<div class="ibm-fluid">
	<div class="ibm-col-12-12">
		<p>
      <!-- se saca del catalogo -->
			<label for="frm-error">Error: <span class="ibm-required">*</span></label>
			<span>
				<select class="ibm-styled-input ibm-fullwidth" id="frm-error" name="frm-error" required ondragover="">
					<option value="" selected>Seleccione...</option>
					<?php
					$err=getErrors();
					print_r($err);
					foreach ($err as $bit) {
						?>
					 	<option value="<?php echo $bit[0];?>"><?php echo "$bit[1]";?></option>
					 	<?php
					}
					?>
				</select>
			</span>
		</p>
	</div>
</div>
<div class="ibm-fluid">
	<div class="ibm-col-12-12">
		<p>
      <!-- se saca del catalogo -->
			<label for="frm-proceso">Proceso: <span class="ibm-required">*</span></label>
			<span>
				<select class="ibm-styled-input ibm-fullwidth" id="frm-proceso" name="frm-proceso" required ondragover="">
					<option value="" selected>Seleccione...</option>
					<?php
					$proc=getProcesos();
					print_r($proc);
					foreach ($proc as $bit) {
						?>
						<option value="<?php echo $bit[0];?>"><?php echo $bit[1]; ?></option>
						<?php
					}
					?>
				</select>
			</span>
		</p>
	</div>
</div>
<div class="ibm-fluid">
	<div class="ibm-col-12-12">
		<p>

			<label for="frm-descrip">Description:</label>
			<span>
				<textarea class="ibm-styled-input ibm-fullwidth" maxlength="500" rows="3" placeholder="Max. 500 chars" id="frm-descrip" name="frm-descrip" ondragover=""></textarea>
			</span>
		</p>
	</div>
</div>
<div class="ibm-fluid">
	<div class="ibm-col-12-12">
		<p>
			<label for="frm-screen">Screenshot:</label>
			<span>
				<input type="file" class="ibm-styled-input ibm-fullwidth" value="" id="frm-screen" name="frm-screen" ondragover="">
			</span>
		</p>
	</div>
</div>
<div class="ibm-fluid">
	<div class="ibm-col-12-12">
		<p>
			<label for="frm-severidad">Severidad: <span class="ibm-required">*</span></label>
			<span>
				<select class="ibm-styled-input ibm-fullwidth" id="frm-severidad" name="frm-severidad" required>
					<option value="" selected>Selecciona...</option>
					<option value="1" title="10 minutos para tomar el ticket.">Alta</option>
					<option value="2" title="15 minutos para tomar el ticket.">Media</option>
					<option value="3" title="20 minutos para tomar el ticket.">Baja</option>
				</select>
			</span>
		</p>
	</div>
</div>
<div>
	<input type="hidden" id="activa" name="activa" value="2">
</div>

<!-- <script src="../js/validSalesOrder.js"></script>  -->
