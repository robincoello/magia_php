<?php include view("home", "header"); ?>  
<?php include view("tasks", "nav"); ?>
<div class="row">
    <div class="col-sm-0 col-md-3 col-lg-3">
        <?php //include view("tasks", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-9 col-lg-9">




        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h2>Task</h2>
        <p>Descripcion</p>

        Cambiar el nombre de los estatos, tambien puedes cambiar el order

        <?php
        foreach (tasks_status_list() as $key => $tasks_status_list) {
            vardump($tasks_status_list);
        }
        ?>





    </div>
</div>

<?php include view("home", "footer"); ?> 
