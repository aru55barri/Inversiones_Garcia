<?php

include_once '../controladores/controladorLogin.php';
require '../config/PHPMAILER/PHPMailer.php';
require '../config/PHPMAILER/SMTP.php';
require '../config/PHPMAILER/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$usuarioverificado = $_GET["user"];

if (!empty($_POST)) {
    if (empty($_POST["Email"])) {
        echo '<div class="alert alert-danger">
        <strong>Error!</strong> Debe Ingresar el Correo Electronico del Usuario.
        </div>';
    } else {
        $correo = verificarCorreosUsuarios($usuarioverificado);
        $correoVerificado = $correo[0]["correo"];
        $idVerificado = $correo[0]["idusuario"];

        if ($correoVerificado != $_POST["Email"]) {
            echo '<div class="alert alert-danger">
            <strong>Error!</strong> Datos Incorrectos.
            </div>';
        } else {

            $mail = new PHPMailer(true);
            //Generacion de Token
            $token = bin2hex(openssl_random_pseudo_bytes(16));
            //Llamado de la funcion obtener dato..........
            $datos = obtenerDatosUsuario($_POST['Email']);
            //Variables para obtener lo que trae la variable datos.......
            $nombre = $datos [0]['nombre'];
            $correo = $datos [0]['correo'];
            $usuario = $datos [0]['usuario'];
            //Obtener fecha actual
            $actual = date('Y-m-d H:i:s');
            //Obtener horas de vigencia
            $vigencia = obtenerHorasVigencia();
            //Obtener fecha de vigencia
            $vigenciafecha = date('Y-m-d H:i:s', strtotime($actual . ' + ' . $vigencia . ' hours'));

            try {
                insertarToken($idVerificado, $token, $actual, $vigenciafecha);
                $mail->isSMTP();
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'servicioycolor2022@gmail.com';
                $mail->Password = 'kkgymxwjsadmjbbd';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->setFrom('servicioycolor2022@gmail.com');
                $mail->addAddress($correoVerificado);
                $mail->addCC('servicioycolor2022@gmail.com');
                $mail->ContentType = 'text/html';
                $mail->CharSet = 'UTF-8';
                $mail->isHTML(true);
                $mail->Subject = 'Cambio de Contraseña';
                $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
                
                <head>
                    <meta charset="UTF-8">
                    <meta content="width=device-width, initial-scale=1" name="viewport">
                    <meta name="x-apple-disable-message-reformatting">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta content="telephone=no" name="format-detection">
                    <title></title>
                    <!--[if (mso 16)]>
                    <style type="text/css">
                    a {text-decoration: none;}
                    </style>
                    <![endif]-->
                    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
                    <!--[if gte mso 9]>
                <xml>
                    <o:OfficeDocumentSettings>
                    <o:AllowPNG></o:AllowPNG>
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                </xml>
                <![endif]-->
                    <!--[if !mso]><!-- -->
                    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
                    <!--<![endif]-->
                </head>
                
                <body>
                    <div class="es-wrapper-color">
                        <!--[if gte mso 9]>
                            <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                                <v:fill type="tile" color="#07023c"></v:fill>
                            </v:background>
                        <![endif]-->
                        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="esd-email-paddings" valign="top">
                                        <table class="es-content esd-header-popover" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-stripe" align="center">
                                                        <table class="es-content-body" style="background-color: #ffffff; background-image: url(https://tlr.stripocdn.email/content/guids/CABINET_0e8fbb6adcc56c06fbd3358455fdeb41/images/vector_0Ia.png); background-repeat: no-repeat; background-position: center center;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" background="https://tlr.stripocdn.email/content/guids/CABINET_0e8fbb6adcc56c06fbd3358455fdeb41/images/vector_0Ia.png">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-structure es-p20t es-p10b es-p20r es-p20l" align="left">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="560" class="es-m-p0r esd-container-frame" valign="top" align="center">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank" href="https://viewstripo.email"><img src="https://i.ibb.co/NpHc5yG/LOGO.png" alt="Logo" style="display: block;" title="Logo" height="100px" width="100px"></a></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="esd-structure es-p30t es-p30b es-p20r es-p20l" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="es-m-p0r es-m-p20b esd-container-frame" width="560" valign="top" align="center">
                                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-text">
                                                                                                        <h1>&nbsp;Hola ' . $nombre . '! Tenemos una Solicitud para cambiar su Contraseña</h1>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-image es-p15t es-p10b" style="font-size: 0px;"><a target="_blank" href="https://viewstripo.email"><img class="adapt-img" src="https://tlr.stripocdn.email/content/guids/CABINET_dee64413d6f071746857ca8c0f13d696/images/852converted_1x3.png" alt style="display: block;" height="300"></a></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-text es-p10t es-p10b">
                                                                                                        <p>Olvidaste tu Contraseña? No hay problema - Eso nos sucede a todos!</p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="center" style="padding-top: 15px; padding-bottom: 15px;"><span style="border-style: solid solid solid solid;
                                                                                                    border-color: #26C6DA #26C6DA #26C6DA #26C6DA;
                                                                                                    background: #26C6DA;
                                                                                                    border-width: 4px 4px 4px 4px;
                                                                                                    display: inline-block;
                                                                                                    border-radius: 10px;
                                                                                                    width: auto;"><a href="https://servicioycolor.com/Pagina/Login/verificarToken.php?token=' . $token . '" class="es-button" target="_blank" style="font-weight: normal; border-style: solid;
                                                                                                    border-color: #26C6DA;
                                                                                                    border-width: 10px 25px 10px 30px;
                                                                                                    display: inline-block;
                                                                                                    background: #26C6DA;
                                                                                                    border-radius: 10px;
                                                                                                    font-size: 20px;
                                                                                                    font-family: arial,' . "'helvetica neue'" . 'helvetica, sans-serif;
                                                                                                    font-weight: normal;
                                                                                                    font-style: normal;
                                                                                                    line-height: 120%;
                                                                                                    color: #ffffff;
                                                                                                    text-decoration: none;
                                                                                                    width: auto;
                                                                                                    text-align: center;">Cambiar Contraseña</a></span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-text es-p10t es-p10b">
                                                                                                        <p>Si ignoras este E-mail, tu contraseña no sera cambiada.</p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-stripe" align="center">
                                                        <table bgcolor="#10054D" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: #10054d;">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-structure es-p35t es-p35b es-p20r es-p20l" align="left" background="https://tlr.stripocdn.email/content/guids/CABINET_0e8fbb6adcc56c06fbd3358455fdeb41/images/vector_sSY.png" style="background-image: url(https://tlr.stripocdn.email/content/guids/CABINET_0e8fbb6adcc56c06fbd3358455fdeb41/images/vector_sSY.png); background-repeat: no-repeat; background-position: left center;">
                                                                        <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="69" valign="top"><![endif]-->
                                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="69" class="es-m-p20b esd-container-frame" align="left">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-image es-m-txt-l" style="font-size: 0px;"><a target="_blank" href="https://viewstripo.email"><img src="https://tlr.stripocdn.email/content/guids/CABINET_dee64413d6f071746857ca8c0f13d696/images/group_118_lFL.png" alt style="display: block;" width="69"></a></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <!--[if mso]></td><td width="20"></td><td width="471" valign="top"><![endif]-->
                                                                        <table cellpadding="0" cellspacing="0" class="es-right" align="right">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="471" align="left" class="esd-container-frame">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="left" class="esd-block-text">
                                                                                                        <h3 style="color: #ffffff; font-size: 26px;"><b>En caso que el boton no funcione, utiliza el siguiente link:&nbsp;</b></h3>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="left" class="esd-block-text es-p10t es-p5b">
                                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://servicioycolor.com/Pagina/Login/verificarToken.php?token=' . $token . '" style="color: #ffffff; font-size: 20px;">Cambiar Contraseña</a>
                                                                                                    </td>
                                                                                                    <br>
                                                                                                    <br>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table cellpadding="0" cellspacing="0" class="es-footer" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-stripe" align="center">
                                                        <table bgcolor="#ffffff" class="es-footer-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-structure es-p30t es-p20r es-p20l" align="left">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody style="background: linear-gradient(to right, #66ccff -4%, #ffffff 108%);">
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-text">
                                                                                                        <h2>Gracias por elegirnos!</h2>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="esd-structure es-p10t es-p30b es-p20r es-p20l" align="left">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-image" style="font-size:0"><a target="_blank"><img class="adapt-img esdev-empty-img" src="https://stripo.email/static/assets/img/default-img.png" alt width="100%" height="100" style="display: none;"></a></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table cellpadding="0" cellspacing="0" class="esd-footer-popover es-footer" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-stripe" align="center">
                                                        <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left" esd-custom-block-id="541043">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody style="background-color: #99c2ff">
                                                                                <tr>
                                                                                    <td width="560" class="esd-container-frame" align="left">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="esd-block-menu" esd-tmp-menu-padding="10|10" esd-tmp-menu-color="#ffffff" esd-tmp-divider="0|solid|#ffffff">
                                                                                                        <table cellpadding="0" cellspacing="0" width="100%" class="es-menu">
                                                                                                            <tbody>
                                                                                                                <tr class="links">
                                                                                                                    <td align="center" valign="top" width="25%" class="es-p10t es-p10b es-p5r es-p5l" style="padding-bottom: 10px;"><a target="_blank" href="https://viewstripo.email" style="color: #ffffff;">About us</a></td>
                                                                                                                    <td align="center" valign="top" width="25%" class="es-p10t es-p10b es-p5r es-p5l" style="padding-bottom: 10px;"><a target="_blank" href="https://viewstripo.email" style="color: #ffffff;">News</a></td>
                                                                                                                    <td align="center" valign="top" width="25%" class="es-p10t es-p10b es-p5r es-p5l" style="padding-bottom: 10px;"><a target="_blank" href="https://viewstripo.email" style="color: #ffffff;">Career</a></td>
                                                                                                                    <td align="center" valign="top" width="25%" class="es-p10t es-p10b es-p5r es-p5l" style="padding-bottom: 10px;"><a target="_blank" href="https://viewstripo.email" style="color: #ffffff;">The shops</a></td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-social es-p10t es-p10b" style="font-size:0">
                                                                                                        <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td align="center" valign="top" class="es-p20r" esd-tmp-icon-type="facebook"><a target="_blank" href="https://www.instagram.com/servicioycolor/?igshid=YmMyMTA2M2Y="><img title="Facebook" src="https://tlr.stripocdn.email/content/assets/img/social-icons/square-colored/facebook-square-colored.png" alt="Fb" width="32" height="32"></a></td>
                                                                                                                    <td align="center" valign="top" class="es-p20r" esd-tmp-icon-type="twitter"><a target="_blank" href="https://www.instagram.com/servicioycolor/?igshid=YmMyMTA2M2Y="><img title="Twitter" src="https://tlr.stripocdn.email/content/assets/img/social-icons/square-colored/twitter-square-colored.png" alt="Tw" width="32" height="32"></a></td>
                                                                                                                    <td align="center" valign="top" class="es-p20r" esd-tmp-icon-type="instagram"><a target="_blank" href="https://www.instagram.com/servicioycolor/?igshid=YmMyMTA2M2Y="><img title="Instagram" src="https://tlr.stripocdn.email/content/assets/img/social-icons/square-colored/instagram-square-colored.png" alt="Inst" width="32" height="32"></a></td>
                                                                                                                    <td align="center" valign="top" esd-tmp-icon-type="youtube"><a target="_blank" href="https://www.instagram.com/servicioycolor/?igshid=YmMyMTA2M2Y="><img title="Youtube" src="https://tlr.stripocdn.email/content/assets/img/social-icons/square-colored/youtube-square-colored.png" alt="Yt" width="32" height="32"></a></td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-text es-p10t es-p10b" esd-links-underline="underline">
                                                                                                        <p style="font-size: 12px; color: #ffffff;">Servicio y Color&nbsp;© 2022</p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="esd-structure es-p20" align="left">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </body>
                
                </html>';
                $mail->send();
                echo '<div class="alert alert-success">
                <strong>Excelente!</strong> El Correo Electronico ha sido verificado.
                <br>Se ha enviado un correo electronico con un enlace para poder cambiar la contraseña.
                </div>';
            } catch (Exception $e) {
                echo 'El correo no pudo ser enviado.' . $mail->ErrorInfo;
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Restablecer contraseña - Digital Solution</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication" style="margin-top: -200px;">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" style="margin-top: 300px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header" style="background-color: rgb(171, 237, 230);">
                                    <h3 class="text-center font-weight-light my-4">Recuperación de contraseña</h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">Ingrese su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña.</div>
                                    <form class="needs-validation" method="post" novalidate>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="Email" name="Email" readonly value="<?php echo verificarCorreosUsuarios($usuarioverificado)[0]['correo'];?>" type="email" placeholder="name@example.com" required pattern="[a-zA-Z0-9!#$%&'_+-]([\.]?[a-zA-Z0-9!#$%&'_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" />
                                            <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp; Dirección de correo electrónico</label>
                                            <div class="valid-feedback">
                                                Campo Válido!
                                            </div>
                                            <div class="invalid-feedback">
                                                Por favor complete el campo, debe contener @ y un dominio.
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="../index.php">Volver al inicio de sesión</a>
                                            <input type="submit" class="btn btn-primary" value="Restablecer Contraseña">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="../Login/Registro.php">¿Necesita una cuenta? ¡Únete!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>