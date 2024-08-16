<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <hr>
        <h1>
            <i class="fas fa-home"></i>
            <?php _t("Add contacts"); ?>
        </h1>
        <?php //include "form_add.php"; ?>
        <?php include view("contacts", "form_add_from_text"); ?>
    </div>



    <div class="col-sm-12 col-md-6 col-lg-6">
        <hr>

        <h1>
            <i class="fas fa-home"></i>
            <?php _t("Add contacts"); ?>
        </h1>


        <form class="form-horizontal">

            <div class="row">

                <div class="col-xs-6">
                    <input type="text" class="form-control" placeholder="xxxxxx">
                </div>
                <div class="col-xs-6">
                    <select class="form-control" name="field">
                        <option value="null"><?php _t("Select one"); ?></option>
                        <?php
                        $campos = array(
                            "name",
                            "lastanme",
                            "number",
                            "addresse",
                            "cpostal",
                            "barrio",
                            "ciudad",
                        );
                        foreach ($campos as $key => $campo) {
                            echo '<option value="">' . $campo . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>



            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php _t("Label"); ?></label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>


            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
        </form>



        <?php
        var_dump($txt);

// include "der.php"; 
        ?>
        <?php // include view("contacts", "der");  ?>

    </div>
</div>


<?php // include("www/home/views/footer.php"); ?>  
<?php include view("home", "footer"); ?>

