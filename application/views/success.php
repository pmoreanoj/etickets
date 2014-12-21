
<div class="container">
    <h2>Felicitaciones <?php echo $response['first-name'] . " " . $response['last-name'] ?></h2>
    <h3>Acabas de comprar una entrada para <?php echo $response['item-name']; ?> en la localidad <?php echo $response['localidad']; ?> por <?php echo $response['amount']; ?> </h3>
    
    <a href="<?php echo base_url(); ?>reservas/reserva?id=<?php echo $response['reserva']; ?>">Ver tu reserva</a>
    
    <br />
    <br />
</div>
