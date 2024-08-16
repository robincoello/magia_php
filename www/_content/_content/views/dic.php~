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







        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("#"); ?></th>                    
                    <th><?php _t("Frase"); ?></th>   
                    <th><?php echo "Diccionario"; ?></th>   
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 1;
                foreach ($_content as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>                        
                        <td><?php echo ($value['frase']); ?></td>
                        <td><?php _t($value['frase']); ?></td>
                        <td><?php //echo vardump($output = shell_exec("echo 'home' | translate -f en -t fr"));    ?></td>
                    </tr>              
                    <?php
                    $i++;
                }
                ?>
                <tr>
                    <td></td>
                </tr>    


            </tbody>


        </table>








    </div>
</div>

<?php include view("home", "footer"); ?> 

