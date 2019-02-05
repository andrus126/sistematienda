<?php

class Producto_model extends CI_Model{

    function insertar($valores){
        $valores['fecha']=date("Y-m-d");
        $valores['hora']=date("H:i:s");
        $valores['activo']=1;
        $r=$this->db->insert("producto",$valores);
        return($r);

    }
    function seleccionar($cuantos="",$desde=""){
        $this->db->where("activo=1");
        $this->db->limit($cuantos,$desde);
        
        return $this->db->get("producto");
    }

    function eliminar($codigo){
        $this->db->where("codproducto=$codigo");
        $datos=array("activo"=>0);
        $this->db->update("producto",$datos);

    }
    function obtener($codigo){
        $this->db->where("codproducto=$codigo");
        return $this->db->get("producto");

    }
    function actualizar($datos,$codigo){
        $datos['fecha']=date("Y-m-d");
        $datos['hora']=date("H:i:s");
        
        $this->db->where("codproducto=$codigo");
        return $this->db->update("producto",$datos);
    
    }
    function total(){
        $this->db->where("activo=1");
        $r=$this->db->get("producto");
        return $r->num_rows();
        
    }
    function obtenerUno($id){
		$this->db->where("codproducto=$id and activo=1");
		
		$d=$this->db->get("producto");	
		return $d->row();
	}




}



?>