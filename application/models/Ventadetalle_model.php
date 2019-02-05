<?php
class Ventadetalle_model extends CI_Model{
	function insertar($datos){
		$datos['fecha']=date("Y-m-d");
		$datos['hora']=date("H:i:s");
		$datos['activo']=1;
		$this->db->insert("ventadetalle",$datos);
	}	
	function seleccionar($codventa){
		$this->db->where("ventadetalle.activo=1 and ventadetalle.codventa=$codventa");
		$this->db->from('producto');
		
		$this->db->join("ventadetalle","ventadetalle.codproducto=producto.codproducto");
		return $query = $this->db->get();
	}
	function mes($mes){
		$r=$this->db->query("SELECT count(*) as Total FROM ventadetalle WHERE MONTH(fecha)=$mes");
		$dato=$r->row();
		return $dato->Total;
	}
}
?>