<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_invoices"); ?>
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


        <?php
        message("info", "En desarrollo");
        ?>


        <?php
        /**
         *    <h1>
          <span class="glyphicon glyphicon-time"></span>
          <?php _t("Invoices reminders"); ?>
          </h1>




          <select>
          <option>15</option>
          </select>
          dias despues de las fecha de expiracion de la factura para registrar el 1er rapel con un<br>
          <select>
          <option>10%</option>
          </select>
          de recargo en
          la siguiente factura con un minimo de<br> <input type="number"> euros

          <form class="form-horizontal" method="post" action="index.php">
          <input type="hidden" name="c" value="config">
          <input type="hidden" name="a" value="ok_reminders">
          <input type="hidden" name="redi" value="1">



          <?php # reminder 1 ?>
          <div class="form-group">
          <label for="r1" class="col-sm-3 control-label"><?php _t("% reminder 1"); ?></label>
          <div class="col-sm-9">
          <div class="input-group">
          <input type="number" class="form-control" id="r1" placeholder="5" name="r1"
          value="<?php echo _options_option("config_invoices_r1"); ?>"
          >
          <div class="input-group-addon">%</div>
          </div>
          </div>
          </div>
          <?php #// reminder 1 ?>

          <?php # reminder 2 ?>
          <div class="form-group">
          <label for="r2" class="col-sm-3 control-label"><?php _t("% reminder 2"); ?></label>
          <div class="col-sm-9">
          <div class="input-group">
          <input type="number" class="form-control" id="r2" placeholder="10" name="r2"
          value="<?php echo _options_option("config_invoices_r2"); ?>"
          >
          <div class="input-group-addon">%</div>
          </div>
          </div>
          </div>
          <?php #// reminder 2 ?>
          <?php # reminder 2 ?>
          <div class="form-group">
          <label for="r2" class="col-sm-3 control-label"><?php _t("% reminder 2"); ?></label>
          <div class="col-sm-9">
          <div class="row">
          <div class="col-xs-2">
          <input type="text" class="form-control" placeholder=".col-xs-2">
          </div>
          <div class="col-xs-3">
          <input type="text" class="form-control" placeholder=".col-xs-3">
          </div>
          <div class="col-xs-4">
          <input type="text" class="form-control" placeholder=".col-xs-4">
          </div>
          </div>
          </div>
          </div>
          <?php #// reminder 2 ?>







          <?php # reminder 3 ?>
          <div class="form-group">
          <label for="r3" class="col-sm-3 control-label"><?php _t("% reminder 3"); ?></label>
          <div class="col-sm-9">
          <div class="input-group">
          <input type="number" class="form-control" id="r3" placeholder="15" name="r3"
          value="<?php echo _options_option("config_invoices_r3"); ?>"
          >
          <div class="input-group-addon">%</div>
          </div>
          </div>
          </div>
          <?php #// reminder 1 ?>


          <hr>


          <?php # value min ?>
          <div class="form-group">
          <label for="r3" class="col-sm-3 control-label"><?php _t("Value min"); ?></label>
          <div class="col-sm-9">
          <div class="input-group">
          <input type="number" class="form-control" id="min" placeholder="25" name="min"
          value="<?php echo _options_option("config_invoices_reminders_min"); ?>"
          >
          <div class="input-group-addon">EUR</div>
          </div>
          <span id="helpBlock2" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
          </div>


          </div>
          <?php #// value min ?>





          <?php # value max ?>
          <div class="form-group">
          <label for="max" class="col-sm-3 control-label"><?php _t("Value max"); ?></label>
          <div class="col-sm-9">
          <div class="input-group">
          <input type="number" class="form-control" id="max" placeholder="250" name="max"
          value="<?php echo _options_option("config_invoices_reminders_max"); ?>"
          >
          <div class="input-group-addon">EUR</div>
          </div>
          <span id="helpBlock2" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
          </div>
          </div>
          <?php #// value max ?>


          <?php # value tva ?>
          <div class="form-group">
          <label for="max" class="col-sm-3 control-label"><?php _t("Tva"); ?></label>
          <div class="col-sm-2">
          <div class="input-group">
          <select class="form-control" name="tax">
          <?php
          foreach (tax_list() as $key => $tax) {
          $selected = ($tax['value'] == _options_option("config_invoices_reminders_tax")) ? " selected " : "";
          echo '<option value="' . $tax['value'] . '" ' . $selected . ' >' . $tax['value'] . '%</option>';
          }
          ?>
          </select>
          <div class="input-group-addon">%</div>
          </div>
          <span id="helpBlock2" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
          </div>
          </div>
          <?php #// value tva  ?>



          <?php # value max  ?>
          <div class="form-group">
          <label for="max" class="col-sm-3 control-label"></label>
          <div class="col-sm-9">
          <div class="checkbox">
          <label>
          <input type="checkbox"> agregar automaticamente a la balanza del cliente
          </label>
          </div>
          </div>
          </div>
          <?php #// value max  ?>



          <?php # value max  ?>
          <div class="form-group">
          <label for="max" class="col-sm-3 control-label"></label>
          <div class="col-sm-9">
          <button type="submit" class="btn btn-primary"><?php _t("Save"); ?></button>
          </div>
          </div>
          <?php #// value max  ?>





          </form>





         */
        ?>




    </div>
</div>

<?php include view("home", "footer"); ?> 

