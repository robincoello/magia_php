<div class="panel panel-default">
    <div class="panel-body">
        <b><?php echo $location; ?></b>
        <a href="">
            <?php _t("Edit"); ?>
        </a>
    </div>
</div>

<div class="list-group">


    <?php
    foreach (_menus_list_by_location_without_father($location) as $key => $mlblwf11) {

        $icon_mlblwf11 = ($mlblwf11['icon']) ? '<span class ="' . $mlblwf11['icon'] . '"></span>' : null;

        $has_childrens = (_menus_list_childrens_from_father($mlblwf11['id'])) ? '<span class="badge"><span class="glyphicon glyphicon-chevron-right"></span></span>' : false;

        $active = (modules_field_module('status', $mlblwf11['controller'])) ? true : false;

        echo '<a href="index.php?c=_menus&a=search&w=by_location_father_id&location=' . $location . '&father_id=' . $mlblwf11['father_id'] . '&id=' . $mlblwf11['id'] . '" class="list-group-item">' . $icon_mlblwf11 . ' ' . $mlblwf11['label'] . ' ' . $has_childrens . '</a> ';

//        if ($active) {
//            echo '<a href="index.php?c=_menus&a=search&w=by_location_father_id&location=' . $location . '&father_id=' . $mlblwf11['id'] . '" class="list-group-item">' . $icon_mlblwf11 . ' ' . $mlblwf11['label'] . ' ' . $has_childrens . '</a> ';
//        } else {
//            echo '<a href="index.php?c=_menus&a=search&w=by_location_father_id&location=' . $location . '&father_id=' . $mlblwf11['id'] . '" class="list-group-item">' . $icon_mlblwf11 . ' ' . $mlblwf11['label'] . ' ' . $has_childrens . '</a> ';
//        }
    }
    ?>

</div>




<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#id_by_location" aria-expanded="false" aria-controls="id_by_location">
                    <?php echo icon("plus"); ?>
                    <?php _t("Add item to menu"); ?>
                </a>
            </h4>
        </div>
        <div id="id_by_location" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">



                <form method="post" action="index.php">

                    <input type="hidden" name="c" value="_menus">
                    <input type="hidden" name="a" value="ok_add">
                    <input type="hidden" name="location" value="<?php echo $location; ?>">

                    <input type="hidden" name="redi[redi]" value="1">

                    <div class="form-group">
                        <label for="label"><?php _t("Label"); ?></label>
                        <input type="text" class="form-control" name="label" id="label" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="url"><?php _t("Url"); ?></label>
                        <textarea class="form-control" name="url" placeholder="index.php" >index.php?c=home</textarea>
                    </div>

                    <div class="form-group">
                        <label for="location"><?php _t("Controller"); ?></label>
                        <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" >
                            <?php
                            foreach (controllers_list() as $key => $clist) {
                                echo '<option value="' . $clist["controller"] . '" >' . ($clist['controller']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="icon"><?php _t("Icon"); ?></label>
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="">
                        <p class="help-block"><a href="https://getbootstrap.com/docs/3.4/components/" target="new"><?php _t("Icons"); ?></a></p>

                    </div>



                    <div class="form-group">
                        <label for="order_by"><?php _t("Order"); ?></label>
                        <input type="number" class="form-control" name="order_by" id="order_by" placeholder="" value="<?php echo _menus_next_order_by_by_location($location) ?>">
                    </div>


                    <button type="submit" class="btn btn-default">
                        <?php echo icon("plus"); ?> 
                        <?php _t("Add"); ?>
                    </button>
                </form>




            </div>
        </div>
    </div>




</div>





