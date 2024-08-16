<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_contacts"); ?>
    </div>

    <div class="col-lg-8">
        <?php //include view("config", "nav"); ?>


        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Contacts view"); ?></h1>

        <?php
//        vardump(_options_option('config_contacts_view'));
        ?>

        <form method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_contacts_view">     
            <input type="hidden" name="redi" value="1">


            <div class="radio">
                <label>
                    <input type="radio" name="data" value="cdv" <?php echo (_options_option('config_contacts_view') == 'cdv') ? " checked " : ""; ?>>
                    <span class="glyphicon glyphicon-th-large"></span> CDV
                    <?php _t("Cdv"); ?>

                </label>
            </div>


            <div class="radio">
                <label>
                    <input type="radio" name="data" value="list" <?php echo (_options_option('config_contacts_view') == 'list') ? " checked " : ""; ?> >
                    <span class="glyphicon glyphicon-th-list"></span>
                    <?php _t("List"); ?>
                </label>
            </div>


            <button type="submit" class="btn btn-default">Submit</button>
        </form>






    </div>

</div>

<?php include view("home", "footer"); ?> 

