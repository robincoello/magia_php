<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
        <?php //include view("_translations", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
        <?php //include "nav.php"; ?>


        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <h1>One by day</h1>

        <?php
        $text_to_translate = "Holz";
        ?>



        <form class="form-horizontal">


            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">
                    <?php _t('Text to translate'); ?>
                </label>
                <div class="col-sm-10">
                    <?php echo $text_to_translate; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">
                    <?php _t("Translate to"); ?>
                </label>
                <div class="col-sm-10">
                    <select class="form-control">
                        <option>Espanol</option>
                        <option>Frances</option>
                        <option>ingles</option>
                    </select>
                </div>
            </div>



            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">
                    <?php _t('Translation'); ?>
                </label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5"></textarea>
                </div>
            </div>






            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">
                        <?php _t("Save"); ?>
                    </button>
                </div>
            </div>
        </form>










    </div>

    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
        <?php //include view("_translations", "izq"); ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 

