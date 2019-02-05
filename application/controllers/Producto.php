<?php

class Producto extends CI_Controller{

    function __construct(){
        parent::__construct();//paraq no afecte el funcionamiento
        if(!$this->session->userdata("acceso")){
            redirect("login");
        }

    }

    function nuevo(){
        $config=array("titulo"=>"Nuevo Producto");
        $this->load->view("plantilla/cabecerahtml");    
        $this->load->view("plantilla/cabecera",$config);    
        $this->load->view("producto/nuevo");

        $this->load->view("plantilla/pie");    
    }
    function guardar(){
        $nombre=$this->input->post("nombre");
        $precio=$this->input->post("precio");
        $detalle=$this->input->post("detalle");
        //cargar la libreria para subir fotos
        $this->load->library("upload"); //primero cargamos lalibreria
        //configuramos la libreria como segundo paso
        $config["upload_path"]="./imagenes/productos/";
        $config["allowed_types"]="jpg|png|gif";
        
        //inicializamos la libreria como tercer paso
        $this->upload->initialize($config);
        //verdad o falso sobre la carga de archivos
        if(!$this->upload->do_upload("foto")){ //do_upload sube el archivo
            print_r($this->upload->display_errors());
        }else{
            $datosarchivo=$this->upload->data();
            /*echo ("<pre>");
            print_r($datosarchivo);
            echo("</pre>");*/
            $nombrefoto=$datosarchivo['file_name'];
        }
        $datosguardar=array("nombre"=>$nombre, //referencia a los nombres de la tabla
                            "precio"=>$precio,
                            "detalle"=>$detalle,
                            "foto"=>$nombrefoto
                            );
        
        $this->load->model("Producto_model");
        $res=$this->Producto_model->insertar($datosguardar);
        if($res){
            $config=array("titulo"=>"Nuevo Producto");
            $this->load->view("plantilla/cabecerahtml");    
            $this->load->view("plantilla/cabecera",$config);    
            $this->load->view("producto/correcto");
            $this->load->view("plantilla/pie"); 
        }else{
            $config=array("titulo"=>"Nuevo Producto");
            $this->load->view("plantilla/cabecerahtml");    
            $this->load->view("plantilla/cabecera",$config);  
            $this->load->view("producto/error");
            $this->load->view("plantilla/pie"); 
        }



    }
    function listar(){
        $this->load->model("Producto_model");
        
        $this->load->library("pagination");
        $config['base_url']=base_url()."producto/listar";
        $config['per_page']=3;
        $config['total_rows']=$this->Producto_model->total();
        $config['num_links']=4;
        $config['uri_segment']=3;
        
        $desde=$this->uri->segment(3); //uri maneja la url por segmentos
        $config['full_tag_open']='<ul class="pagination">';
        $config['full_tag_close']='</ul>';
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';
        $config['cur_tag_open']='<li class="active"><span>';
        $config['cur_tag_close']='</span></li>';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        $config['first_tag_open']='<li>';
        $config['first_tag_close']='</li>';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        
        
        $this->pagination->initialize($config);
      

        
        $valores=$this->Producto_model->seleccionar($config['per_page'],$desde);

        $datosvista=array("Productos"=>$valores,"desde"=>$desde);


        $config=array("titulo"=>"Nuevo Producto");
        $this->load->view("plantilla/cabecerahtml");    
        $this->load->view("plantilla/cabecera",$config);  
        $this->load->view("producto/listado",$datosvista);
        $this->load->view("plantilla/pie"); 


    }
    function eliminar($cod){
        $this->load->model("Producto_model");
        $this->Producto_model->eliminar($cod);
        redirect("Producto/listar"); //redicrecto redirecciona a una pagina especifica
    }
    function modificar($cod){
        $this->load->model("Producto_model");
        $r=$this->Producto_model->obtener($cod);
        $fila=$r->row();
        $datosenviar=array("f"=>$fila);
        $config=array("titulo"=>"modificar Producto");
        $this->load->view("plantilla/cabecerahtml");    
        $this->load->view("plantilla/cabecera",$config);  
        $this->load->view("producto/modificar",$datosenviar);
        $this->load->view("plantilla/pie"); 
        
    }

    function actualizar(){
        $codproducto=$this->input->post("codproducto");
        $nombre=$this->input->post("nombre");
        $precio=$this->input->post("precio");
        $detalle=$this->input->post("detalle");
        $this->load->library("upload"); //primero cargamos lalibreria
        //configuramos la libreria como segundo paso
        $config["upload_path"]="./imagenes/productos/";
        $config["allowed_types"]="jpg|png|gif";
        
        //inicializamos la libreria como tercer paso
        $this->upload->initialize($config);
        //verdad o falso sobre la carga de archivos
        if(!$this->upload->do_upload("foto")){ //do_upload sube el archivo
           // print_r($this->upload->display_errors());
        }else{
            $datosarchivo=$this->upload->data();
            /*echo ("<pre>");
            print_r($datosarchivo);
            echo("</pre>");*/
            $nombrefoto=$datosarchivo['file_name'];
        }
        //--------------------validacion en caso de no envio de archivo
        if(isset($nombrefoto)){ //
        $datosmodificar=array("nombre"=>$nombre, //referencia a los nombres de la tabla
                              "precio"=>$precio,
                              "detalle"=>$detalle,
                              "foto"=>$nombrefoto
                              );
                            }else{
                                $datosmodificar=array("nombre"=>$nombre, //referencia a los nombres de la tabla
                              "precio"=>$precio,
                              "detalle"=>$detalle
                                 );
                            }  
        //--------------------------------------------                                                  
        $this->load->model("Producto_model");
        $r=$this->Producto_model->actualizar($datosmodificar,$codproducto);
        if($r){
            $config=array("titulo"=>"Modificar Producto");
            $this->load->view("plantilla/cabecerahtml");    
            $this->load->view("plantilla/cabecera",$config);    
            $this->load->view("producto/correcto");
            $this->load->view("plantilla/pie"); 
        }else{
            $config=array("titulo"=>"Modificar Producto");
            $this->load->view("plantilla/cabecerahtml");    
            $this->load->view("plantilla/cabecera",$config);  
            $this->load->view("producto/error");
            $this->load->view("plantilla/pie"); 
            }
        

    }












} 


?>