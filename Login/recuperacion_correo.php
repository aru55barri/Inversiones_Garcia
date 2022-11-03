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
        $idVerificado = $correo[0]["id_usuario"];

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
                $mail->Host = 'mail.tusarticulosdemadera.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'inverionesgc@tusarticulosdemadera.com';
                $mail->Password = 'inversionesgarcia';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->setFrom('inverionesgc@tusarticulosdemadera.com');
                $mail->addAddress($correoVerificado);
                //$mail->addCC('inversionesgarcia@tusarticulosdemadera.com');
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
                                                            <tbody>
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
                                                                                                        <h1>&nbsp; ' . $nombre . ' Solicitud de cambio de Contraseña</h1>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-text es-p10t es-p10b">
                                                                                                        <p>Dele click al siguiente boton "Cambiar contraseña"</p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td align="center" style="padding-top: 15px; padding-bottom: 15px;"><span style="border-style: solid solid solid solid;
                                                                                                    border-color: #0e383d #0a3d44 #093136 #0f353a;
                                                                                                    background: #104850;
                                                                                                    border-width: 4px 4px 4px 4px;
                                                                                                    display: inline-block;
                                                                                                    border-radius: 10px;
                                                                                                    width: auto;"><a href="http://localhost:90/Inversiones_Garcia-main/Login/nueva_contrasena.php?token=' . $token . '" class="es-button" target="_blank" style="font-weight: normal; border-style: solid;
                                                                                                    border-color: #053238;
                                                                                                    border-width: 10px 25px 10px 30px;
                                                                                                    display: inline-block;
                                                                                                    background: #08343a;
                                                                                                    border-radius: 10px;
                                                                                                    font-size: 20px;
                                                                                                    color: #ffffff;
                                                                                                    font-family: arial,' . "'helvetica neue'" . 'helvetica, sans-serif;
                                                                                                    font-weight: normal;
                                                                                                    font-style: normal;
                                                                                                    line-height: 120%;
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
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </body>
                
                </html>';
                $mail->send();
                $alert = '<div class="alert alert-success">
                Correo Electronico verificado.
                <br>Se ha enviado un correo electronico con un enlace para poder cambiar la contraseña.
                </div>';
            } catch (Exception $e) {
                $alert = 'El correo no pudo ser enviado.' . $mail->ErrorInfo;
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
    <title>Restablecer contraseña</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../dist/css/styles.css">
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
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Recuperación de contraseña</h3>
                                    <style>
                                        h3{
                                            font-family: Vladimir Script;
                                            font-size: 50px;
                                        }
                                    </style>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">Verifique que su dirección de correo electrónico sea correcta y se enviará un enlace para restablecer su contraseña.</div>
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

                                        <?php echo isset($alert) ? $alert : ''; ?>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" style="color: rgb(46, 42, 83)" href="../index.php">Volver al inicio de sesión</a>
                                            <input type="submit" class="button2" style="width: 300px" value="Recuperación de Contraseña">
                                        </div>
                                    </form>
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