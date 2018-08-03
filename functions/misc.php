<?php

function allValues($variable){
	foreach ($variable as $key => $value) {
		echo "$key => $value<br>";
	}
}

function deleteSpaces($text){
	$string =str_replace(" ","_",$text);
	return $string;
}
function replaceCharacter($text){

	$string = str_replace("'", "''", $text);

    return $string;
}

function consoleLog($msg){
  ?>
  <script>
  console.log('<?php echo $msg;?>');
  </script>
  <?php
}

function alert($msg,$location=""){
?>
  <script>
    alert('<?php echo $msg;?>');
  </script>
<?php
if(!empty($location)){
?>
  <script>
    console.log("<?php echo $location;?>");
    self.location="<?php echo $location;?>";
  </script>
<?php
  }
}
?>

<?php
function estadoUser($estado){
  if($estado==1){
    return 'Activo';
  }else{
    return 'Inactivo';
  }
}
function rol($rol){
  switch ($rol) {
    case 1:return "Admin";break;
    case 2:return "Shipping";break;
    case 3:return "Geodis";break;
    default:
			return "No pertenece a esta sección";break;
  }
}
function severidad($severidad){
  switch ($severidad) {
    case 1:return "Alta";break;
    case 2:return "Media";break;
    case 3:return "Baja";break;
    default:
      return "No pertenece a esta sección";break;
  }
}

function tiempoAsignaBase($severidad, $fechaIni, $fechaAsi){
    $tiempo="";
        switch ($severidad) {
            case 1:
                // 10 mins Tomar el ticket, 1 hora para resolver
                $fechaRes = strtotime ( $fechaAsi ) - strtotime ( $fechaIni );
                $fechTotal = round($fechaRes / 60);
                if($fechTotal <= 10){
                    $tiempo = "On Time";
                }else{
                    $tiempo = "Due";
                }

            break;

            case 2:
               //Media - 30 mins Tomar el ticket, 4  horas para resolver
                $fechaRes = strtotime ( $fechaAsi ) - strtotime ( $fechaIni );
                $fechTotal = round($fechaRes / 60);
                if($fechTotal <= 15){
                     $tiempo = "On Time";
                }else{
                   $tiempo = "Due";
                }
            break;

            case 3:
               //Baja - 1 hora Tomar el ticket, 24 horas para resolver
                $fechaRes = strtotime ( $fechaAsi ) - strtotime ( $fechaIni );
                $fechTotal = round($fechaRes / 60);
                if($fechTotal <= 20){
                     $tiempo = "On Time";
                }else{
                   $tiempo = "Due";
                }
            break;
        }
    return $tiempo;
}

function headParallax($titulo, $subtitulo){
    ?>
<div class="ibm-band ibm-alternate-background " data-widget="parallaxscroll" style="background-image: url(../img/azul.jpg)">
    <div id="ibm-leadspace-body" class="ibm-padding-top-r1 ibm-padding-bottom-r1" style="min-height: 0px;">
        <nav role="navigation" aria-label="Breadcrumb">
            <ul id="ibm-navigation-trail">
                <li itemscope="" itemtype="//data-vocabulary.org/Breadcrumb">
                    <a href="<?php echo dirname(__DIR__); ?>/semaforo3.php" itemprop="url">
                        <span itemprop="title" class="ibm-textcolor-white-core">Inicio</span>
                    </a>
                </li>
            </ul>   
        </nav>
        <div class="ibm-columns">
            <div class="ibm-col-1-1">
                <h1 id="ibm-pagetitle-h1" class="ibm-h1 ibm-light"><?php echo $titulo; ?></h1>
                <h2 class="ibm-padding-top-20 ibm-h4 <?php echo $class ?>"><?php echo $subtitulo; ?></h2>
            </div>
        </div>
    </div>
</div>
    <?php
}
 ?>
