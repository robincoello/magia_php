<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<p>
    Lista de carpetas que no esta registrado como controllers

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
            foreach ($folders_list as $folder) {

                $is_controller = controllers_search_by_unique('id', 'controller', $folder) ?? 'no';

                if ($is_controller) {
                    $permissions = permissions_permission($u_rol, $folder);
                }

                if (!$is_controller) {
                    echo "<tr id=\"\">";
                    echo "<td><a href=\"index.php?c=$folder\">$folder</a></td>";
                    echo "<td>$u_rol : $permissions</td>";
                    echo '<td><a href="index.php?c=controllers&a=addOk&controller=' . $folder . '&title=' . $folder . '&description=' . $folder . '&redi=2">Add ' . $folder . ' like controller</a></td>';
                    echo "</tr>";
                }
                //
                //
                //
            }
            ?>	
        </tr>
    </tbody>
</table>
<?php $pagination->createHtml(); ?>

