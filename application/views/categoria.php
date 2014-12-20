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

            echo "<td><img src='" . APPPATH . 'uploads/' . $evento['photo'] . "' /></td>";
        }
        echo "</tr>";
        ?>
    </table>
</div>

<br />
<br />