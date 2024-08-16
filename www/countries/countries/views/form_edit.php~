<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="countries">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # countryCode ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="countryCode"><?php _t("CountryCode"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="countryCode" class="form-control"  id="countryCode" placeholder="countryCode" value="<?php echo "$countries[countryCode]"; ?>" >
        </div>	
    </div>
    <?php # /countryCode ?>


    <?php # eu ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="eu"><?php _t("Economic union"); ?></label>
        <div class="col-sm-8">  

            <?php
            // vardump($countries['eu']);
            ?>

            <select class="form-control" name="eu">
                <?php
                foreach (countries_economic_union_list() as $key => $eu) {

                    $selected = ($eu['eu'] == $countries['eu'] ) ? " selected " : "";

                    echo '<option value="' . $eu[eu] . '"  ' . $selected . '>' . $eu[eu] . '</option>';
                }
                ?>
            </select>




        </div>	
    </div>
    <?php # /eu  ?>



    <?php # countryName  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="countryName"><?php _t("CountryName"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="countryName" class="form-control"  id="countryName" placeholder="countryName" value="<?php echo "$countries[countryName]"; ?>" >
        </div>	
    </div>
    <?php # /countryName ?>

    <?php # currencyCode  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="currencyCode"><?php _t("CurrencyCode"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="currencyCode" class="form-control"  id="currencyCode" placeholder="currencyCode" value="<?php echo "$countries[currencyCode]"; ?>" >
        </div>	
    </div>
    <?php # /currencyCode ?>

    <?php # fipsCode  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="fipsCode"><?php _t("FipsCode"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="fipsCode" class="form-control"  id="fipsCode" placeholder="fipsCode" value="<?php echo "$countries[fipsCode]"; ?>" >
        </div>	
    </div>
    <?php # /fipsCode ?>

    <?php # isoNumeric  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="isoNumeric"><?php _t("IsoNumeric"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="isoNumeric" class="form-control"  id="isoNumeric" placeholder="isoNumeric" value="<?php echo "$countries[isoNumeric]"; ?>" >
        </div>	
    </div>
    <?php # /isoNumeric ?>

    <?php # north  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="north"><?php _t("North"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="north" class="form-control"  id="north" placeholder="north" value="<?php echo "$countries[north]"; ?>" >
        </div>	
    </div>
    <?php # /north ?>

    <?php # south  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="south"><?php _t("South"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="south" class="form-control"  id="south" placeholder="south" value="<?php echo "$countries[south]"; ?>" >
        </div>	
    </div>
    <?php # /south ?>

    <?php # east  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="east"><?php _t("East"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="east" class="form-control"  id="east" placeholder="east" value="<?php echo "$countries[east]"; ?>" >
        </div>	
    </div>
    <?php # /east ?>

    <?php # west  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="west"><?php _t("West"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="west" class="form-control"  id="west" placeholder="west" value="<?php echo "$countries[west]"; ?>" >
        </div>	
    </div>
    <?php # /west ?>

    <?php # capital  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="capital"><?php _t("Capital"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="capital" class="form-control"  id="capital" placeholder="capital" value="<?php echo "$countries[capital]"; ?>" >
        </div>	
    </div>
    <?php # /capital ?>

    <?php # continentName  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="continentName"><?php _t("ContinentName"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="continentName" class="form-control"  id="continentName" placeholder="continentName" value="<?php echo "$countries[continentName]"; ?>" >
        </div>	
    </div>
    <?php # /continentName ?>

    <?php # continent  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="continent"><?php _t("Continent"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="continent" class="form-control"  id="continent" placeholder="continent" value="<?php echo "$countries[continent]"; ?>" >
        </div>	
    </div>
    <?php # /continent ?>

    <?php # languages  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="languages"><?php _t("Languages"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="languages" class="form-control"  id="languages" placeholder="languages" value="<?php echo "$countries[languages]"; ?>" >
        </div>	
    </div>
    <?php # /languages ?>

    <?php # isoAlpha3  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="isoAlpha3"><?php _t("IsoAlpha3"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="isoAlpha3" class="form-control"  id="isoAlpha3" placeholder="isoAlpha3" value="<?php echo "$countries[isoAlpha3]"; ?>" >
        </div>	
    </div>
    <?php # /isoAlpha3 ?>

    <?php # geonameId  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="geonameId"><?php _t("GeonameId"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="geonameId" class="form-control"  id="geonameId" placeholder="geonameId" value="<?php echo "$countries[geonameId]"; ?>" >
        </div>	
    </div>
    <?php # /geonameId  ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

