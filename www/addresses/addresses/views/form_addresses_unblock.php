<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_addressUpdate">        
    <input type="hidden" name="id" value="<?php echo $address['id']; ?>">        



    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Name"); ?></label>
        <div class="col-sm-8">    
            <select  class="form-control" name="name">
                <?php
                foreach (addresses_name() as $addressName) {

                    $selected = ($addressName == $address['name'] ) ? " selected " : "";

                    echo '<option value="' . $addressName . '" ' . $selected . '>' . $addressName . '</option>';
                }
                ?>
            </select>
        </div>

    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
        <div class="col-sm-2">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="Number" value="<?php echo $address['number']; ?>" >
        </div>
        <div class="col-sm-6">    
            <input type="text"  name="address" class="form-control" id="address" value="<?php echo $address['address']; ?>" >
        </div>
    </div>






    <div class="form-group">
        <label class="control-label col-sm-2" for="postcode"></label>
        <div class="col-sm-2">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="1050" value="<?php echo $address['postcode']; ?>" >
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="Ixelles" value="<?php echo $address['barrio']; ?>" >
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="Bruxelles" value="<?php echo $address['city']; ?>" >
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for="region"></label>



        <div class="col-sm-8">    

            <select class="form-control" name="country">
                <?php
                foreach (countries_list() as $key => $value) {

                    $selected = ($value[countryCode] == $address['country']) ? " selected " : "";

                    echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>";
                }
                ?>

            </select>



        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-2" for="postcode"><?php _t('Transport'); ?></label>
        <div class="col-sm-8">    
            <select class="form-control" name="transport_code">
                <?php
                foreach (transport_list() as $key => $transport) {
                    $selected = ($transport[code] == addresses_transport_search_by_addresses_id($address['id']) ) ? " selected " : "";
                    ?>
                    <option value="<?php echo "$transport[code]" ?>" <?php echo $selected; ?>>
                        <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php _t("Edit"); ?></button>
        </div>      							
    </div>   

</form>

<?php
/*
  <h2><?php _t("Block this address"); ?></h2>
  <p><?php _t("If you block this address, it will not be available when ordering"); ?></p>

 */?>