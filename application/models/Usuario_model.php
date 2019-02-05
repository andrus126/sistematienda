<?php

class Usuario_model extends CI_Model{

    function insertar($valores){
        $valores['fecha']=date("Y-m-d");
        $valores['hora']=date("H:i:s");
        $valores['activo']=1;
        $r=$this->db->insert("usuario",$valores);
        return($r);

    }
    function seleccionar(){
        $this->db->where("activo=1");


        return $this->db->get("usuario");
    }

    function validar($usu,$contra){
        $condicion=array("activo"=>1,
                         "nick"=>$usu,
                         "contra"=>sha1($contra)
                        );


        $this->db->where($condicion);
        $r=$this->db->get("usuario");
        return $r;
    }






}



?>