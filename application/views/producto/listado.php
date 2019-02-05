<table class="table table-border table-striped table-hover">
    <thead>
        <tr>
          <th>N</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Foto</th>
          <th width=50></th>
          <th width=50></th>

        </tr>
    </thead>
    <tbody>
        <?php 
            $i=$desde;
            foreach($Productos->result() as $fila){
                $i++;
        ?>
        <tr>
            <td><?=$i;?></td>
            <td><?=$fila->nombre;?></td>
            <td><?=$fila->precio;?></td>
            <td><?=$fila->detalle;?></td>
            <td> <img src="<?=base_url();?>imagenes/productos/<?=$fila->foto;?>" width="35" class="img-thumbnail"></td>
            <td>
                <a href="<?=base_url();?>producto/eliminar/<?=$fila->codproducto;?>" class="btn btn-danger btn-xs" onclick="if(!confirm('Esta Seguro'))return false;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="<?=base_url();?>producto/modificar/<?=$fila->codproducto;?>" class="btn btn-primary btn-xs" onclick="if(!confirm('Esta Seguro uqe desea modificar'))return false;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
            </td>
            

        </tr>
        <?php } ?>
    </tbody>
        



</table>
<?php
   echo $this->pagination->create_links();
?>