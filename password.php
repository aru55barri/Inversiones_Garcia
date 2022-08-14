<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <link href="./dist/css/login.css" rel="stylesheet" /> 
    <title>Restablecer contraseña</title>
    

  </head>
  
  <body class="login-page" _c_t_common="1" >
<br><br><br><br><br><br><br>
      <div class="container-fluid">
         <div class="row justify-content-center mt-5">
            <div class="col-md-3 d-lg-block col-md-5  col-sm-8  col-xl-3 " >
                <div  class="card card-outline card-primary">
                    <div class="card-header bg-white ">
                       <h3 class=" text-center"> <strong>Restablecer la contrase&ntilde;a </strong> </h3>
                       <style>
                       h3{
                        font-family: Vladimir Script;
                        font-size: 70px;
                         }
                      </style>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="POST" action="../../modelos/metodo_seleccionado_recuperacion.php">
                            <div class="input-group mb-1">
                             <p><strong>¿Olvidaste tu contraseña?</strong></p></br>
                               <p class="fw-normal ">Ingresa tu nombre  usuario para restablecer la contraseña.</p>
                            </div>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                               <span class="input-group-text" ><i class="fas fa-user"></i></span>
                              </div>
                              <input required pattern="[A-Z]{<?php echo $valor1;?>,<?php echo $valor2;?>}"  onkeyup="noespacio(this, event);mayus(this)"  required type="text" name="usuario" class="form-control"  placeholder="Nombre de usuario"   minlength="<?php echo $valor1;?>" maxlength="<?php echo $valor2;?>"
                                autocomplete = "off"  onkeypress="return soloLetras(event);"; onkeydown="sinespacio(this);">
                                <div class="invalid-feedback">
                                   Debe tener minimo <?php echo $valor1; ?> caracteres.
                                </div>
                            </div>
                            <div class="d-grid gap-2"><!--Botones  -->
                              
                              <button type="submit" name="recu" class="btn btn-block btn-outline-success">
                                <i class="fa fa-question-circle mr-2"></i>Preguntas de seguridad </button><br>
                              <button type="button"  onclick="location.href='login.php'" class="btn btn-block btn-danger btn-flat">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
      </div>
    
  </body>
</html>