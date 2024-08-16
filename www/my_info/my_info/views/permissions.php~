<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("my_info", "izq"); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
    </div>


    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-8">
        <?php //include view("my_info", "nav"); ?>     

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <?php _menu_icon('top', 'permissions') ?>
            <?php _t("Permissions"); ?>
        </h1>
        <p></p>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php _t("Role"); ?></th>
                    <th><?php _t("Controllers"); ?></th>
                    <th><?php _t("Create"); ?></th>
                    <th><?php _t("Read"); ?></th>
                    <th><?php _t("Update"); ?></th>
                    <th><?php _t("Delete"); ?></th>            
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th><?php _t("Role"); ?></th>
                    <th><?php _t("Controllers"); ?></th>
                    <th><?php _t("Create"); ?></th>
                    <th><?php _t("Read"); ?></th>
                    <th><?php _t("Update"); ?></th>
                    <th><?php _t("Delete"); ?></th>            
                </tr>
                </thead>
            <tbody>
                <?php
                $i = 1;
                foreach (permissions_search_by_rol(users_field_contact_id("rol", $u_id)) as $key => $value) {
                    ?>
                    <tr>                                            
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $value['rol']; ?></td>
                        <td><?php echo ($value['controller']); ?></td>

                        <td><?php echo ($value['crud'][0]) ? _tr("Yes") : "-"; ?></td>
                        <td><?php echo ($value['crud'][1]) ? _tr("Yes") : "-"; ?></td>
                        <td><?php echo ($value['crud'][2]) ? _tr("Yes") : "-"; ?></td>
                        <td><?php echo ($value['crud'][3]) ? _tr("Yes") : "-"; ?></td>                                                                                                        
                    </tr>
                <?php } ?>
            </tbody>  
        </table>


    </div>
</div>

<?php include view("home", "footer"); ?>
