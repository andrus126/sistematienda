<?php
class Reporte extends CI_Controller{
	function __construct(){
        parent::__construct();//paraq no afecte el funcionamiento
        if(!$this->session->userdata("acceso")){
            redirect("login");
        }
    }
	function general(){
		$datos=array("titulo"=>"Reporte General");
		$this->load->view("plantilla/cabecerahtml");
		$this->load->view("plantilla/cabecera",$datos);
		$this->load->view("venta/reporte");
		$this->load->view("plantilla/pie");	
	}
	function ReporteVentaPDF(){
		$this->load->model("Venta_model");
		$ventas=$this->Venta_model->seleccionar();
		$nombre=$this->session->userdata("nombre");
		
		$this->load->library("pdf");
		
		
		// Creacion del PDF
 
		/*
		 * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
		 * heredó todos las variables y métodos de fpdf
		 */
		
		$this->pdf = new PDF("L","mm","letter");
		$this->pdf->nick($nombre);
		$this->pdf->AddPage();
		// Define el alias para el número de página que se imprimirá en el pie
		$this->pdf->AliasNbPages();
	 
		/* Se define el titulo, márgenes izquierdo, derecho y
		 * el color de relleno predeterminado
		 */
		$this->pdf->SetTitle("Listado de Ventas");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(200,200,200);
	 
		// Se define el formato de fuente: Arial, negritas, tamaño 9
		$this->pdf->SetFont('Arial', 'B', 12);
		
		$this->pdf->Cell(250,7,'REPORTE DE VENTAS',0,0,'C','0');
		$this->pdf->Ln(7);
		
		$this->pdf->SetFont('Arial', 'B', 9);
		/*
		 * TITULOS DE COLUMNAS
		 *
		 * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
		 */
 
		$this->pdf->Cell(15,7,'N','TBL',0,'C','1');
		$this->pdf->Cell(25,7,'Nombre','TB',0,'L','1');
		$this->pdf->Cell(25,7,'Nit','TB',0,'L','1');
		$this->pdf->Cell(25,7,'Total General','TB',0,'C','1');
		$this->pdf->Cell(40,7,'Cancelado','TB',0,'C','1');
		$this->pdf->Cell(25,7,'Cambio','TBR',0,'C','1');
		$this->pdf->Ln(7);
		// La variable $x se utiliza para mostrar un número consecutivo
		$x = 1;
		$tg=0;
		$tcan=0;
		$tcam=0;
		foreach ($ventas->result() as $v) {
			$tg=$tg+$v->totalgeneral;
			$tcan=$tg+$v->cancelado;
			$tcam=$tg+$v->cambio;
		  // se imprime el numero actual y despues se incrementa el valor de $x en uno
		  $this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
		  // Se imprimen los datos de cada alumno
		  $this->pdf->Cell(25,5,$v->nombre,'B',0,'L',0);
		  $this->pdf->Cell(25,5,$v->nit,'B',0,'L',0);
		  $this->pdf->Cell(25,5,number_format($v->totalgeneral,2),'B',0,'R',0);
		  $this->pdf->Cell(40,5,number_format($v->cancelado,2),'B',0,'R',0);
		  $this->pdf->Cell(25,5,number_format($v->cambio,2),'BR',0,'R',0);
		  //Se agrega un salto de linea
		  $this->pdf->Ln(5);
		}

		$this->pdf->Cell(65,7,'','LTB',0,'R','1');
		$this->pdf->Cell(25,7,number_format($tg,2),'TB',0,'R','1');
		$this->pdf->Cell(40,7,number_format($tcan,2),'TB',0,'R','1');
		$this->pdf->Cell(25,7,number_format($tcam,2),'TBR',0,'R','1');
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Lista de Ventas.pdf", 'I');
	}
	
	
	function estadistica(){
		$this->load->model("Ventadetalle_model");
		$datos=array("titulo"=>"Estadistica de Ventas");
		$this->load->view("plantilla/cabecerahtml");
		$this->load->view("plantilla/cabecera",$datos);
		$totalventas=array(
							"1"=>$this->Ventadetalle_model->mes(1),
							"2"=>$this->Ventadetalle_model->mes(2),
							"3"=>$this->Ventadetalle_model->mes(3),
							"4"=>$this->Ventadetalle_model->mes(4),
							"5"=>$this->Ventadetalle_model->mes(5),
							"6"=>$this->Ventadetalle_model->mes(6),
							"7"=>$this->Ventadetalle_model->mes(7),
							"8"=>$this->Ventadetalle_model->mes(8),
							"9"=>$this->Ventadetalle_model->mes(9),
							"10"=>$this->Ventadetalle_model->mes(10),
							"11"=>$this->Ventadetalle_model->mes(11),
							"12"=>$this->Ventadetalle_model->mes(12)
						);
		$totalcompras=array();	
		$datosvista=array("ventasmeses"=>implode(",",$totalventas),
						  "comprasmeses"=>implode(",",$totalcompras)
			);
		$this->load->view("venta/estadistica",$datosvista);
		$this->load->view("plantilla/pie");	
	}
}
?>