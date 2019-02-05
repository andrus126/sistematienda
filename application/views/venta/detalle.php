<table class="table table-bordered table-striped table-hover">
<thead>
<tr>
    <th>Producto</th>
    <th>Nit</th>
    <th>Total</th>
    <th>Cancelado</th>
    <th>Cambio</th>
</tr>
</thead>
<tr>
    <td><?=$datosventa->nombre;?></td>
    <td><?=$datosventa->nit;?></td>
    <td><?=$datosventa->totalgeneral;?></td>
    <td><?=$datosventa->cancelado;?></td>
    <td><?=$datosventa->cambio;?></td>
</tr>
</table>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr>
	<th>N</th>
    <th>Producto</th>
    <th>Cantidad</th>
    <th>PrecioUnitario</th>
    <th>Total</th>
</tr>

</thead>
<?php 
$i=$this->uri->segment(3);
$i=0;
foreach($datosdetalle->result() as $fila){$i++;?>
<tr>
	<td><?=$i;?></td>
    <td><?=$fila->nombre;?></td>
    <td><?=$fila->cantidad;?></td>
    <td><?=$fila->precio;?></td>
    <td class="text-right"><?=$fila->total;?></td>
</tr>
<?php
}
?>
</table>
