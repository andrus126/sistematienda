<?php
class Venta extends CI_Controller{
    function __construct(){
        parent::__construct();//paraq no afecte el funcionamiento
        if(!$this->session->userdata("acceso")){
            redirect("login");
        }
    }
    function nuevo(){
        $config=array("titulo"=>"Registro de Venta");
        $this->load->view("plantilla/cabecerahtml");
        $this->load->view("plantilla/cabecera",$config);
        $this->load->view("venta/nuevo");
        $this->load->view("plantilla/pie",array("archivosjs"=>array("js/venta.js")));
    }
    function fila(){
        $l=$this->input->post("l");
        $this->load->model("Producto_model");
        $datosproducto=$this->Producto_model->seleccionar();
        $this->load->view("venta/fila",array("l"=>$l,"datosproducto"=>$datosproducto));
    }
    function precio(){
        $cod=$this->input->post("cod");
        $this->load->model("Producto_model");
        $d=$this->Producto_model->obtenerUno($cod);
        echo $d->precio;
    }
    function guardar(){
        /*echo "<pre>";
        print_r($_POST);
        echo "</pre>";*/
        $nombre=$this->input->post("nombre");
        $nit=$this->input->post("nit");
        $totalgeneral=$this->input->post("totalgeneral");
        $cancelado=$this->input->post("cancelado");
        $cambio=$this->input->post("cambio");
        $p=$this->input->post("p");
        $datosventa=array("nombre"=>$nombre,
                            "nit"=>$nit,
                            "totalgeneral"=>$totalgeneral,
                            "cancelado"=>$cancelado,
                            "cambio"=>$cambio,
                            );
        $this->load->model("Venta_model");
        $this->Venta_model->insertar($datosventa);
		$codventa=$this->Venta_model->ultimo();
		
 		$this->load->model("Ventadetalle_model");
        foreach($p as $producto){
			//print_r($producto);
            $datosventadetalle=array(
									"codventa"=>$codventa,
									"codproducto"=>$producto['codproducto'],
									"stock"=>$producto['stock'],
									"cantidad"=>$producto['cantidad'],
									"precio"=>$producto['precio'],
									"total"=>$producto['total']
									);
			$this->Ventadetalle_model->insertar($datosventadetalle);
        }
		$config=array("titulo"=>"Mensaje de Venta");
		$this->load->view("plantilla/cabecerahtml");
        $this->load->view("plantilla/cabecera",$config);
        $this->load->view("venta/resultado");
        $this->load->view("plantilla/pie");
    }
	function listar(){
		$this->load->model("Venta_model");
		$datosventas=$this->Venta_model->obtener();
		$datosenviar=array("datos"=>$datosventas);
		
		$config=array("titulo"=>"Listado de Ventas");
		$this->load->view("plantilla/cabecerahtml");
        $this->load->view("plantilla/cabecera",$config);
        $this->load->view("venta/listar",$datosenviar);
        $this->load->view("plantilla/pie");	
	}
	
	function eliminar($id){
		$this->load->model("Venta_model");
		$this->Venta_model->actualizar(array("activo"=>"0"),$id);
		header("Location:".base_url()."venta/listar");	
	}
	function detalle($id){
		$this->load->model("Venta_model");
		$this->load->model("Ventadetalle_model");
		$datosventa=$this->Venta_model->obteneruno($id);
		$datosdetalle=$this->Ventadetalle_model->seleccionar($id);
		
		
		$datosenviar=array("datosventa"=>$datosventa,"datosdetalle"=>$datosdetalle);
		$config=array("titulo"=>"Listado Detallado de Ventas");
		$this->load->view("plantilla/cabecerahtml");
        $this->load->view("plantilla/cabecera",$config);
        $this->load->view("venta/detalle",$datosenviar);
        $this->load->view("plantilla/pie");				
	}
}
?>