<table class="table table-striped">
    <thead>                
        <tr class="info">                                        
            <th><?php _t("Date"); ?></th>
            <th><?php _t("User"); ?></th>
            <th><?php _t('$c'); ?></th>                                
            <th><?php _t('$a'); ?></th>                                
            <th><?php _t("Description"); ?></th>                                
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>                                
    </thead>
    <tfoot>
        <tr>                                        
            <th><?php _t("Date"); ?></th>
            <th><?php _t("User"); ?></th>
            <th><?php _t('$c'); ?></th>                                
            <th><?php _t('$a'); ?></th>                                
            <th><?php _t("Description"); ?></th>                                
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>                                                                       
        </tr>
    </tfoot>

    <tbody>
        <tr>
            <?php
            foreach ($logs as $logs_items) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=logs_items&a=details&id=' . $logs_items["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=logs_items&a=edit&id=' . $logs_items["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=logs_items&a=delete&id=' . $logs_items["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';

                echo "<tr id=\"$logs_items[id]\">";
                //    echo "<td>$logs_items[id]</td>";
                //    echo "<td>$logs_items[level]</td>";
                echo "<td>$logs_items[date]</td>";
                echo "<td><a href='index.php?c=logs_items&a=search&w=byUser&user_id=$logs_items[u_id]'>" . contacts_formated($logs_items['u_id']) . "</a></td>";
                //echo "<td>$logs_items[u_rol]</td>";
                echo "<td>$logs_items[c]</td>";
                echo "<td>$logs_items[a]</td>";
                //echo "<td>$logs_items[w]</td>";
                echo "<td>$logs_items[description]</td>";
                //echo "<td>$logs_items[doc_id]</td>";
                //echo "<td>$logs_items[crud]</td>";
                //echo "<td>$logs_items[error]</td>";
                //echo "<td>$logs_items[val_get]</td>";
                //echo "<td>$logs_items[val_post]</td>";
                //echo "<td>$logs_items[val_request]</td>";
                //echo "<td>$logs_items[ip4]</td>";
                //echo "<td>$logs_items[ip6]</td>";
                //echo "<td>$logs_items[broswer]</td>";
                echo "<td>$menu</td>";
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
</table>

<?php
$pagination->createHtml();
