<?php
class Venta_model extends CI_Model{
	function insertar($datos){
		$datos['fecha']=date("Y-m-d");
		$datos['hora']=date("H:i:s");
		$datos['activo']=1;
		$this->db->insert("venta",$datos);
	}
	function ultimo(){
		return $this->db->insert_id();	
	}	
	function obtener(){
		$this->db->where("activo=1");
		return $this->db->get("venta");		
	}
	function seleccionar(){
		$this->db->where("activo=1");
		return $this->db->get("venta");		
	}
	function obteneruno($id){
		$this->db->where("activo=1 and codventa=$id");
		$d=$this->db->get("venta");		
		return $d->row();
	}
	function actualizar($datos,$id){
		$datos['fecha']=date("Y-m-d");
		$datos['hora']=date("H:i:s");
		$this->db->where("codventa=$id");
		$this->db->update("venta",$datos);
		//$sql = $this->db->set($datos)->get_compiled_insert('producto');
		//echo $sql;	
	}
}
?>