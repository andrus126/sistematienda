<?php
class Login extends CI_Controller{
    function index(){
        $this->load->view("login/formulario");
    }
    function verificar(){

        $this->load->library("form_validation");
        $this->form_validation->set_message("required","El campo {field} es obligatorio");
        $this->form_validation->set_message("min_length","El campo {field} debe tener mínimo {param} caracteres");
        $this->form_validation->set_message("max_length","El campo {field} debe tener máximo {param} caracteres");

        
        $this->form_validation->set_rules("nick","Usuario","required|min_length[3]|max_length[10]");
        $this->form_validation->set_rules("contra","Contraseña","required|min_length[4]");
        if($this->form_validation->run()==FALSE){
            $this->load->view("login/formulario");
        }else{
            $nick=$this->input->post("nick");
            $contra=$this->input->post("contra");

            $this->load->model("Usuario_model"); //ir a autoload y  aumentar session enla fila 61
            $r=$this->Usuario_model->validar($nick,$contra);
            
            if($r->num_rows()==1){
                $datos=$r->row();

                $datossesion=array("nombre"=>$datos->nombre,
                                   "apellidos"=>$datos->paterno." ".$datos->materno,
                                   "nivel"=>$datos->nivel,
                                   "acceso"=>1
                                  );
            $this->session->set_userdata($datossesion);
            redirect("inicio");

            }else{
                $this->load->view("login/formulario");
            }


        }  


        
    }
    function  salir(){
        $variables=array("nombre","apellidos","nivel","acceso");
        $this->session->unset_userdata($variables);
        $this->session->sess_destroy();
        redirect("login");

    }

}


?>