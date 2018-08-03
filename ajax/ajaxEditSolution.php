<?php
include_once '../functions/getFunctions.php';
include_once '../functions/misc.php';
$_idSolution=$_POST['_idSolution'];
$solution=getSolutionById($_idSolution);
// alert("$_idSolution");
?>

<div class="ibm-fluid">

  <div class="ibm-col-12-6">
    <p>
      <label for="s-name">Solution: <span class="ibm-required">*</span></label>
      <span>
        <input type="text" class="ibm-fullwidth" id="s-name" name="s-name" value="<?php echo $solution['solucion_desc']?>" readonly required>
      </span>
    </p>
  </div>
  <div class="ibm-col-12-6">
    <p>
      <label for="s-status">Status: <span class="ibm-required">*</span></label>
      <span>
        <select class="ibm-fullwidth" id="s-status" name="s-status" required>
          <option value="" selected>Seleccione... </option>
          <option value="1" <?php echo ($solution['estado']==1)?"selected":"";?>>Activo</option>
          <option value="2" <?php echo ($solution['estado']==2)?"selected":"";?>>Inactivo</option>
        </select>
      </span>
    </p>
  </div>
  <div>
    <input type="hidden" name="s-idSolution" value="<?php echo $_idSolution;?>">
  </div>
  <div class="ibm-fluid">
    <div class="ibm-col-12-4 ibm-center-block">
      <p>
        <br>
        <button type="submit" class="ibm-btn-pri ibm-btn-small ibm-btn-teal-50 ibm-fullwidth" id="btn-Solution" name="btn-Solution">Guardar</button>
      </p>
    </div>
  </div>
</div>
