<?php

class Usuario extends CI_Controller{
    function __construct(){
        parent::__construct();//paraq no afecte el funcionamiento
        if(!$this->session->userdata("acceso")){
            redirect("login");
        }

    }

    function nuevo(){
        $config=array("titulo"=>"Nuevo Usuario");
        $this->load->view("plantilla/cabecerahtml");    
        $this->load->view("plantilla/cabecera",$config);    
        $this->load->view("Usuario/nuevo");
        $this->load->view("plantilla/pie");    
    }
    function guardar(){
        $nombre=$this->input->post("nombre");
        $paterno=$this->input->post("paterno");
        $materno=$this->input->post("materno");
        $ci=$this->input->post("ci");    
        $nivel=$this->input->post("nivel");    
        $nick=$this->input->post("nick");    
        $contra=$this->input->post("contra");    

        $datosguardar=array("nombre"=>$nombre, //referencia a los nombres de la tabla
                            "paterno"=>$paterno,
                            "materno"=>$materno,
                            "ci"=>$ci,
                            "nivel"=>$nivel,
                            "nick"=>$nick,
                            "contra"=>sha1($contra)//aumentando sha1 semanda encriptado la contraseña a la base de datos
                            );
        
        $this->load->model("Usuario_model");
        $res=$this->Usuario_model->insertar($datosguardar);
        if($res){
            $config=array("titulo"=>"Nuevo Usuario");
            $this->load->view("plantilla/cabecerahtml");    
            $this->load->view("plantilla/cabecera",$config);    
            $this->load->view("usuario/correcto");
            $this->load->view("plantilla/pie"); 
        }else{
            $config=array("titulo"=>"Nuevo Usuario");
            $this->load->view("plantilla/cabecerahtml");    
            $this->load->view("plantilla/cabecera",$config);  
            $this->load->view("usuario/error");
            $this->load->view("plantilla/pie"); 
        }



    }
    function listar(){
        $this->load->model("Usuario_model");
        $valores=$this->Usuario_model->seleccionar();
        $datosvista=array("Usuarios"=>$valores);

        $config=array("titulo"=>"Nuevo Usuario");
        $this->load->view("plantilla/cabecerahtml");    
        $this->load->view("plantilla/cabecera",$config);  
        $this->load->view("usuario/listado",$datosvista);
        $this->load->view("plantilla/pie"); 


    }











} 


?>