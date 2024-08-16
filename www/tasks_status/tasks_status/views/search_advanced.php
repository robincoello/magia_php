
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">        
        <?php include view("tasks_status", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'tasks_status'); ?>
            <?php _t("Tasks_status Search advanced"); ?>
        </h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php include view("tasks_status", "form_search_advanced"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php include view("tasks_status", "der"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
