<div class="container" >
    <div class="row-fluid" >
        <br />
        <div id="evento" class="col-md-6" >
            <h2>Evento</h2>
            <img src="<?php echo base_url(); ?>/uploads/<?php echo $evento['photo']; ?>" />
            <h3>Nombre</h3>
            <h5><?php echo $evento['name']; ?></h5>
            <h3>Fecha</h3>
            <h5><?php echo $evento['dateTime']; ?></h5>
        </div>
        <div id="lugar" class="col-md-6" >
            <h2>Lugar</h2>
            <img src="<?php echo base_url(); ?>/uploads/<?php echo $lugar['photo']; ?>" />
            <h3>Nombre</h3>
            <h5><?php echo $lugar['name']; ?></h5>
            <h3>Descripcion</h3>
            <h5><?php echo $lugar['description']; ?></h5>
        </div>
    </div>
    <div class="row-fluid" >
        <div id="compra" class="col-md-1 col-md-offset-5" >
            <table><form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="yank8252+ppp-facilitator@gmail.com">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="item_name" value="<?php echo $evento['name'] ?>">
                    <tr>
                        <td>
                            <select name="amount" class="btn btn-primary">
                                <?php
                                foreach ($secciones as $seccion) {
                                    echo "<option value='" . $seccion['price'] . "' >" . $seccion['description'] . " - &#36;" . $seccion['price'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <input type="hidden" name="return" value="http://localhost/etickets/payments/success"> 
                    <input type="hidden" name="cancel_return" value="http://localhost/etickets/payments/cancel" />
                    <tr>
                        <td>
                            <input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
</div>

<br />
<br />