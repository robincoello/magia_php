


<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Content"); ?></th>                                                                    
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Content"); ?></th>                                                                  
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>

    <tbody>



        <tr>
            <?php
            if (!$_translations) {
                message("info", "No items");
            }
            $i = 1;
            foreach ($_translations as $_translation_items) {

                echo "<tr id=\"$_translation_items[id]\">";
                echo "<td>$i</td>";
                echo "<td>$_translation_items[id]</td>";
                echo "<td width=20%>$_translation_items[content]</td>";
                //  echo "<td>$_translation_items[language]</td>" ;
                //  echo "<td>$_translation_items[translation]</td>" ;
                //echo "<tr>"; 
                echo "<td>";
                ?>

        <form class="form-check-inline" action="index.php" method="post" >
            <input type="hidden" name="c" value="_translations">
            <input type="hidden" name="a" value="toFixOk">
            <input type="hidden" name="id" value="<?php echo "$_translation_items[id]"; ?>">





            <?php # translation  ?>
            <div class="form-group">
                <div class="form-group">
                    <label class="sr-only" for="translation">Traduction</label>               
                    <input 
                        type="text" 
                        name="translation" 
                        class="form-control"  
                        id="translation" 
                        placeholder="translation" 
                        size="5"
                        value="<?php echo "$_translation_items[translation]"; ?>" >

                </div>
            </div>
            <?php # /translation  ?>




            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">


        </form>





        <?php
        echo "</td>";
        //  echo "<td>$_translation_items[date_update]</td>" ;
        echo "</tr>";
        $i++;
    }
    ?>	
</tr>
</tbody>


</table>



<?php
// ALTER TABLE `_translations` ADD `date_update` TIMESTAMP NULL DEFAULT NULL AFTER `translation`; 
?>
