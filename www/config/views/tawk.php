<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>


        <?php
        // Entrega un mensaje si es actualizado
        sms($sms);
        ?>

        <h1>
            <?php echo icon('comment'); ?>
            <?php _t("Live chat tawk"); ?>
        </h1>

        <p>
            <?php
            _t('Online chat system to contact directly with Factuz, administration and developers');
            ?>
        </p>

        <form class="form-inline" method="post" action='index.php'>
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_tawk">
            <input type="hidden" name="redi" value="1">

            <div class="radio">
                <label>
                    <input type="radio" name="data" id="tawk" value="1" <?php echo (_options_option('config_tawk_activated') == 1 ) ? " checked " : ""; ?> >
                    <?php _t("Activate chat"); ?>
                </label>
            </div>

            <br>

            <div class="radio">
                <label>
                    <input type="radio" name="data" id="tawk" value="0" <?php echo (_options_option('config_tawk_activated') == 0 ) ? " checked " : ""; ?> >
                    <?php _t("Disable chat"); ?>
                </label>
            </div>

            <br>
            <br>


            <button type="submit" class="btn btn-danger">
                <?php _t("Save"); ?>
            </button>

        </form>




        <hr>

        <a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <?php _t("Technical information"); ?>
        </a>



        <div class="collapse" id="collapseExample">
            <div class="well">
                The code is in : <b>www_extended/default/views/footer.php</b> last lines


            </div>
        </div>







    </div>
</div>

<?php include view("home", "footer"); ?> 

