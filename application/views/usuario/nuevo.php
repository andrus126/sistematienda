<!--Nombre-->
<?=form_open_multipart(base_url()."usuario/guardar");?>
<?=form_label("Nombre","nombre");?>
<?php $config=array("type"=>"text","name"=>"nombre","id"=>"nombre","class"=>"form-control");?>
<?=form_input($config);?>
<!--paterno-->
<?=form_label("Paterno","paterno");?>
<?php $config=array("type"=>"text","name"=>"paterno","id"=>"paterno","class"=>"form-control");?>
<?=form_input($config);?>
<!--materno-->
<?=form_label("Materno","materno");?>
<?php $config=array("type"=>"text","name"=>"materno","id"=>"materno","class"=>"form-control");?>
<?=form_input($config);?>
<!--ci-->
<?=form_label("CI","ci");?>
<?php $config=array("type"=>"text","name"=>"ci","id"=>"ci","class"=>"form-control");?>
<?=form_input($config);?>
<!--nivel-->
<?=form_label("Nivel","nivel");?>
<?php $config=array("type"=>"number","min"=>0,"name"=>"nivel","id"=>"nivel","class"=>"form-control");?>
<?=form_input($config);?>
<!--nick-->
<?=form_label("Nick","nick");?>
<?php $config=array("type"=>"text","name"=>"nick","id"=>"nick","class"=>"form-control");?>
<?=form_input($config);?>
<!--contra-->
<?=form_label("Contraseña","contra");?>
<?php $config=array("type"=>"password","name"=>"contra","id"=>"contra","class"=>"form-control");?>
<?=form_input($config);?>
<!--boton-->
<?=form_submit(" ","Guardar",array("class"=>"btn btn-success")) ;?>
<?=form_close();?>
