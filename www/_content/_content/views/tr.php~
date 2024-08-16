<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("_content", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("_content", "nav"); ?>




        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        INSERT INTO `_translations` (`id`, `content`, `language`, `translation`) VALUES
        <hr>
        <textarea class="form-control" rows="10">
INSERT INTO `_translations` (`id`, `content`, `language`, `translation`) VALUES
            <?php
            //  INSERT INTO `_translations` (`id`, `content`, `language`, `translation`) VALUES 

            foreach ($_content as $val) {


                //  echo "(NULL, 'This patient (contact) is not yours', 'fr_BE', 'Cest'),  <br>";
                echo " (NULL, \"$val[content]\", '$languageTo', \"$val[content]\"), \n";
                //UPDATE `_translations` SET `content_id` = '17' WHERE `_translations`.`content` = 'Logout' 
            }
            ?>	

        </textarea>

        <hr>

        <textarea class="form-control" rows="10">
 INSERT INTO `_translations` (`id`, `content`, `language`, `translation`) VALUES
            <?php
            //  INSERT INTO `_translations` (`id`, `content`, `language`, `translation`) VALUES 
            // INSERT INTO `_translations` (`id`, `content`, `language`, `translation`) VALUES (NULL, '$a', 'pt_PT', '$a'); 
            if (!$_content) {
                message("info", "No items");
            }

            $i = 1;
            foreach ($_content as $val) {
                //  echo "(NULL, 'This patient (contact) is not yours', 'fr_BE', 'Cest'),  <br>";
                //  
                // echo "$val[id]|$languageTo|". _content_field_id("frase",$val['id'])." \n"; 
                //    echo "(null, $val[id], \"$languageTo\", \"". _content_field_id("frase",$val['id'])."\"), \n"; 

                echo "  (null, \"$val[content]\", \"$languageTo\", \"$val[translation]\"), " . "\n";

                //UPDATE `_translations` SET `content_id` = '17' WHERE `_translations`.`content` = 'Logout' 
                $i++;
            }
            ?>	

        </textarea>



        <?php echo $i; ?>

        <hr>


        UPDATE `_translations` SET `translation` = 'TTTTTTT' WHERE `_translations`.`id` = 'xxxxxx';

        <textarea class="form-control" rows="10"><?php
            $i = 1;
            foreach ($_content as $val) {
//            echo "UPDATE `_translations` SET `translation` = 'TTTTTTT' WHERE `_translations`.`id` = 'xxxxxx'; <br>"; 
//                UPDATE `_translations` SET `translation` = '-------' WHERE `_translations`.`id` = 91062; 
                echo "x1 `x2` x3 `x4` = '$val[translation]' x5 `x2`.`x6` = '$val[0]'; \n";

                $i++;
            }
            ?>
        </textarea>
        <?php
        echo $i;
        ;
        ?>












    </div>
</div>

<?php include view("home", "footer"); ?> 

