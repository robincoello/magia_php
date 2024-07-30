<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>


        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }

        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        ?>

        <h1>
            <span class="glyphicon glyphicon-envelope"></span>
            <?php _t("Email"); ?>
        </h1>

        <?php
        /*        Email 

          datos de conction

          In case you are using Gmail as your email server and there are problems

          with the connection test, please read the Google Guide / Troubleshoot problems

          https://support.google.com/mail/answer/7126229?hl=en-419 */
        ?>


        <?php include view('config', 'form_email_update'); ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 

