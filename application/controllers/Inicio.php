<?php

class Inicio extends CI_Controller{
    //contructores y destructores al inicio
    function __construct(){
        parent::__construct();//paraq no afecte el funcionamiento
        if(!$this->session->userdata("acceso")){
            redirect("login");
        }

    }


    function index(){
        $config=array("titulo"=>"Inicio");
        $this->load->view("plantilla/cabecerahtml");    
        $this->load->view("plantilla/cabecera",$config);    
        $this->load->view("inicio");

        $this->load->view("plantilla/pie");    
    }












} 


?>