<?php include view("home", "header"); ?>  

<div class="row">


    <div class="col-xs-12 col-md-2 col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-xs-12 col-md-2 col-lg-2">
        <?php include view("_languages", "izq"); ?>
    </div>

    <div class="col-xs-8 col-md-8 col-lg-8">
        <?php include view("_languages", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php // https://api.jquery.com/prop/ ?>


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
                    <th><?php _t("#"); ?></th>

                    <th><?php _t("Language"); ?></th>
                    <th><?php _t("Language name"); ?></th>
                    <th><?php _t("Translated"); ?></th>
                    <th><?php _t("Translated"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>
                    <th><?php _t("Users"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th><?php _t("#"); ?></th>

                    <th><?php _t("Language"); ?></th>
                    <th><?php _t("Language name"); ?></th>
                    <th><?php _t("Translated"); ?></th>
                    <th><?php _t("Translated"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>
                    <th><?php _t("Users"); ?></th>
                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <?php
                    if (!$_languages) {
                        message("info", "No items");
                    }

                    $i = 1;
                    foreach ($_languages as $_language) {

                        $total_translated = (_translations_total_by_lang($_language['language']) * 100 ) / _content_total_content();
                        ?>




                    <tr id="<?php echo "$_language[id]"; ?>"> 
                        <td><?php echo "$i"; ?></td>

                        <td><?php echo "$_language[language]"; ?></td>
                        <td><?php echo _t($_language['name']); ?></td>

                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo floor($total_translated); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo floor($total_translated); ?>%;">
                                    <?php echo ($total_translated) ? floor($total_translated) . " %" : 0 . " %" ?>
                                </div>
                            </div>
                        </td>

                        <td><?php echo _translations_total_by_lang($_language['language']) ?> / <?php echo (_content_total_content()); ?></td>
                        <td><?php echo "$_language[order_by]"; ?></td>
                        <td><?php echo "$_language[status]"; ?></td>
                        <td><?php echo (users_total_by_lang($_language['language'])) ? users_total_by_lang($_language['language']) : '-'; ?></td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <?php _t("Action"); ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="index.php?c=_languages&a=details&id=<?php echo "$_language[id]"; ?>"><?php _t("Details") ?></a></li>
                                    <li><a href="index.php?c=_languages&a=edit&id=<?php echo "$_language[id]"; ?>"><?php _t("Edit") ?></a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index.php?c=_languages&a=delete&id=<?php echo "$_language[id]"; ?>"><?php _t("Delete") ?></a></li>
                                </ul>
                            </div>
                        </td>                           
                    </tr>                            
                    <?php
                    $i++;
                }
                ?>	
                </tr>
            </tbody>

        </table>




        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

