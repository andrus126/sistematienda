<tr>
            <td><?=$l;?></td>
            <td><select name="p[<?=$l?>][codproducto]" class="producto form-control" rel="<?=$l;?>">
            <option value="">Seleccionar</option>
            <?php foreach ($datosproducto->result() as $f) {
            	?>
            	<option value="<?=$f->codproducto;?>"><?=$f->nombre;?></option>
            	<?php
            }
            ?>
            </select></td>
            <td><input name="p[<?=$l?>][stock]" type="number" class="stock form-control text-right" rel="<?=$l;?>" min="0" step="1"></td>
            <td><input name="p[<?=$l?>][cantidad]" type="number" class="cantidad form-control text-right" rel="<?=$l;?>" min="0" step="1"></td>
            <td><input name="p[<?=$l?>][precio]" type="number" class="precio form-control text-right"  rel="<?=$l;?>" min="0" step="0.1" readonly></td>
            <td><input name="p[<?=$l?>][total]"type="number" class="total form-control text-right" rel="<?=$l;?>"  min="0" step="0.1" readonly value="0"></td>
        </tr>