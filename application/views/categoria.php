<div class="container" >
    <table>
        <?php
        $contador = 0;
        echo "<tr>";
        foreach ($eventos as $evento) {
            $contador++;
            if ($contador % 6 == 0) {
                echo "</tr><tr>";
            }

            echo "<td><a href='" . base_url() . "eventos/evento?id=" . $evento['event_id'] . "' ><img src='" . base_url() . "uploads/" . $evento['photo'] . "' /></a></td>";
        }
        echo "</tr>";
        ?>
    </table>
</div>

<br />
<br />