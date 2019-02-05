<form action="<?=base_url()?>venta/guardar" method="post">
<h1 class="text-center">Registro de Venta</h1>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>N</th>
                <th>Producto</th>
                <th>Stock</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        
       
        <tr id="marca">
            <td colspan="2"><a href="" class="btn btn-primary" id="aumentar">Aumentar</a></td>
            <td colspan="3" class="text-right">TOTAL</td>
            <td>
                 
            <input type="number" name="totalgeneral" class="form-control   text-right" id="totalgeneral" readonly>
             
            </td>
            
        </tr>
        <tr>
            <td colspan="3"><b>Nombre</b>
            <input type="text" name="nombre"class="form-control">
            </td>
            <td colspan="2" class="text-right">CANCELADO</td>
            <td><input type="number" name="cancelado" class="form-control btn-warning text-right" id="cancelado"></td>
            
        </tr>
        <tr>
            <td colspan="3">
                <b>Nit</b>
                <input type="text" name="nit"class="form-control">

            </td>
            <td colspan="2" class="text-right">CAMBIO</td>
            <td><input type="number" name="cambio" class="form-control  text-right" id="cambio" readonly></td>
            
        </tr>
    </table>
<input type="submit" value="Guardar" class="btn btn-danger">
</form>