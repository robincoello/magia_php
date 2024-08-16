<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>
<table class="table table-striped" >
    <thead>
        <tr class="info">
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Economic union"); ?></th>
            <th><?php _t("CountryCode"); ?></th>
            <th><?php _t("CountryName"); ?></th>
            <th><?php _t("CurrencyCode"); ?></th>
            <th><?php _t("FipsCode"); ?></th>
            <th><?php _t("IsoNumeric"); ?></th>
            <?php /* <th><?php _t("North"); ?></th>
              <th><?php _t("South"); ?></th>
              <th><?php _t("East"); ?></th>
              <th><?php _t("West"); ?></th>
              <th><?php _t("Capital"); ?></th>
              <th><?php _t("ContinentName"); ?></th> */ ?>
            <?php /*             * <th><?php _t("Continent"); ?></th>
              <th><?php _t("Languages"); ?></th> */ ?>
            <?php /*
              <th><?php _t("GeonameId"); ?></th> */ ?>
            <th><?php _t("IsoAlpha3"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Economic union"); ?></th>
            <th><?php _t("CountryCode"); ?></th>
            <th><?php _t("CountryName"); ?></th>
            <th><?php _t("CurrencyCode"); ?></th>
            <th><?php _t("FipsCode"); ?></th>
            <th><?php _t("IsoNumeric"); ?></th>
            <?php /* <th><?php _t("North"); ?></th>
              <th><?php _t("South"); ?></th>
              <th><?php _t("East"); ?></th>
              <th><?php _t("West"); ?></th>
              <th><?php _t("Capital"); ?></th>
              <th><?php _t("ContinentName"); ?></th> */ ?>
            <?php /*             * <th><?php _t("Continent"); ?></th>
              <th><?php _t("Languages"); ?></th> */ ?>
            <?php /*
              <th><?php _t("GeonameId"); ?></th> */ ?>
            <th><?php _t("IsoAlpha3"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>


    <tbody>
        <tr>
            <?php
            if (!$countries) {
                message("info", "No items");
            }


            $i = 1;
            //foreach ($liste_info as $address) {
            foreach ($countries as $countries) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=countries&a=details&id=' . $countries["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=countries&a=edit&id=' . $countries["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=countries&a=delete&id=' . $countries["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $countries["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $countries["contact_id"]);
                echo "<tr id=\"$countries[id]\">";
                echo "<td>" . $i++ . "</td>";
                echo "<td>$countries[id]</td>";
                echo "<td>$countries[eu]</td>";
                echo "<td>$countries[countryCode]</td>";
                echo "<td>" . _tr($countries['countryName']) . "</td>";
                echo "<td>$countries[currencyCode]</td>";
                echo "<td>$countries[fipsCode]</td>";
                echo "<td>$countries[isoNumeric]</td>";
                // echo "<td>$countries[north]</td>";
                // echo "<td>$countries[south]</td>";
                // echo "<td>$countries[east]</td>";
                // echo "<td>$countries[west]</td>";
                // echo "<td>$countries[capital]</td>";
                //echo "<td>"._tr($countries[continentName])."</td>";                         
                //echo "<td>$countries[continent]</td>";
                //echo "<td>$countries[languages]</td>";
                echo "<td>$countries[isoAlpha3]</td>";
                // echo "<td>$countries[geonameId]</td>";

                echo "<td>$menu</td>";

                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
    <tfoot>


    </tfoot>
</table>
<?php $pagination->createHtml(); ?>

