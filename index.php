<?php 

include_once 'config/login.php';
include_once 'config/psl-config-Constants.php';

secSessionStart();
//session_start();
$logged = '';

if (loginCheck()) {
    $logged = 'in';
}else {
    $logged = 'out';
}
// echo $logged;
if($logged == 'in'){
    //header('Location: home.php');
    header('Location: web/semaforo3.php');
}


?>
<!DOCTYPE html>
<html lang="en-SG" >
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
        <link rel="canonical" href="" />
        <meta name="geo.country" content="SG" />
        <meta name="dcterms.rights" content="© Copyright IBM Corp. 2017" />
        <meta name="dcterms.date" content="2017-03-15" />
        <meta name="description" content="." />
        <meta name="keywords" content="Track, report, solve, incidents." />
        <meta name="robots" content="index, follow" />
        <meta name="generator" content="IBM Northstar Template Generator 2.0" />
        <title>Sistema</title>
        <script>
            digitalData = {
                "page":{
                    "category":{
                        "primaryCategory":"IBM_IncidentTracker"
                    },
                    "pageInfo":{
                        "effectiveDate":"2017-03-15",
                        "expiryDate":"2027-03-15",
                        "language":"en-SG",
                        "publishDate":"2017-03-15",
                        "publisher":"IBM Corporation",
                        "version":"v18",
                        "pageID":"REPLACE",
                        "ibm":{
                            "contentDelivery":"HTML",
                            "contentProducer":"IBM Northstar Template Generator 2.0",
                            "country":"SG",
                            "industry":"Manufacturing",
                            "owner":"Carlos Saltiel villanueva Palma/Mexico/Contr/IBM",
                            "siteID":"IBM_IncidentTracker",
                            "subject":"REPLACE",
                            "type":"REPLACE"
                        }
                    }
                }
            };
        </script>
        <script src="https://1.www.s81c.com/common/stats/ida_stats.js"></script>
        <link href="https://1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
        <script src="https://1.www.s81c.com/common/v18/js/www.js"></script>
        <link href="https://1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
        <script src="https://1.www.s81c.com/common/v18/js/forms.js"></script>
        <link href="https://1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">
        <script src="js/sha512.js"></script>
        <script src="js/forms.js"></script>
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
    </head>
    <body id="ibm-com" class="ibm-type">
        <div id="ibm-top" class="ibm-landing-page">
            <!-- MASTHEAD_BEGIN -->
            <div id="ibm-masthead" role="banner" aria-label="IBM">
                <div id="ibm-mast-options">
                    <ul role="toolbar" aria-labelledby="ibm-masthead">
                        <li id="ibm-geo" role="presentation">
                            <a href="//www.ibm.com/planetwide/select/selector.html">Sistema</a>
                        </li>
                    </ul>
                </div>
                <div id="ibm-universal-nav">
                    <div id="ibm-home"><a href="//www.ibm.com/sg-en/">IBM®</a></div>
                </div>
            </div>
            <!-- MASTHEAD_END -->
            <div id="ibm-content-wrapper">
                <!-- LEADSPACE_BEGIN -->
                <header role="banner" aria-labelledby="ibm-pagetitle-h1">
                    <div class="ibm-sitenav-menu-container">
                        <div class="ibm-sitenav-menu-name"><a href="http://calavera.gdl.mex.ibm.com/ivanalf/incidentpowersgp/index.php">Sistema</a></div>
                    </div>
                    
                    <div id="ibm-leadspace-head" class="ibm-background-blue-core ibm-alternate ibm-alternate-background" style="background-image: url(img/shipping-page.jpg); background-size: cover; background-position: 80% center; background-repeat: no-repeat;" >
                        <div id="ibm-leadspace-body" class="ibm-padding-top-r2 ibm-padding-bottom-r2">
                            <div class="ibm-columns">
                                <div class="ibm-col-1-1">
                                    <h1 id="ibm-pagetitle-h1" class="ibm-h1 ibm-light">sistema</h1>
                                    <h2 class="ibm-padding-top-20 ibm-h4">sistema</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- LEADSPACE_END -->
                    <!-- CONTENT_NAV_BEGIN -->
                    <!-- CONTENT_NAV_END -->
                    
                </header>
                <main role="main" aria-labelledby="ibm-pagetitle-h1">
                <div id="ibm-pcon">
                    <div id="ibm-content">
                        <div id="ibm-content-body">
                            
                            <div id="ibm-content-main">
                                
                                <div class="ibm-fluid">
                                    <div class="ibm-col-12-4 ibm-col-small-12-12 ibm-col-medium-12-6 ibm-center-block">
                                        <div class="ibm-card ">
                                            <div class="ibm-card__heading ibm-h2" align="center">Login</div>
                                            <!-- <div class="ibm-rule ibm-alternate"><hr></div> -->
                                            <div class="ibm-card__content">
                                                <div class="ibm-rule ibm-alternate ibm-purple-40"><hr></div><br/>
                                                <form id="formini" name="login_form" class="ibm-row-form ibm-row-form--line" method="post" action="config/processLogin.php">
                                                    
                                                    <p>
                                                        <label for="email">IBMid:</label>
                                                        <span>
                                                            <input class="ibm-fullwidth" type="text" id="email" name="email" required>
                                                        </span>
                                                    </p>
                                                    <p>
                                                        <label for="password">Password:</label>
                                                        <span>
                                                            <input class="ibm-fullwidth" type="password" id="password" name="password" onchange="formhash(this.form, this.form.password);" required>
                                                        </span>
                                                    </p>
                                                    <p class="ibm-padding-top-1">
                                                        <button class="ibm-btn-pri ibm-btn-blue-50 ibm-fullwidth" onclick="formhash(this.form, this.form.password);">Sign in</button>
                                                    </p>
                                                    <!-- <p class="ibm-padding-top-1 ibm-button-link ibm-center">
                                                        <a href="_user/recoverPassword.php">Forgot your password?</a>
                                                    </p> -->
                                                </form>
                                            </div>
                                        </div>
                                        <div align="center">
                                            <?php
                                            if (isset($_GET['error'])) {
                                                echo '<p class="ibm-error">Incorrect password or user!</p>';
                                            }
                                            if (isset($_GET['actualizado'])) {
                                                echo '<p class="error ibm-textcolor-green-50">La Contraseña fue actualizada con exito!</p>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </main>
            </div>
            <!-- FOOTER_BEGIN -->
            <!-- <div id="ibm-footer-module">
            </div>
            <footer role="contentinfo" aria-label="IBM">
                <div id="ibm-footer">
                    <h2 class="ibm-access">Footer links
                    </h2>
                    <ul>
                        <li><a href="//www.ibm.com/contact/sg/en/">Contact</a></li>
                        <li><a href="//www.ibm.com/privacy/sg/en/">Privacy</a></li>
                        <li><a href="//www.ibm.com/legal/sg/en/">Terms of use</a></li>
                    </ul>
                </div>
                
            </footer> -->
            <!-- FOOTER_END -->
        </div>
        <div class="ibm-legalfooter-text" role="complementary" aria-label="Legal text">
            <div class="ibm-columns">
                <div class="ibm-col-1-1">
                    <p><?php echo VERSIONA; ?></p>
                </div>
            </div>
        </div>
    </body>
</html>