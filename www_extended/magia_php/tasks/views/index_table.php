
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("tasks", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">



        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <div class="row">
            <?php
            //vardump(tasks_status_list());
            foreach (tasks_status_list() as $key => $tasks_status) {
                ?>
                <div class="col-sm-12 col-md-2 col-lg-2">
                    <h4>
                        <?php echo $tasks_status['icon']; ?>
                        <?php echo _tr(tasks_status_field_code('name', $tasks_status['code'])); ?>
                    </h4>
                    <?php
                    //foreach (tasks_search_by('status', $tasks_status['code']) as $key => $tasks_by_code) {
//            $tasks = tasks_search_by_controller_doc_id_contact_id($c, $id, $u_id);
//            $tasks = tasks_search_by_contact_id($u_id);

                    foreach ($tasks as $key => $tasks_by_code) {
//                vardump($tasks_by_code);
                        if ($tasks_by_code['status'] == $tasks_status['code']) {
                            echo tasks_create_html($tasks_status['code'], $tasks_by_code);
                        }
                    }
                    ?>
                </div>
            <?php }
            ?>
        </div>




    </div>


</div>