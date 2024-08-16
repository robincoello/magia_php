<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<p>
    Tabla de controladores que no tienen carpeta en www

</p>

<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("Controller"); ?></th>
            <th><?php _t("CRUD"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Controller"); ?></th>
            <th><?php _t("CRUD"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            foreach ($controllers as $controller) {

                echo "<tr id=\"$folder[id]\">";
                echo "<td><a href=\"index.php?c=$folder\">$folder</a></td>";
                echo "<td>$u_rol : $permissions</td>";
                echo '<td><a href="index.php?c=controllers&a=addOk&controller=' . $folder . '&title=' . $folder . '&description=' . $folder . '&redi=2">Add ' . $folder . ' like controller</a></td>';

                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
</table>
<?php $pagination->createHtml(); ?>

