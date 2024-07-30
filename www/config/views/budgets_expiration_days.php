<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_budgets"); ?>
    </div>
    <div class="col-lg-8">
        <?php include view("config", "nav"); ?>
        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <h1><?php _t("Budgets expiration days"); ?></h1>
        <p>
            <?php _t("Maximun days to which you want to recive the payment counted from the document date"); ?>
        </p>    
        <?php
        $redi = false;

        include view('config', 'form_budgets_expiration_days');
        ?>
    </div>
</div>

<?php include view("home", "footer"); ?> 