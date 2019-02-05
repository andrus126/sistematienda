<?php
require_once APPPATH."/libraries/fpdf/fpdf.php";
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class PDF extends FPDF {
		protected $nick;

		public function nick($n){
			$this->nick=$n;	
			//echo $this->nick;
		}
        // El encabezado del PDF
        public function Header(){
            $this->Image('imagenes/logo.png',15,10,25);
            $this->SetFont('Arial','B',13);
            $this->Cell(30);
            $this->Cell(200,10,'Sistema de Ventas',0,0,'C');
            $this->Ln('5');
            $this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(200,10,date("Y"),0,0,'C');
            $this->Ln(20);
       }
       // El pie del pdf
       public function Footer(){

           $this->SetY(-15);
		   $this->Cell(250,0,"",1,0,'C');
		   $this->ln();
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,utf8_decode("Usuario: ".$this->nick."  ".'Página: '.$this->PageNo().'/{nb}'),0,0,'C');
      }
    }
?>