<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-2">
        <?php // include view("config", "izq_budgets"); ?>
    </div>

    <div class="col-lg-8">
        <?php include view("config", "nav"); ?>

        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("hr_employee_worked_days"); ?></h1>      

        <p>
            <?php _t("Configuration"); ?>
        </p>    

        <?php
        $config_hr_employee_worked_days = json_decode(_options_option("config_hr_employee_worked_days"), true);

        //vardump($config_hr_employee_worked_days);
        ?>
        <form method="post" action="index.php">

            <input type="hidden" name="c" value="config">            
            <input type="hidden" name="a" value="ok_hr_employee_worked_days">            
            <input type="hidden" name="redi[redi]" value="4">            

            <div class="form-group">
                <label for="minute_ranges"><?php _t("Minute ranges"); ?></label>
                <select class="form-control" name="data[minute_ranges]" id="minute_ranges">
                    <?php
                    for ($i = 1; $i <= 60; $i++) {
                        $selected_minute_ranges = ($i == $config_hr_employee_worked_days['minute_ranges'] ) ? " selected " : "";
                        echo '<option value="' . $i . '" ' . $selected_minute_ranges . '>' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="start_time_day"><?php _t("Start time day"); ?></label>
                <select class="form-control" name="data[start_time_day]" id="start_time_day">
                    <?php
                    for ($i = 0; $i <= 23; $i++) {
                        $selected_start_time_day = ($i == $config_hr_employee_worked_days['start_time_day'] ) ? " selected " : "";
                        echo '<option value="' . $i . '"  ' . $selected_start_time_day . '>' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="end_time_day"><?php _t("End time day"); ?></label>
                <select class="form-control" name="data[end_time_day]" id="end_time_day">
                    <?php
                    for ($i = 0; $i <= 23; $i++) {
                        $selected_end_time_day = ($i == $config_hr_employee_worked_days['end_time_day'] ) ? " selected " : "";
                        echo '<option value="' . $i . '"  ' . $selected_end_time_day . '>' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>



            <button type="submit" class="btn btn-default">
                <?php echo icon("ok"); ?> 
                <?php _t("Submit"); ?>
            </button>

        </form>




        <?php // include view('config', 'form_budgets_pagination_items_limit'); 
        ?>






    </div>
</div>

<?php include view("home", "footer"); ?> 

