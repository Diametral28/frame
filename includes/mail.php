<?php
include_once '/incidentpower/PHPMailer-master/PHPMailerAutoload.php';
include_once '../functions/misc.php';
include_once '../functions/getFunctions.php';

function mailReasignTicket($ticket, $comentario){
  $subject="Ticket TC$ticket reasignado";
  $ticketDOM = getTicketById($ticket);

  $autor=$ticketDOM['autor_id'];
  $autor=getUserById($autor);
  $autor=$autor['usuario'];
  $responsable=$ticketDOM['responsable_id'];
  $responsable=getUserById($responsable);
  $responsable=$responsable['usuario'];

  $subjec="Ticket TC$ticket reasignado a $responsable";


  $fecha=$ticketDOM['fec_asignacion'];
  $hora=date("H:i",strtotime($fecha));
  $y0=$ticketDOM['fec_creacion'];
  $y0=date("Y",strtotime($fecha));
  $yf=date("Y",strtotime($fecha));
  $fecha=date("d-M",strtotime($fecha));
  if($yf-$y0>0){
    $yy="-$yf";
  }else{
    $yy="";
  }
  // echo date();
 $message="<html>
  <body>
  <div>
  <h1>El ticket TC$ticket ha sido reasignado.</h1>
  <p>
  A partir de hoy, $fecha$yy (si estamos en un a&ntilde;o diferente, agreagarlo), a las $hora
  el encargado ser&aacute; $responsable
  </p>
  <p>
  La raz&oacute;n es:<br>
  $comentario
  </p>
  </div>

  <footer>
  <p class=\"footer\">
  | Incident Tracker | IBM Power Systems 2018 | Developed by Iv&aacute;n Villa
  <a href=\"mailto:ivanalf@mx1.ibm.com\">(ivanalf@mx1.ibm.com)</a>
  &amp; Arturo Cabrera <a href=\"mailto:arjacc@mx1.ibm.com\">(arjacc@mx1.ibm.com)</a>
  | Version 1
  </p>
  </footer>

  </body>
  </html>";


  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = "smtp.gmail.com"; 
  $mail->Username = "incidentship@gmail.com"; 
  $mail->Password = "incidentpower"; 
  $mail->Port = 587; 
  $mail->SetFrom('no-replay@mx1.com.mx','no-reply');
  $mail->AddAddress($autor);
  $mail->AddAddress($responsable);

  $mail->Subject=$subject;
  $mail->MsgHTML($message);
  $mail->AltBody='Please do not reply direclty this message';
  $mail->CharSet='UFT-8';

  if(!$mail->Send()){
    echo "Mailer Error: ". $mail->ErrorInfo;
  }
}

function mailCompleteTicket($ticket){
  $ticketDOM=getTicketById($ticket);

  $serverName=$_SERVER['SERVER_NAME'];
  $subject="Ticket TC$ticket completado";
  $to=array();

  $autor_id=$ticketDOM['autor_id'];
  $autor_id=getUserById($autor_id);
  $autor_id=$autor_id['usuario'];

  $receiver=$autor_id;
  array_push($to,$receiver);
  $reciever=getUsers();
  foreach ($reciever as $key => $value) {
    $aux=$value['usuario'];
    array_push($to,$aux);
  }

  $to=array_unique($to);

  $sales_order=$ticketDOM['sales_order'];

  $fec_creacion=$ticketDOM['fec_creacion'];
  $fec_creacion=date("d-M-Y H:i", strtotime($fec_creacion));

  $fec_asignacion=$ticketDOM['fec_asignacion'];
  $fec_asignacion=date("d-M-Y H:i",strtotime($fec_asignacion));

  $fec_solucion=$ticketDOM['fec_solucion'];
  $fec_solucion=date("d-M-Y H:i", strtotime($fec_solucion));

  $resolvio_id=$ticketDOM['resolvio_id'];
  $resolvio_id=getUserById($resolvio_id);
  $resolvio_id=$resolvio_id['usuario'];

  $message=
    "<!DOCTYPE html>
    <html lang=\"es-MX\">
    <head>
    <style type=\"text/css\">

    h2{
      font-size: 1.875rem;
      line-height: 2.1875rem;
      font-family: Arial,Helvetica,sans-serif;
      font-weight: normal;
    }
    hr{
      border-color: #898290;
      border-style: solid;
      clear: both;
      margin: 4px 0 15px;
      min-height: 1px;
      padding: 0;
    }
    table{
      border-bottom: 1px solid #111;
      width: 100% !important;
      font-family: Arial,Helvetica,sans-serif;
      font-size: 16px;
      box-sizing: content-box;
      margin: 0 auto;
      clear: both;
      border-collapse: separate;
      border-spacing: 0;
    }
    thead{
      background-color: #c0e6ff;
    }
    th {
      padding: 16px 20px;
      font-weight: bold;
      text-align: left;
    }
    td{
      padding: 16px 20px;
    }
    .titulo{
      font-weight: normal;
      border-bottom: 1px solid #5a5a5a;
    }
    .ver{
      display: inline-block;
      background: #006d5d;
      border-color: #006d5d;
      color: #fff;
      margin-bottom: 8px;
      box-sizing: border-box;
      font-size: 15px;
      font-weight: normal;
      line-height: 20px;
      max-width: 100%;
      min-width: 120px;
      min-height: 20px;
      padding: 11px 18px;
      text-align: center;
      text-decoration: none;
    }
    footer{
      background-color: #f4f4f4;
      clear: both;
    }
    .footer{
      font-size: .8rem;
      line-height: 1.625rem;
      padding: 0 0 15px;
    }

  </style>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
  <title>Take Ticket</title>
  </head>
  <body>
    <h2>El ticket TC$ticket se ha cerrado</h2>
    <hr>
    <br>
    <table>
      <thead>
        <tr class=\"titulo\">
          <th>Ticket</th>
          <th>Sales order</th>
          <th>Autor</th>
          <th>Fecha de solicitud</th>
          <th>Completado por:</th>
          <th>Inicio de soluci&oacute;n</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>TS$ticket</td>
          <td>$sales_order</td>
          <td>$autor_id</td>
          <td>$fec_asignacion</td>
          <td>$resolvio_id</td>
          <td>$fec_solucion</td>
        </tr>
      </tbody>
    </table>
    <p>
      <a class=\"ver\" href=\"http://$serverName/incidentpower/shipping/_user/ticketDetails.php?st=$ticket\">revisar ticket</a>
    </p>
    <div>
      <br><br>
      <p>
        Este correo fue enviado desde una direcci&oacute;n que s&oacute;lo puede notificar, pero no recibir correos.
        Por favor no responda directamente a este mensaje.
      </p>
      <br><br>
    </div>
    <footer>
      <p class=\"footer\">
        | Incident Tracker | IBM Power Systems 2018 | Developed by Iv&aacute;n Villa
        <a href=\"mailto:ivanalf@mx1.ibm.com\">(ivanalf@mx1.ibm.com)</a>
        &amp; Arturo Cabrera <a href=\"mailto:arjacc@mx1.ibm.com\">(arjacc@mx1.ibm.com)</a>
        | Version 1
      </p>
    </footer>
  </body>
  </html>";

  $mail=new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = "smtp.gmail.com"; 
  $mail->Username = "incidentship@gmail.com"; 
  $mail->Password = "incidentpower"; 
  $mail->Port = 587; 
  $mail->SetFrom('no-reply@mx1.ibm.com', 'no-reply');
  foreach ($to as $key => $value) {
    $mail->AddAddress($value);
  }
  $mail->Subject=$subject;
  $mail->MsgHTML($message);
  $mail->AltBody='Please do not reply direclty this message';
  $mail->CharSet='UFT-8';

  if(!$mail->Send()){
    echo "Mailer Error: ". $mail->ErrorInfo;
  }
}


function mailTakeTicket($receiver, $ticket){
  $serverName=$_SERVER['SERVER_NAME'];
  $receiver=getUserById($receiver);
  $receiver=$receiver['usuario'];
  
  $to=array();
  array_push($to,$receiver);
  $reciever=getUsers();
  foreach ($reciever as $key => $value) {
    $aux=$value['usuario'];
    array_push($to,$aux);
  }

  // elimino posibles valores repetidos
  $to=array_unique($to);

  // $ticketDOM=getTicketById($ticket);
  // $to.="receiver1";
  // echo "To: $to<br>";


  $ticketDOM=getTicketById($ticket);
  $sales_order=$ticketDOM['sales_order'];

  $autor_id=$ticketDOM['autor_id'];
  $autor_id=getUserById($autor_id);
  $autor_id=$autor_id['usuario'];

  $fec_creacion=$ticketDOM['fec_creacion'];
  $fec_creacion=date("d-M-Y H:i", strtotime($fec_creacion));

  $responsable_id=$ticketDOM['responsable_id'];
  $responsable_id=getUserById($responsable_id);
  $responsable_id=$responsable_id['usuario'];
  $subject="Ticket TC$ticket en progreso tomado por $responsable_id";
  $fec_asignacion=$ticketDOM['fec_asignacion'];
  $fec_asignacion=date("d-M-Y H:i",strtotime($fec_asignacion));
  echo "$fec_asignacion<br>";

  $message=
    "<!DOCTYPE html>
    <html lang=\"es-MX\">
    <head>
    <style type=\"text/css\">

    h2{
      font-size: 1.875rem;
      line-height: 2.1875rem;
      font-family: Arial,Helvetica,sans-serif;
      font-weight: normal;
    }
    hr{
      border-color: #898290;
      border-style: solid;
      clear: both;
      margin: 4px 0 15px;
      min-height: 1px;
      padding: 0;
    }
    table{
      border-bottom: 1px solid #111;
      width: 100% !important;
      font-family: Arial,Helvetica,sans-serif;
      font-size: 16px;
      box-sizing: content-box;
      margin: 0 auto;
      clear: both;
      border-collapse: separate;
      border-spacing: 0;
    }
    thead{
      background-color: #c0e6ff;
    }
    th {
      padding: 16px 20px;
      font-weight: bold;
      text-align: left;
    }
    td{
      padding: 16px 20px;
    }
    .titulo{
      font-weight: normal;
      border-bottom: 1px solid #5a5a5a;
    }
    .ver{
      display: inline-block;
      background: #006d5d;
      border-color: #006d5d;
      color: #fff;
      margin-bottom: 8px;
      box-sizing: border-box;
      font-size: 15px;
      font-weight: normal;
      line-height: 20px;
      max-width: 100%;
      min-width: 120px;
      min-height: 20px;
      padding: 11px 18px;
      text-align: center;
      text-decoration: none;
    }
    footer{
      background-color: #f4f4f4;
      clear: both;
    }
    .footer{
      font-size: .8rem;
      line-height: 1.625rem;
      padding: 0 0 15px;
    }

  </style>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
  <title>Take Ticket</title>
  </head>
  <body>
    <h2>El ticket TC$ticket esta en proceso de resoluci&oacute;n</h2>
    <hr>
    <br>
    <table>
      <thead>
        <tr class=\"titulo\">
          <th>Ticket</th>
          <th>Sales order</th>
          <th>Autor</th>
          <th>Fecha de solicitud</th>
          <th>Responsable</th>
          <th>Fecha de toma de ticket</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>TS$ticket</td>
          <td>$sales_order</td>
          <td>$autor_id</td>
          <td>$fec_creacion</td>
          <td>$responsable_id</td>
          <td>$fec_asignacion</td>
        </tr>
      </tbody>
    </table>
    <p>
      <a class=\"ver\" href=\"http://$serverName/incidentpower/shipping/_user/ticketDetails.php?st=$ticket\">revisar ticket</a>
    </p>
    <div>
      <br><br>
      <p>
        Este correo fue enviado desde una direcci&oacute;n que s&oacute;lo puede notificar, pero no recibir correos.
        Por favor no responda directamente a este mensaje.
      </p>
      <br><br>
    </div>
    <footer>
      <p class=\"footer\">
        | Incident Tracker | IBM Power Systems 2018 | Developed by Iv&aacute;n Villa
        <a href=\"mailto:ivanalf@mx1.ibm.com\">(ivanalf@mx1.ibm.com)</a>
        &amp; Arturo Cabrera <a href=\"mailto:arjacc@mx1.ibm.com\">(arjacc@mx1.ibm.com)</a>
        | Version 1
      </p>
    </footer>
  </body>
  </html>";

  $mail=new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = "smtp.gmail.com"; 
  $mail->Username = "incidentship@gmail.com"; 
  $mail->Password = "incidentpower"; 
  $mail->Port = 587; 
  $mail->SetFrom('no-reply@mx1.ibm.com', 'no-reply');
  foreach ($to as $key => $value) {
    $mail->AddAddress($value);
  }
  $mail->Subject=$subject;
  $mail->MsgHTML($message);
  $mail->AltBody='Please do not reply direclty this message';
  $mail->CharSet='UFT-8';

  if(!$mail->Send()){
    echo "Mailer Error: ". $mail->ErrorInfo;
  }
}

function mailNewTicket($ticket){
  $serverName=$_SERVER['SERVER_NAME'];
  $subject="Ticket TC$ticket creado";
  $to=array();
  $reciever=getUsers();
  foreach ($reciever as $key => $value) {
    $aux=$value['usuario'];
    array_push($to,$aux);
  }

  $to=array_unique($to);
  $ticketDOM=getTicketById($ticket);
  $sales_order=$ticketDOM['sales_order'];
  $autor_id=$ticketDOM['autor_id'];
  $autor_id=getUserById($autor_id);
  $autor_id=$autor_id['usuario'];
  $fec_creacion=$ticketDOM['fec_creacion'];
  $fec_creacion=date("d-M-Y H:i", strtotime($fec_creacion));

  $message=
    "<!DOCTYPE html>
    <html lang=\"es-MX\">
    <head>
    <style type=\"text/css\">

    h2{
      font-size: 1.875rem;
      line-height: 2.1875rem;
      font-family: Arial,Helvetica,sans-serif;
      font-weight: normal;
    }
    hr{
      border-color: #898290;
      border-style: solid;
      clear: both;
      margin: 4px 0 15px;
      min-height: 1px;
      padding: 0;
    }
    table{
      border-bottom: 1px solid #111;
      width: 100% !important;
      font-family: Arial,Helvetica,sans-serif;
      font-size: 16px;
      box-sizing: content-box;
      margin: 0 auto;
      clear: both;
      border-collapse: separate;
      border-spacing: 0;
    }
    thead{
      background-color: #c0e6ff;
    }
    th {
      padding: 16px 20px;
      font-weight: bold;
      text-align: left;
    }
    td{
      padding: 16px 20px;
    }
    .titulo{
      font-weight: normal;
      border-bottom: 1px solid #5a5a5a;
    }
    .ver{
      display: inline-block;
      background: #006d5d;
      border-color: #006d5d;
      color: #fff;
      margin-bottom: 8px;
      box-sizing: border-box;
      font-size: 15px;
      font-weight: normal;
      line-height: 20px;
      max-width: 100%;
      min-width: 120px;
      min-height: 20px;
      padding: 11px 18px;
      text-align: center;
      text-decoration: none;
    }
    footer{
      background-color: #f4f4f4;
      clear: both;
    }
    .footer{
      font-size: .8rem;
      line-height: 1.625rem;
      padding: 0 0 15px;
    }

  </style>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
  <title>Take Ticket</title>
  </head>
  <body>
    <h2>Se ha creado el ticket TC$ticket</h2>
    <hr>
    <br>
    <table>
      <thead>
        <tr class=\"titulo\">
          <th>Ticket</th>
          <th>Sales order</th>
          <th>Autor</th>
          <th>Fecha de solicitud</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>TC$ticket</td>
          <td>$sales_order</td>
          <td>$autor_id</td>
          <td>$fec_creacion</td>
        </tr>
      </tbody>
    </table>
    <p>
      <a class=\"ver\" href=\"http://$serverName/incidentpower/shipping/_user/ticketDetails.php?st=$ticket\">revisar ticket</a>
    </p>
    <div>
      <br><br>
      <p>
        Este correo fue enviado desde una direcci&oacute;n que s&oacute;lo puede notificar, pero no recibir correos.
        Por favor no responda directamente a este mensaje.
      </p>
      <br><br>
    </div>
    <footer>
      <p class=\"footer\">
        | Incident Tracker | IBM Power Systems 2018 | Developed by Iv&aacute;n Villa
        <a href=\"mailto:ivanalf@mx1.ibm.com\">(ivanalf@mx1.ibm.com)</a>
        &amp; Arturo Cabrera <a href=\"mailto:arjacc@mx1.ibm.com\">(arjacc@mx1.ibm.com)</a>
        | Version 1
      </p>
    </footer>
  </body>
  </html>";


  $mail=new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = "smtp.gmail.com"; 
  $mail->Username = "incidentship@gmail.com"; 
  $mail->Password = "incidentpower"; 
  $mail->Port = 587; 
  $mail->SetFrom('no-reply@mx1.ibm.com', 'no-reply');
  foreach ($to as $key => $value) {
    $mail->AddAddress($value);
  }
  $mail->Subject=$subject;
  $mail->MsgHTML($message);
  $mail->AltBody='Please do not reply direclty this message';
  $mail->CharSet='UFT-8';

  if(!$mail->Send()){
    echo "Mailer Error: ". $mail->ErrorInfo;
  }
}

function mailPrueba(){
$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
$mail->Username = "incidentship@gmail.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
$mail->Password = "incidentpower"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
$mail->Port = 587; // Puerto de conexión al servidor de envio. 
$mail->From = "no-reply@mx1.ibm.com"; // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
$mail->FromName = "Ivan"; //A RELLENAR Nombre a mostrar del remitente. 
$mail->AddAddress("ivan.villa@diametral28.com"); // Esta es la dirección a donde enviamos 
$mail->IsHTML(true); // El correo se envía como HTML 
$mail->Subject = "Titulo"; // Este es el titulo del email. 
$body = "Hola mundo. Esta es la primer línea "; 
$body .= "Aquí continuamos el mensaje"; $mail->Body = $body; 
// Mensaje a enviar.  
$exito = $mail->Send(); // Envía el correo.
if($exito){ echo 'El correo fue enviado correctamente.'; }else{  echo "Mailer Error: " . $mail->ErrorInfo; } 
}


// //Create a new PHPMailer instance
// $mail = new PHPMailer();
// //Tell PHPMailer to use SMTP
// $mail->isSMTP();
// //Enable SMTP debugging
// // 0 = off (for production use)
// // 1 = client messages
// // 2 = client and server messages
// $mail->SMTPDebug = 2;
// //Set the hostname of the mail server
// $mail->Host = 'smtp.gmail.com';
// // use
// // $mail->Host = gethostbyname('smtp.gmail.com');
// // if your network does not support SMTP over IPv6
// //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
// $mail->Port = 587;
// //Set the encryption system to use - ssl (deprecated) or tls
// $mail->SMTPSecure = 'tls';
// //Whether to use SMTP authentication
// $mail->SMTPAuth = true;
// //Username to use for SMTP authentication - use full email address for gmail
// $mail->Username = "iavmvt@gmail.com";
// //Password to use for SMTP authentication
// $mail->Password = "221420085557";
// //Set who the message is to be sent from
// $mail->setFrom('iavmvt@gmail.com', 'First Last');
// //Set an alternative reply-to address
// $mail->addReplyTo('drg_henri@hotmail.com', 'First Last');
// //Set who the message is to be sent to
// $mail->addAddress('ivanalf@mx1.ibm.com', 'John Doe');
// //Set the subject line
// $mail->Subject = 'PHPMailer GMail SMTP test';
// //Read an HTML message body from an external file, convert referenced images to embedded,
// //convert HTML into a basic plain-text alternative body
// $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
// //Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';
// //Attach an image file
// //$mail->addAttachment('images/phpmailer_mini.png');
// //send the message, check for errors
// if (!$mail->send()) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// } else {
//     echo "Message sent!";
//     //Section 2: IMAP
//     //Uncomment these to save your message in the 'Sent Mail' folder.
//     #if (save_mail($mail)) {
//     #    echo "Message saved!";
//     #}
// }
//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
// function save_mail($mail)
// {
//     //You can change 'Sent Mail' to any other folder or tag
//     $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
//     //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
//     $imapStream = imap_open($path, $mail->Username, $mail->Password);
//     $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
//     imap_close($imapStream);
//     return $result;
// }
?>
