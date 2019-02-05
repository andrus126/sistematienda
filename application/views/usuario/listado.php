<table class="table table-border table-striped table-hover">
    <thead>
        <tr>
          <th>N</th>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>CI</th>
          <th>Nivel</th>
          <th>Nick</th>
          <th>Contraseña</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i=0;
            foreach($Usuarios->result() as $fila){
                $i++;
        ?>
        <tr>
            <td><?=$i;?></td>
            <td><?=$fila->nombre;?></td>
            <td><?=$fila->paterno;?></td>
            <td><?=$fila->materno;?></td>
            <td><?=$fila->ci;?></td>
            <td><?=$fila->nivel;?></td>
            <td><?=$fila->nick;?></td>
            <td><?=$fila->contra;?></td>
            
            

        </tr>
        <?php } ?>
    </tbody>
        



</table>