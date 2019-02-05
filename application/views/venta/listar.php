<table class="table table-bordered table-striped table-hover">
<thead>
<tr>
	<th>N</th>
    <th>Producto</th>
    <th>Nit</th>
    <th>Total</th>
    <th>Cancelado</th>
    <th>Cambio</th>
</tr>
</thead>
<?php 
$i=$this->uri->segment(3);
foreach($datos->result() as $fila){$i++;?>
<tr>
	<td><?=$i;?></td>
    <td><?=$fila->nombre;?></td>
    <td><?=$fila->nit;?></td>
    <td><?=$fila->totalgeneral;?></td>
    <td><?=$fila->cancelado;?></td>
    <td><?=$fila->cambio;?></td>
    <td>
    <a href="<?=base_url()?>venta/detalle/<?=$fila->codventa?>" class="btn btn-md btn-success">Ver Detalle</a>
    <a href="<?=base_url()?>venta/eliminar/<?=$fila->codventa?>" class="btn btn-md btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
    </td>
</tr>
<?php
}
?>
</table>
<?php //echo $this->pagination->create_links() ?>