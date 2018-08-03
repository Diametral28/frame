<?php
date_default_timezone_set('America/Mexico_City');
include_once(dirname(__DIR__).'/config/login.php');
include_once '../functions/getFunctions.php';

secSessionStart();

 // echo "secSessionStart";
  //session_start();
/*
  if(!loginCheck()){
    echo "<p>S&oacute;lo para usuarios registrados.";
    echo "<br><a href=\"/incidentpower/shipping\">HOME</a><br></p>";
    exit();
  }*/

function head($tipo, $rol){ 
  //echo "rol= ".$rol;
/*-------------------------------- Control de Accesos para los usuarios --------------------------------- */
  switch ($tipo) {
    /*------------ Solo super administradores --------------------- */
    case 'superadmin':
      if($rol == 1){
        //echo "admin";
      }else{

        echo "Acceso denegado, no tienes permisos para ver este contenido.<br>";
        echo "<br><a href='../semaforo3.php'>Login</a>";
        exit;
      }
     break;
     /*------------ Solo Area de Shipping Support --------------------- */
    case 'ship': 
      if($rol == 1 || $rol == 2){
        //echo "Ship";
        }else{

          echo "Acceso denegado, no tienes permisos para ver este contenido.<br>";
          echo "<br><a href='../semaforo3.php'>Login</a>";
          exit;
        }
    break;
    /*------------ Cualquier usuario --------------------- */
    case 'user': 
      if($rol == 1 || $rol == 2 || $rol == 3){
        //echo "user";
        }else{

          echo "Acceso denegado, no tienes permisos para ver este contenido.<br>";
          echo "<br><a href='../semaforo3.php'>Login</a>";
          exit;
        }
    break;
  }
  ?>
  <!DOCTYPE>
  <html lang="es-MX">
  <head>
    <style>
    label.error{color:red;}
    </style>

    <meta charset="utf-8"/>
    <meta name="geo.country" content="MX"/>
    <meta name="dcterms.rights" content="© Copyright IBM Corp. 2017" />
    <meta name="dcterms.date" content="REPLACE" />
		<meta name="description" content="REPLACE" />
		<meta name="keywords" content="REPLACE" />
		<meta name="robots" content="index, follow" />

		<meta name="generator" content="IBM Northstar Template Generator 1.1" />

    <!-- <link rel="stylesheet" type="text/css" href="template.css"> -->
    <title>Incident Tracker Shipping Support</title>

    <script>
			digitalData = {
				"page":{
					"category":{
						"primaryCategory":"REPLACE",
						"ibm":[

						]
					},
					"pageInfo":{
						"effectiveDate":"REPLACE",
						"expiryDate":"REPLACE",
						"language":"es-MX",
						"publishDate":"REPLACE",
						"publisher":"IBM Corporation",
						"version":"v18",
						"pageID":"REPLACE",
						"ibm":{
							"contentDelivery":"HTML",
							"contentProducer":"IBM Northstar Template Generator 1.1",
							"country":"MX",
							"industry":"REPLACE",
							"owner":"REPLACE",
							"siteID":"REPLACE",
							"subject":"REPLACE",
							"type":"REPLACE",
							"wwCase":"REPLACE",
							"cc":"mx",
							"lc":"es",
							"cpi":"mxes",
							"encoding":"utf8",
							"encodingRaw":"utf-8",
							"title":"Incident Tracker"
						},
						"coremetrics":[

						],
						"tealium":[

						],
						"metrics":[

						],
						"urlID":"northstar-tg.eu-gb.mybluemix.net",
						"keywords":"REPLACE",
						"description":"REPLACE"
					},
					"attributes":[

					],
					"session":[

					]
				},
				"event_coordinator":[

				],
				"isLoaded":true,
				"user":{
					"profile":[

					],
					"segment":[

					]
				}
			};
		</script>
    <!--aqui van las librerias!!-->
    <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
		<link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
		<script src="//1.www.s81c.com/common/v18/js/www.js"></script>
		<script src="//1.www.s81c.com/common/v18/js/tables.js"></script>
		<link href="//1.www.s81c.com/common/v18/css/tables.css" rel="stylesheet">
		<link href="//1.www.s81c.com/common/v18/css/syntaxhighlighter.css" rel="stylesheet">
		<script src="//1.www.s81c.com/common/v18/js/syntaxhighlighter.js"></script>
		<link href="//1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">
		<script src="//1.www.s81c.com/common/v18/js/greensock/TweenMax.min.js"></script>
		<link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
		<script src="//1.www.s81c.com/common/v18/js/forms.js"></script>

    <script>
      IBMCore.common.util.config.set({
        "masthead":{
          "type":"alternate"
        },
        "footer":{
          "type":"alternate",
          "socialLinks":{
            "enabled":false
          }
        }
      });
    </script>
    <!-- <script src="js//jquery-1.11.3.js"></script>
          <script src="js//jquery-2.1.4.js"></script>
          <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>

  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script> -->

  </head>
  <body id="ibm-com" class="ibm-type">
    <div id="ibm-top" class="ibm-landing-page">

      <!--menu de la parte superior-->
      <!-- MASTHEAD_BEGIN -->
      <div id="ibm-masthead" role="banner" aria-label="IBM">
        <div id="ibm-mast-options">
          <ul role="toolbar" aria-labelledby="ibm-masthead">
            <li id="ibm-geo" role="presentation">
              <a href="//www.ibm.com/planetwide/select/selector.html">México</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- MASTHEAD_END -->
      <div id="ibm-content-wrapper">
        <!-- LEADSPACE_BEGIN -->
        <header role="banner" aria-labelledby="ibm-pagetitle-h1">
          <div class="ibm-sitenav-menu-container">
            <div id="ibm-home"><a href="<?php echo dirname(__DIR__)."/semaforo3.php"?>">IBM&reg;</a></div>
            <div class="ibm-sitenav-menu-name">
              <a href="<?php echo dirname(__DIR__)."/semaforo3.php"?>">&nbsp; Sistema</a>
            </div>
            <div class="ibm-sitenav-menu-list">
              <ul role="menubar">
            <!-- ADMIN_TAB -->
            <?php if ($rol == 1): ?>
              <li role="presentation" class="ibm-haschildlist">
                <span role="menuitem">Administrador</span>
                <ul role="menu">
                  <li role="presentation"><a role="menuitem" href="../_admin/userCRUD.php">Alta Usuarios</a></li>
                  <li role="presentation"><a role="menuitem" href="../_admin/catalogos.php">Cat&aacute;logos</a></li>
                </ul>
              </li>
            <?php endif ?>
            <!-- ME_TAB -->
            <?php if ($rol == 1 || $rol == 2): ?>
              <li role="presentation" class="ibm-haschildlist">
                <span role="menuitem">ME</span>
                <ul role="menu">
                  <li role="presentation"><a role="menuitem" href="../_ship/graficas.php">Gr&aacute;ficas</a></li>
                </ul>
              </li>
            <?php endif ?>
            <!-- USER_TAB -->
            <li role="presentation" class="ibm-haschildlist ibm-highlight">
              <span role="menuitem"><?php echo $_SESSION['emailUser']; ?></span>
              <ul role="menu">
                <li role="presentation">
                  <p class="ibm-center ibm-bold"><br>
                    <?php $area=getAreaById($_SESSION['areaUser']);
                    echo "$area[1]";?>
                  </p>
                </li>
                <li role="presentation"><a href="../_user/changePassword.php">Cambiar contrase&ntilde;a</a></li>
                <li role="presentation"><a href="../config/logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
            </div>
          </div>
          <!-- <div id="session"></div> -->
        </header>
<?php } ?>

<?php
function footer(){?>
      <!-- <div id="ibm-content-wrapper">
        
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm content-main">



                </div>
              </div>
            </div>
          </div>
        </main>
        <div id="ibm-related-content">
          <div id="ibm-merchandising-module">

          </div>
        </div>
      </div> -->
      <!-- Le footer -->
      <div class="ibm-legal-footer-text ibm-background-gray-10 ibm-padding-bottom-1" role="complementary" aria-label="Legal text">
        <div class="ibm-columns">
          <div class="ibm-col-1-1">
            <p>
              2018 (<a href="mailto:arjacc@mx1.ibm.com">arjacc@mx1.ibm.com</a>)
            </p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </body>

  <!-- <script src="/incidentpower/js/jquery-1.11.3.js"></script>
  <script src="/incidentpower/js/jquery-2.1.4.js"></script> -->
  <script src="/incidentpower/shipping/js/jquery-3.2.0.js"></script>
  <script src="/incidentpower/shipping/js/jquery.idle.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <link rel="stylesheet"          href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script type="text/JavaScript" src="/incidentpower/js/sha512.js"></script>
  <script type="text/JavaScript" src="/incidentpower/js/forms.js"></script>
  <script src="/incidentpower/js/jquery.idle.js"></script>
  <script src="../js/randomColor.js"></script>
  <script src="../js/Chart.js"></script>
  
  </html>
<?php } ?>
