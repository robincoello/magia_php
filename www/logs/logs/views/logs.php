<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("Id"); ?></th>            
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Who"); ?></th>
            <th><?php _t("Action"); ?></th>
            <th><?php _t("Doc id"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>            
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Who"); ?></th>
            <th><?php _t("Action"); ?></th>
            <th><?php _t("Doc id"); ?></th>
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!logs_list_by_controller_and_doc_id($c, $id)) {
                message('info', 'No items');
            }
            //
            foreach (logs_list_by_controller_and_doc_id($c, $id) as $log) {

                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Action") . '
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=logs&a=details&id=' . $log['id'] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=logs&a=edit&id=' . $log['id'] . '">' . _tr("Edit") . '</a></li>
                            </ul>
                          </div>';

                echo "<tr>";
                //echo "<td>$log[id]</td>";
                echo "<td>$log[id]</td>";
                echo "<td>$log[date]</td>";
                echo "<td><a href=\"index.php?c=contacts&a=details&id=$log[u_id]\">" . contacts_formated($log['u_id']) . "</a></td>";
                echo "<td>$log[description]</td>";
                // echo "<td>$ log[date]</td>" ;
                //  echo "<td>$log[c]</td>";
                //  echo "<td>$log[a]</td>";
                echo "<td>$log[doc_id]</td>";
                //  echo "<td>$log[u_rol]</td>";
                // echo "<td>$ log[crud]</td>" ;
                //  echo "<td>$log[method]</td>";
                //  echo "<td>$log[data]</td>";
                // echo "<td>$ menu</td>" ;
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
</table>

