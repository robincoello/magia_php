<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_pdf_data"); ?>
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

        <h1><?php _t("Pdf data contacts"); ?></h1>

        <?php
//        vardump(db_cols_from_table("contacts"));
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Tag pdf</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>id</td>
                    <td>%contact_id%</td>
                    <td>numero de contacto</td>
                </tr>
            </tbody>
            <tr>
                <td>
                    <select class="form-control" name="data">
                        <?php
                        $contacts_fields = db_cols_from_table("contacts");

                        foreach ($contacts_fields as $key => $field) {
                            echo '<option value="' . $field[Field] . '">' . $field[Field] . '</option>';
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" id="tag" name="tag" placeholder="%contact_id%" value="%contact_xxx%">
                </td>
                <td>
                    <input type="text" class="form-control" id="description" name="description" placeholder="description">
                </td>
                <td>
                    <button type="submit" class="btn btn-default">
                        <?php _t("Add"); ?>
                    </button>
                </td>
            </tr>
        </table>




    </div>
</div>

<?php include view("home", "footer"); ?> 

