<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="countries">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$countries[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>


    <?php # eu ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="eu" class="form-control"  id="eu" placeholder="eu" value="<?php echo "$countries[eu]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # eu ?>

    <?php # countryCode ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("CountryCode"); ?></label>
        <div class="col-sm-8">                    
            <input type="countryCode" name="countryCode" class="form-control"  id="countryCode" placeholder="countryCode" value="<?php echo "$countries[countryCode]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # countryCode ?>

    <?php # countryName ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("CountryName"); ?></label>
        <div class="col-sm-8">                    
            <input type="countryName" name="countryName" class="form-control"  id="countryName" placeholder="countryName" value="<?php echo "$countries[countryName]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # countryName ?>

    <?php # currencyCode ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("CurrencyCode"); ?></label>
        <div class="col-sm-8">                    
            <input type="currencyCode" name="currencyCode" class="form-control"  id="currencyCode" placeholder="currencyCode" value="<?php echo "$countries[currencyCode]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # currencyCode ?>

    <?php # fipsCode ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("FipsCode"); ?></label>
        <div class="col-sm-8">                    
            <input type="fipsCode" name="fipsCode" class="form-control"  id="fipsCode" placeholder="fipsCode" value="<?php echo "$countries[fipsCode]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # fipsCode ?>

    <?php # isoNumeric ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("IsoNumeric"); ?></label>
        <div class="col-sm-8">                    
            <input type="isoNumeric" name="isoNumeric" class="form-control"  id="isoNumeric" placeholder="isoNumeric" value="<?php echo "$countries[isoNumeric]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # isoNumeric ?>

    <?php # north ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("North"); ?></label>
        <div class="col-sm-8">                    
            <input type="north" name="north" class="form-control"  id="north" placeholder="north" value="<?php echo "$countries[north]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # north ?>

    <?php # south ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("South"); ?></label>
        <div class="col-sm-8">                    
            <input type="south" name="south" class="form-control"  id="south" placeholder="south" value="<?php echo "$countries[south]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # south ?>

    <?php # east ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("East"); ?></label>
        <div class="col-sm-8">                    
            <input type="east" name="east" class="form-control"  id="east" placeholder="east" value="<?php echo "$countries[east]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # east ?>

    <?php # west ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("West"); ?></label>
        <div class="col-sm-8">                    
            <input type="west" name="west" class="form-control"  id="west" placeholder="west" value="<?php echo "$countries[west]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # west ?>

    <?php # capital ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Capital"); ?></label>
        <div class="col-sm-8">                    
            <input type="capital" name="capital" class="form-control"  id="capital" placeholder="capital" value="<?php echo "$countries[capital]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # capital ?>

    <?php # continentName ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("ContinentName"); ?></label>
        <div class="col-sm-8">                    
            <input type="continentName" name="continentName" class="form-control"  id="continentName" placeholder="continentName" value="<?php echo "$countries[continentName]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # continentName ?>

    <?php # continent ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Continent"); ?></label>
        <div class="col-sm-8">                    
            <input type="continent" name="continent" class="form-control"  id="continent" placeholder="continent" value="<?php echo "$countries[continent]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # continent ?>

    <?php # languages ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Languages"); ?></label>
        <div class="col-sm-8">                    
            <input type="languages" name="languages" class="form-control"  id="languages" placeholder="languages" value="<?php echo "$countries[languages]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # languages ?>

    <?php # isoAlpha3 ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("IsoAlpha3"); ?></label>
        <div class="col-sm-8">                    
            <input type="isoAlpha3" name="isoAlpha3" class="form-control"  id="isoAlpha3" placeholder="isoAlpha3" value="<?php echo "$countries[isoAlpha3]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # isoAlpha3 ?>

    <?php # geonameId ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("GeonameId"); ?></label>
        <div class="col-sm-8">                    
            <input type="geonameId" name="geonameId" class="form-control"  id="geonameId" placeholder="geonameId" value="<?php echo "$countries[geonameId]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # geonameId ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

