<!--Nombre-->
<?=form_open_multipart(base_url()."producto/guardar");?>
<?=form_label("Nombre","nombre");?>
<?php $config=array("type"=>"text","name"=>"nombre","id"=>"nombre","class"=>"form-control");?>
<?=form_input($config);?>
<!--precio-->
<?=form_label("Precio","precio");?>
<?php $config=array("type"=>"number","min"=>0,"name"=>"precio","id"=>"precio","class"=>"form-control");?>
<?=form_input($config);?>
<!--detalle-->
<?=form_label("Detalle","detalle");?>
<?php $config=array("name"=>"detalle","id"=>"detalle","class"=>"form-control");?>
<?=form_textarea($config);?>
<!--foto-->
<?=form_label("Foto","foto");?>
<?php $config=array("type"=>"file","name"=>"foto","id"=>"foto","class"=>"form-control");?>
<?=form_input($config);?>
<!--boton-->
<?=form_submit(" ","Guardar",array("class"=>"btn btn-success")) ;?>
<?=form_close();?>
