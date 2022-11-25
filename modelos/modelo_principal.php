<?php
class ModeloPrincipal
{
    private $Modelo;
    private $db;
    private $datos;

    public function __construct()
    {
        require_once '../config/conex.php';
        $this->db = getConexion();
        $this->Modelo = array();
    }

    //insertar datos de una tabla
    public function insertar($tabla, $data)
    {
        $consulta = "insert into " . $tabla . " values(null," . $data . ")";
        $resultado = $this->db->query($consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    //insertar datos de una tabla
    public function insertargeneral($sql)
    {

        $this->db = getConexion();
        $resultado = $this->db->query($sql);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    //mostrar datos de una tabla
    public function mostrarselect($consul)
    {
        $resu = $this->db->query($consul);
        return $resu;
    }

    //mostrar datos de una tabla
    public function mostrar($tabla, $condicion)
    {
        $consul = "select * from " . $tabla . " where " . $condicion . ";";
        $resu = $this->db->query($consul);
        while ($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->datos[] = $filas;
        }
        return $this->datos;
    }

    //validacion para eliminar cesia
    public function mostrartipo($id)
    {
        $consul = "select * from tbl_usuario where id_usuario = '$id'";
        $resu = $this->db->query($consul);
        while ($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->datos[] = $filas;
        }
        return $this->datos;
    }

    //mostrar datos de una tabla general Cesia Nelson
    public function mostrargeneral($consulta)
    {
        $resu = $this->db->query($consulta);
        while ($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->datos[] = $filas;
        }
        return $this->datos;
    }

    //actualizar datos de una tabla
    public function actualizar($tabla, $data, $condicion)
    {
        $consulta = "update " . $tabla . " set " . $data . " where " . $condicion;
        $resultado = $this->db->query($consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    //actualizar empleados nelson
    public function UpdateEmpleados(
        $id,
        $nombres,
        $apellidos,
        $fecha,
        $identidad,
        $genero,
        $cargo,
        $estado
    ) {
        $sql = "UPDATE tbl_empleados
            SET NOMBRE_EMPLEADO='$nombres', APELLIDO_EMPLEADO='$apellidos', FEC_NACIMIENTO='$fecha', IDENTIDAD='$identidad', ID_GENERO='$genero', ID_CARGO='$cargo', ID_ESTADO_CIVIL='$estado'
             WHERE ID_EMPLEADO='$id'";
        $this->db->query($sql);
        $this->db = null;
    }

    public function UpdateRoles($id, $rol, $descripcion)
    {
        $sql = "UPDATE tbl_roles SET ROL='$rol', DESCRIPCION='$descripcion' WHERE ID_ROL='$id'";
        $this->db->query($sql);
        $this->db = null;
    } 

    public function UpdateObjetos($objeto,$descripcion,$idpadre,$url,$icono,$id)
    {
        $sql = "UPDATE tbl_modulos SET OBJETO='$objeto', DESCRIPCION_OBJETO='$descripcion',ID_PADRE='$idpadre', URL='$url', ICONO='$icono' WHERE ID_OBJETO='$id'";
        $this->db->query($sql);
        $this->db = null;
    }


    public function UpdatePermisos($insert,$eliminar,$editar,$consulta,$PDF,$rol,$objeto,$id)
    {
        $sql = "UPDATE tbl_permisos SET INSERTAR='$insert', ELIMINAR='$eliminar', MODIFICAR='$editar', CONSULTAR='$consulta',ID_ROL = '$rol', ID_OBJETO = '$objeto', PDF = '$PDF' WHERE ID_PERMISO='$id'";
        $this->db->query($sql);
        $this->db = null;
    }
    
    
    public function UpdateMovimientos($id,$descripcion)
    {
        $sql = "UPDATE tbl_tipo_kardex SET DESCRIPCION='$descripcion' WHERE ID_TIPOKARDEX='$id'";
        $this->db->query($sql);
        $this->db = null;
    }

    
    //eliminar datos de una tabla cesia Nelson
    public function eliminar($tabla, $condicion)
    {
        try {
            $consulta = "delete from " . $tabla . " where " . $condicion;
            $resultado = $this->db->query($consulta);
            if ($resultado) {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    //MOSTRAR USUARIOS ACTIVOS
    public function UsuarioMantenimiento($tabla, $condicion)
    {
        $consul = "select * from " . $tabla . " where " . $condicion . ";";
        $resu = $this->db->query($consul);
        while ($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->datos[] = $filas;
        }
        return $this->datos;
    }

    // $eli="delete from ".$tabla." where ".$condicion;
    // $res=$this->db->query($eli);
    // if ($res) {
    //     return true; 
    // }else {
    //     return false;
    // }

    //actualizar compra
    public function UpdateCompra($id,$sql,$can,$inventario)
    {
        $this->db = getConexion();
        $sq = "UPDATE tbl_ingreso_producto SET estado='Cancelado' WHERE id='$id'";
        $this->db->query($sq);
        $this->db = null;

        $this->db = getConexion();
        $sqt = "UPDATE tbl_inventario SET cantidad='$can' WHERE id='$inventario'";
        $this->db->query($sqt);
        $this->db = null;

       
        $this->db = getConexion();
        $resultado = $this->db->query($sql);
        if ($resultado) {
            return true;
        } else {
            return false;
        }

    }
    public function UpdateVenta($id,$sql,$can,$inventario)
    {
        $this->db = getConexion();
        $sq = "UPDATE tbl_factura SET estado= 'Cancelado' WHERE id_factura = '$id'";
        $this->db->query($sq);
        $this->db = null;

        $this->db = getConexion();
        $sqt = "UPDATE tbl_inventario SET cantidad='$can' WHERE id='$inventario'";
        $this->db->query($sqt);
        $this->db = null;

      
       $this->db = getConexion();
        $resultado = $this->db->query($sql);
        if ($resultado) {
            return true;
        } else {
            return false;
        }


    }

    


}
