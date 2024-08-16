<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-10">
        <?php include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("My company"); ?></h1>



        <?php
        /*
          <form class="form-horizontal" method="post" action="index.php">
          <input type="hidden" name="c" value="config">
          <input type="hidden" name="a" value="ok_bank_update">

          <div class="form-group">
          <label for="name" class="col-sm-2 control-label"><?php _t("Company name"); ?></label>
          <div class="col-sm-10">
          <input
          type="text"
          class="form-control"
          id="name"
          name="name"
          placeholder=""
          value="<?php echo _options_option('config_bank_bank'); ?>"
          >
          </div>
          </div>



          <div class="form-group">
          <label for="number" class="col-sm-2 control-label"><?php _t("Address"); ?></label>
          <div class="col-sm-2">
          <input
          type="text"
          class="form-control"
          id="number"
          name="number"
          placeholder=""
          value="<?php echo _options_option('config_company_a_number'); ?>"
          >
          </div>

          <div class="col-sm-6">
          <input
          type="text"
          class="form-control"
          id="address"
          name="address"
          placeholder=""
          value="<?php echo _options_option('config_company_a_address'); ?>"
          >
          </div>
          </div>



          <div class="form-group">
          <label for="postcode" class="col-sm-2 control-label"><?php// _t("Address"); ?></label>
          <div class="col-sm-2">
          <input
          type="text"
          class="form-control"
          id="postcode"
          name="postcode"
          placeholder=""
          value="<?php echo _options_option('config_company_a_postal_code'); ?>"
          >
          </div>

          <div class="col-sm-2">
          <input
          type="text"
          class="form-control"
          id="barrio"
          name="barrio"
          placeholder=""
          value="<?php echo _options_option('config_company_a_barrio'); ?>"
          >
          </div>

          <div class="col-sm-4">
          <input
          type="text"
          class="form-control"
          id="city"
          name="city"
          placeholder=""
          value="<?php echo _options_option('config_company_a_city'); ?>"
          >
          </div>
          </div>





          <div class="form-group">
          <label for="country" class="col-sm-2 control-label"><?php // _t("Country"); ?></label>
          <div class="col-sm-10">
          <select class="form-control selectpicker" data-live-search="true"  name="country" >
          <?php
          foreach (countries_list() as $key => $country) {

          $selected = ( _options_option("config_company_a_country") === $country['countryCode']) ? " selected " : "";

          echo "<option value=\"$country[countryCode]\" $selected >" . _tr($country['countryName']) . "</option>";
          }
          ?>
          </select>
          </div>
          </div>


          <div class="form-group">
          <label for="tel" class="col-sm-2 control-label"><?php _t("Telephone"); ?></label>
          <div class="col-sm-10">
          <input
          type="text"
          class="form-control"
          id="tel"
          name="tel"
          placeholder=""
          value="<?php echo _options_option('config_company_tel'); ?>"
          >
          </div>
          </div>


          <div class="form-group">
          <label for="email" class="col-sm-2 control-label"><?php _t("Email"); ?></label>
          <div class="col-sm-10">
          <input
          type="text"
          class="form-control"
          id="email"
          name="email"
          placeholder=""
          value="<?php echo _options_option('config_company_email'); ?>"
          readonly=""
          >
          </div>
          </div>



          <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
          <button
          type="submit"
          class="btn btn-default">
          <?php _t("Update"); ?>
          </button>
          </div>
          </div>
          </form>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

