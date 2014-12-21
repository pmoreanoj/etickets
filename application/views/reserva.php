<div class="container" >

    <h1>Reserva</h1>

    <div class="row-fluid">
        <div id="evento" class="col-md-6" >
            <h2>Evento</h2>
            <img src="<?php echo base_url(); ?>/uploads/<?php echo $evento['photo']; ?>" />
            <h3>Nombre</h3>
            <h5><?php echo $evento['name']; ?></h5>
            <h3>Fecha</h3>
            <h5><?php echo $evento['dateTime']; ?></h5>
        </div>
        <div id="reserva" class="col-md-6" >
            <h2>Estado</h2>
            <h4><?php echo $reserva['state']; ?></h4>
            <h3>Datos</h3>
            <h5><?php echo $reserva['more']; ?></h5>
        </div>
    </div>

</div>

<br />
<br />
