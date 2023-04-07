<?php
include_once('./header.php');
require_once '../config/conex.php';
include_once '../modelos/modelo_login.php';
include_once('../controladores/controladorLogin.php');

require '../config/PHPMAILER/PHPMailer.php';
require '../config/PHPMAILER/SMTP.php';
require '../config/PHPMAILER/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



$usuario = new Usuario();

$roles = $usuario->obtenerRoles();
$estados = $usuario->obtenerEstados();
$empleados = $usuario->obtenerEmpleados();
$cargos = $usuario->obtenerCargos();
$password = generateRandomString();
$db = getConexion();

//Genera aleatoriamente la contraseña
function generateRandomString($length = 10)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/.@#_', ceil($length / strlen($x)))), 1, $length);
}

if (!empty($_POST)) {


    $usuario = $_POST['txtusuario'];
    $nombres = $_POST['empleado'];
    $apellidos = $_POST['empleado'];
    // $nombre = $_POST['nombre'];
    $correo = $_POST['txtemail'];
    $empleado = $_POST['empleado'];
    $rol = $_POST['rol'];
    $cargo = $_POST['cargo'];
    $fecha = $_POST['fecha'];

    InsertarUsuarioEmppleados($nombres, $apellidos, $cargo);
    function InsertarUsuarios($username, $password, $idrol, $correo, $estado, $idEmpleado, $fecha)
    {
        $modeloUsuario = new Usuario();
        $valor = $modeloUsuario->insertarUsuario($username, $password, $idrol, $correo, $estado, $idEmpleado, $fecha);
        
        if ($valor == 'correo') {
            $_SESSION['correo'] = 'Error al insertar';
            echo "<script>
            location.href ='../Login/vista_usuarios.php';
            </script>";
        } else {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'garciainversiones.ig2022@gmail.com';
            $mail->Password = 'blfpmkfghwyllucw';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->setFrom('garciainversiones.ig2022@gmail.com');
            $mail->addAddress($correo);
            $mail->addCC('garciainversiones.ig2022@gmail.com');
            $mail->ContentType = 'text/html';
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true); 
            $mail->Subject = 'Credenciales';
            $mail->Body    = '<div style="width: 100%; height: 50px; background-color: cyan; flex: 1"><center><h1>Servicio y Color</h1></center></div>';
            // $mail->Body    .= '<br><h1>Inicia sesion con las siguientes credenciales</h1>';
            // $mail->Body    .= '<p>Usuario:contrasena: </p>';
            // $mail->Body   .= '<p>Contraseña: </p>';
            $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="width:100%;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
            <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta name="x-apple-disable-message-reformatting">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="telephone=no" name="format-detection">
            <title>Correo de confirmacion de nuevo usuario</title><!--[if (mso 16)]>
            <style type="text/css">
            a {text-decoration: none;}
            </style>
            <![endif]--><!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!--[if gte mso 9]>
            <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG></o:AllowPNG>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
            </xml>
            <![endif]-->
            <style type="text/css">
            #outlook a {
            padding:0;
            }
            .ExternalClass {
            width:100%;
            }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
            line-height:100%;
            }
            .es-button {
            mso-style-priority:100!important;
            text-decoration:none!important;
            }
            a[x-apple-data-detectors] {
            color:inherit!important;
            text-decoration:none!important;
            font-size:inherit!important;
            font-family:inherit!important;
            font-weight:inherit!important;
            line-height:inherit!important;
            }
            .es-desk-hidden {
            display:none;
            float:left;
            overflow:hidden;
            width:0;
            max-height:0;
            line-height:0;
            mso-hide:all;
            }
            .es-button-border:hover a.es-button, .es-button-border:hover button.es-button {
            background:#ffffff!important;
            border-color:#ffffff!important;
            }
            .es-button-border:hover {
            background:#ffffff!important;
            border-style:solid solid solid solid!important;
            border-color:#3d5ca3 #3d5ca3 #3d5ca3 #3d5ca3!important;
            }
            [data-ogsb] .es-button {
            border-width:0!important;
            padding:15px 20px 15px 20px!important;
            }
            @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120%!important } h1 { font-size:20px!important; text-align:center } h2 { font-size:16px!important; text-align:left } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:20px!important } h2 a { text-align:left } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:16px!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:10px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:12px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:14px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important } }
            </style>
            </head>
            <body style="width:100%;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
            <div class="es-wrapper-color" style="background-color:#FAFAFA"><!--[if gte mso 9]>
            <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
            <v:fill type="tile" color="#fafafa"></v:fill>
            </v:background>
            <![endif]-->
            <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top">
            <tr style="border-collapse:collapse">
            <td valign="top" style="padding:0;Margin:0">
            <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
            <tr style="border-collapse:collapse">
            <td class="es-adaptive" align="center" style="padding:0;Margin:0">
            <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
            <tr style="border-collapse:collapse">
            <td align="left" style="padding:10px;Margin:0">
            <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
            <tr style="border-collapse:collapse">
            <td valign="top" align="center" style="padding:0;Margin:0;width:580px">
            <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
            <tr style="border-collapse:collapse">
            <td align="center" class="es-infoblock" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><h1 style="Margin:0;line-height:30px;mso-line-height-rule:exactly;font-family:times new roman, times, baskerville, georgia, serif;font-size:25px;font-style:normal;font-weight:normal;color:#333333"><strong><span style="background-color:#ffd700">INVERSIONES GARCIA</span><span style="background-color:#FF8C00"></span></strong></h1></td>
            </tr>
            </table></td>
            </tr>
            </table></td>
            </tr>
            </table></td>
            </tr>
            </table>
            <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
            <tr style="border-collapse:collapse">
            <td style="padding:0;Margin:0;background-color:#fafafa" bgcolor="#fafafa" align="center">
            <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#ffffff;width:600px" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
            <tr style="border-collapse:collapse">
            <td style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:40px;background-color:transparent" bgcolor="transparent" align="left">
            <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
            <tr style="border-collapse:collapse">
            <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
            <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top" width="100%" cellspacing="0" cellpadding="0" role="presentation">
            
            <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px"><h1 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#333333"><b><span style="background-color:#FF8C00">¡Inicie sesión con las siguientes credenciales!</span></b></h1></td>
            </tr>
            <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0;padding-top:25px;padding-left:40px;padding-right:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#666666;font-size:16px">Si no realizó esta solicitud, simplemente ignore este correo electrónico. De lo contrario, inicie sesión con los siguientes datos:</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#666666;font-size:16px;text-align:center"><strong>USUARIO:' . $username . '&nbsp;<br>CONTRASEÑA:' . $password . '</strong>&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp;</p></td>
            </tr>
            </table></td>
            </tr>
            </table></td>
            </tr>
            <tr style="border-collapse:collapse">
            <td align="left" style="Margin:0;padding-top:5px;padding-bottom:20px;padding-left:20px;padding-right:20px">
            <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
            <tr style="border-collapse:collapse">
            <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
            <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
              <tr>
                <td align="center" style="padding-top: 15px; padding-bottom: 15px;"><span style="border-style: solid solid solid solid;
                border-color: #0e383d #0a3d44 #093136 #0f353a;
                background: #104850;
                border-width: 4px 4px 4px 4px;
                display: inline-block;
                border-radius: 10px;
                width: auto;"><a href="https://inversionesgarcia.000webhostapp.com/" class="es-button" target="_blank" style="font-weight: normal; border-style: solid;
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
                text-align: center;">INICIE SESION</a></span></td>
            </tr>
            </table></td>
            </tr>
            </table></td>
            </tr>
            </table></td>
            </tr>
            </table>
            <table class="es-footer" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
            <tr style="border-collapse:collapse">
            <td style="padding:0;Margin:0;background-color:#fafafa" bgcolor="#fafafa" align="center">
            <table class="es-footer-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
            
            </table></td>
            </tr>
            </table></td>
            </tr>
            </table></td>
            </tr>
            </table></td>
            </tr>
            </table>
            </div>
            </body>
            </html>';
                $mail->send();
                $_SESSION['registro'] = true;
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'EXCELENTE!',
                    text: 'USUARIO CREADO CON EXITO',
                    confirmButtonText: 'Aceptar',
                    position:'center',
                    allowOutsideClick:false,
                    padding:'1rem'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href ='../Login/vista_usuarios.php';
                     }
                })    
             </script>";
              /*  echo "<script> 
              location.href ='../Login/vista_usuarios.php';
            </script>";*/
            }
        }
        
        InsertarUsuarios($usuario, $password, $rol, $correo, 1, $empleado, $fecha);
        
        //'Wxyz23'
    
    
    }
    ?>
<br><br><br><br><br><br><br><br>
<main>
    <div class="container" style="margin-top: -200px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header" >
                        <h3 class="text-center font-weight-light my-4">Registrar usuario</h3>
                        <style>
                            h3{
                            font-family: Vladimir Script;
                            font-size: 50px;
                            }
                        </style>
                    </div>
                    <div class="card-body">

                        <form id="form-register" class="needs-validation" method="POST">
                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" name="txtusuario" id="txtUsuario" type="text" onpaste="return false" onkeypress="return sololetrasUsu(event)" placeholder="Enter your first name" maxlength="20" autocomplete="nope" size="25" required />
                                        <label for="inputEmail"><i class="fas fa-user icon"></i>&nbsp;Usuario</label>
                                        <div class="valid-feedback">
                                            Campo Válido!
                                        </div>
                                        <span id="mensaje"></span>
                                    </div>
                                </div>
                            </div>


                              <div class="form-floating mb-3">
                                <input class="form-control" name="txtemail" id="inputEmail" maxlength="45" type="email" placeholder="name@example.com" required pattern="[a-zA-Z0-9!#$%&'_+-]([\.]?[a-zA-Z0-9!#$%&'_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" />
                                <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Correo electrónico</label>
                                <div class="valid-feedback">
                                    Campo Válido!
                                </div>
                                <span id="correomensaje"></span>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select name="rol" required="true" class="form-control">
                                            <option value="" selected disabled>-- Seleccione un rol --</option>
                                            <?php while ($rowt = $roles->fetch()) { ?>
                                                <option value="<?php echo $rowt['id_rol']; ?>"><?php echo $rowt['rol']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="txtID"><i class="fa-regular fa-id-badge"></i>&nbsp;Roles</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                       <!--
                                        <select name="empleado" id="empleado" onchange="holamundo()" class="form-control" required="true">
                                            <option value="" selected disabled>-- Seleccione un empleado --</option>
                                            <?php while ($rowt = $empleados->fetch()) { ?>
                                                <option value="<?php echo $rowt['ID_EMPLEADO']; ?>"><?php echo $rowt['NOMBRE_EMPLEADO']; ?></option>
                                            <?php } ?>
                                        </select> 
                                       
                                        <label for="txtID"><i class="fa-regular fa-id-badge"></i>&nbsp;Empleado</label>
                                         -->
                                        
                                        <input class="form-control" name="empleado" id="empleado" type="text" placeholder="Nombre Completo Usuario" maxlength="100" autocomplete="nope" size="25" required />
                                        <label for="inputEmail"><i class="fas fa-envelope icon"></i>&nbsp;Nombre Completo Usuario</label>
                                        <div class="valid-feedback">
                                                Campo Valido!
                                            </div>
                                        <div class="invalid-feedback">
                                                No se permiten numeros ni caracteres especiales en Nombre Completo Usuario.
                                            </div>
                                        </div>                                  
                            </div>
                            <p class="formulario__input-error" id="fechamensaje"></p>
                            <div class="form-floating mb-3 mb-md-0">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="vencimiento" name="fecha" type="date" required />
                                    <label for="fecha"><i class="fas fa-envelope icon"></i>&nbsp;Fecha de vencimiento</label>
                                    <div class="valid-feedback">
                                                Campo Valido!
                                            </div>
                                        <div class="invalid-feedback">
                                        La fecha debe ser mayor o igual a la actual.
                                            </div>
                                </div>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <select name="cargo" id="cmbestadocargos" class="form-control">
                                    <option value="" selected disabled>--Seleccione una opción--</option>
                                    <?php while ($rowt = $cargos->fetch()) { ?>
                                        <option value="<?php echo $rowt['ID_CARGO']; ?>"><?php echo $rowt['DESCRIPCION_CARGO']; ?></option>
                                    <?php } ?>
                                </select>

                                <label for="txtID"><i class="fa-solid fa-user-group"></i>&nbsp;Cargos</label>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" id="Registrar" class="btn btn-info" style="background-color:rgba(0, 177, 33, 0.91);" value="Registrar" />

                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><input type="button" onclick="window.location.href='../Login/vista_usuarios.php'" id="button" class="btn btn-danger btn-lock" style="background-color:rgba(180, 0, 0, 0.91);" value="Cancelar" />

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <script src="./js/validar.js" type="text/javascript"></script>
        <script src="./js/moment.js"></script>
        <script src="./js/jquery.js" type="text/javascript"></script>
        <script>
    var nombre = document.getElementsByName('empleado')[0];
    nombre.addEventListener('keypress', function(e) {
        var regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/;
        var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (!regex.test(key)) {
            e.preventDefault();
            // Efecto de sombra color rojo en el borde
            nombre.style.borderColor = "red";
            nombre.style.boxShadow = "0 0 10px red";
            nombre.classList.add("is-invalid");
            nombre.classList.remove("is-valid");
        } else {
            // Efecto de sombra color verde en el borde
            nombre.style.borderColor = "green";
            nombre.style.boxShadow = "0 0 10px green";
            nombre.classList.add("is-valid");
            nombre.classList.remove("is-invalid");
        }
    });
</script>

 <script>
    /*var correo = document.getElementsByName('txtemail')[0];
    var botonRegistro = document.getElementById('Registrar');

    correo.addEventListener('blur', function() {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(correo.value)) {
            // Efecto de sombra color rojo en el borde
            correo.style.borderColor = "red";
            correo.style.boxShadow = "0 0 10px red";
            correo.classList.add("is-invalid");
            correo.classList.remove("is-valid");
            botonRegistro.disabled = true; // deshabilitar el botón
        } else {
            // Efecto de sombra color verde en el borde
            correo.style.borderColor = "green";
            correo.style.boxShadow = "0 0 10px green";
            correo.classList.add("is-valid");
            correo.classList.remove("is-invalid");
            botonRegistro.disabled = false; // habilitar el botón
        }
    });*/
</script>
<script>
    
    /*  FUNCION PARA QUE LO QUE SE ESCRIBA SEA AUTOMATICAMENTE EN MAYÚSCULAS
    
    var nombre = document.getElementsByName('empleado')[0];
    nombre.addEventListener('input', function(e) {
        var regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/;
        var key = nombre.value.charAt(nombre.value.length-1);
        if (!regex.test(key)) {
            e.preventDefault();
            // Efecto de sombra color rojo en el borde
            nombre.style.borderColor = "red";
            nombre.style.boxShadow = "0 0 10px red";
            nombre.classList.add("is-invalid");
            nombre.classList.remove("is-valid");
        } else {
            // Convertir a mayúsculas
            nombre.value = nombre.value.toUpperCase();
            // Efecto de sombra color verde en el borde
            nombre.style.borderColor = "green";
            nombre.style.boxShadow = "0 0 10px green";
            nombre.classList.add("is-valid");
            nombre.classList.remove("is-invalid");
        }
    });
    */
</script>

<script>
    
const fechaInput = document.getElementById('vencimiento');
fechaInput.addEventListener('input', validarFecha);

function validarFecha() {

  const hoy = new Date();
  hoy.setHours(0, 0, 0, 0); 


  const fechaIngresada = new Date(fechaInput.value);

  
  if (fechaIngresada < hoy) {
    fechaInput.style.borderColor = "red";
    fechaInput.style.boxShadow = "0 0 10px red";
    fechaInput.classList.add('is-invalid');
    fechaInput.value = null;
  } else {

    document.getElementById('fechamensaje').textContent = '';
    fechaInput.style.borderColor = "green";
    fechaInput.style.boxShadow = "0 0 10px green";
    fechaInput.classList.remove('is-invalid');
  }
}

</script>

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
                //validar usuario no se repita AGREGADO DENIA
    var correo = document.getElementById('inputEmail');
    var usuario = document.getElementById('txtUsuario');
    var botonRegistro = document.getElementById('Registrar');

    correo.addEventListener('blur', validarCorreo);
    usuario.addEventListener('change', validarUsuario);

    function validarCorreo() {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const formData = new FormData(document.getElementById('form-register'));
        formData.append('_action', 'validarCORREO');
        if (!regex.test(correo.value)) {
            // Efecto de sombra color rojo en el borde
            correo.style.borderColor = "red";
            correo.style.boxShadow = "0 0 10px red";
            correo.classList.add("is-invalid");
            correo.classList.remove("is-valid");
            $("#correomensaje").text("Por favor ingrese un correo electrónico válido.").css("color", "red");
            botonRegistro.disabled = true; // deshabilitar el botón
        } else {
            fetch('../controladores/controladorLogin.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(result => {
                    console.log(result.error);
                    if (result.error != '') {
                        document.querySelector('#button').disabled = true;
                        $("#correomensaje").text("El Correo ya ha sido Registrado Anteriormente").css("color", "red");
                        correo.style.borderColor = "red";
                        correo.style.boxShadow = "0 0 10px red";
                        botonRegistro.disabled = true; // deshabilitar el botón
                    } else {
                        correo.style.borderColor = "green";
                        correo.style.boxShadow = "0 0 10px green";
                        correo.classList.add("is-valid");
                        correo.classList.remove("is-invalid");
                        if (usuario.classList.contains("is-valid")) {
                            botonRegistro.disabled = false; // habilitar el botón
                        }
                        $("#correomensaje").text("").css("color", "red");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ha ocurrido un error');
                });
        }
    }

    function validarUsuario() {
        const formData = new FormData(document.getElementById('form-register'));
        formData.append('_action', 'validarusuario');
        fetch('../controladores/controladorLogin.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                console.log(result.error);
                if (result.error != '') {
                    document.querySelector('#button').disabled = true;
                    $("#mensaje").text("Usuario no Disponible").css("color", "red");
                    usuario.style.borderColor = "red";
                    usuario.style.boxShadow = "0 0 10px red";
                    botonRegistro.disabled = true; // deshabilitar el botón
                } else {
                    usuario.style.borderColor = "green";
                    usuario.style.boxShadow = "0 0 10px green";
                    usuario.classList.add("is-valid");
                    usuario.classList.remove("is-invalid");
                    if (correo.classList.contains("is-valid")) {
                        botonRegistro.disabled = false; // habilitar el botón
                    }
                    $("#mensaje").text("").css("color", "red");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ha ocurrido un error');
            });
    }



            })()
        </script>
    </div>
</main>

<?php
include_once('./footer.php');
?>