
<center><img src="<?php echo base_url(); ?>assets/custom/img/estadio.png"></center></br>
<form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="yank8252+ppp-facilitator@gmail.com">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="item_name" value="Barcelona-Emelec">
    <select name="amount">
        <option value="15.00">General</option>
        <option value="25.00">Palco</option>
        <option value="45.00">Tribuna</option>
    </select>
    <input type="hidden" name="return" value="http://localhost/etickets/payments/success"> 
    <input type="hidden" name="cancel_return" value="http://localhost/etickets/payments/cancel" />
    <input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>