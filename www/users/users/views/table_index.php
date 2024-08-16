<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>
<table class="table table-striped">
    <thead>
        <tr class="info">                                                       
            <th><?php _t("Id"); ?></th>                              
            <th><?php _t("Contact"); ?></th>
            <th><?php _t("Rol"); ?></th>
            <th><?php _t("User"); ?></th> 
            <th><?php _t("Language"); ?></th> 
            <th><i class="fas fa-lock"></i> / <i class="glyphicon glyphicon-hourglass"></i> </th>
            <th><?php _t("Actions"); ?></th>                
        </tr>
    </thead>
    <tfoot>
        <tr>                                                       
            <th><?php _t("Id"); ?></th>                              
            <th><?php _t("Contact"); ?></th>
            <th><?php _t("Rol"); ?></th>
            <th><?php _t("User"); ?></th>     
            <th><?php _t("Language"); ?></th> 
            <th><i class="fas fa-lock"></i> / <i class="glyphicon glyphicon-hourglass"></i> </th>
            <th><?php _t("Actions"); ?></th>                
        </tr>
    </tfoot>
    <tbody>
        <?php
        foreach ($users as $user) {

            $name = contacts_field_id("name", $user['contact_id']);
            $lastname = contacts_field_id("lastname", $user['contact_id']);

            switch ($user['status']) {
                case -1: // bloquado
                    $lock = users_status_icon(-1) . " " . _tr(users_status(-1));
                    break;
                case 0: // Waiting
                    $lock = users_status_icon(0) . " " . _tr(users_status(0));
                    break;
                case 1: // on line
                    $lock = users_status_icon(1) . " " . _tr(users_status(1));
                    break;
                default:
                    break;
            }
            ?>
            <tr>
                <td><?php echo "$user[contact_id]"; ?></td>
                <td><?php echo contacts_formated($user['contact_id']); ?></td>
                <td><?php echo "$user[rol]"; ?></td>
                <td><?php echo "$user[login]"; ?></td>
                <td><?php echo "$user[language]"; ?></td>
                <td><?php echo $lock;  //echo $user['status'] //echo "$user[email]";      ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="index.php?c=contacts&a=details&id=<?php echo $user['contact_id']; ?>"><?php _t("Details"); ?></a>
                </td>
            </tr>

        <?php } ?>	
    </tbody>
</table>

<?php
$pagination->createHtml();
?>