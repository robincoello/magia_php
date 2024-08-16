<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info"> 
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Rol"); ?></th>
            <th><?php _t("Controller"); ?></th>
            <th><?php _t("Create"); ?> <?php _t("Read"); ?> <?php _t("Update"); ?> <?php _t("Delete"); ?></th>
            <th><?php _t("Edit"); ?></th>
            <th><?php _t("Details"); ?></th>
            <th><?php _t("Delete"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Rol"); ?></th>
            <th><?php _t("Controller"); ?></th>
            <th><?php _t("Create"); ?> <?php _t("Read"); ?> <?php _t("Update"); ?> <?php _t("Delete"); ?></th>
            <th><?php _t("Edit"); ?></th>          
            <th><?php _t("Details"); ?></th>          
            <th><?php _t("Delete"); ?></th>          
        </tr>
    </tfoot>
    <tbody>

        <?php
        /* <form class="form-horizontal" action="insdex.php" method="get" >
          <input type="hidden" name="c" value="permissions">
          <input type="hidden" name="a" value="addOk">

          <tr>
          <td></td>
          <td></td>
          <td>
          <select  name="rol" id="rol" class="form-control selectpicker" data-live-search="true" data-width="100%"   >
          <?php foreach (rols_list_order_by("rango") as $key => $value) {
          $selected = ($value['rol'] == $rol )? " selected ":"";
          ?>
          <option value="<?php echo $value['rol']; ?>" <?php echo $selected; ?> ><?php echo $value['rol']; ?></option>
          <?php } ?>
          </select>
          </td>
          <?php
          //vardump(permissions_search_by_rol_controller('root', '_content'));
          ?>
          <td>
          <select  name="controller" id="controller" class="form-control selectpicker" data-live-search="true" data-width="100%"   >
          <?php

          foreach (controllers_list() as $key => $value) {

          if( ! permissions_search_by_rol_controller($rol, $value['controller']) ){ ?>
          <option value="<?php echo $value['controller']; ?>" ><?php echo $value['controller']; ?></option>
          <?php } } ?>
          </select>
          </td>


          <td>
          <input
          type="text"
          name="crud"
          class="form-control"
          id="crud"
          placeholder="1110"
          value="1111">

          </td>

          <td>
          <input class="btn btn-danger active" type ="submit" value ="<?php _t("Add"); ?>">
          </td>
          </tr>
          </form>
         */
        ?>



        <tr>
            <?php
            if (!$permissions) {
                message("info", "No items");
            }

            $i = 1;
            foreach ($permissions as $permissions_item) {

                $c = ($permissions_item['crud'][0]) ? '<span class="label label-primary">' . _tr('Create') . '</span>' : '<span class="label label-default"></span>';
                $r = ($permissions_item['crud'][1]) ? '<span class="label label-info">' . _tr('Read') . '</span>' : '<span class="label label-default"></span>';
                $u = ($permissions_item['crud'][2]) ? '<span class="label label-warning">' . _tr('Update') . '</span>' : '<span class="label label-default"></span>';
                $d = ($permissions_item['crud'][3]) ? '<span class="label label-danger">' . _tr('Delete') . '</span>' : '<span class="label label-default"></span>';
                ?>




            <tr id="<?php echo "$permissions_item[id]"; ?>"> 
                <td><?php echo "$i"; ?></td>
                <td><?php echo "$permissions_item[id]"; ?></td>
                <td><?php echo "$permissions_item[rol]"; ?></td>
                <td>
                    <a href="index.php?c=permissions&a=search&w=controller&txt=<?php echo "$permissions_item[controller]"; ?>">
                        <?php echo "$permissions_item[controller]"; ?>
                    </a>
                </td>

                <td><?php echo "$c $r $u $d "; ?></td>

                <?php /**
                  <td>
                  <div class="dropdown">

                  <button
                  class="btn btn-default dropdown-toggle"
                  type="button"
                  id="dropdownMenu1"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="true">
                  <?php _t("Action"); ?>
                  <span class="caret"></span>
                  </button>

                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                  <?php // if ( permissions_has_permission($u_rol , $c , "read") ) { ?>
                  <li><a href="index.php?c=permissions&a=details&id=<?php echo "$permissions_item[id]"; ?>"><?php _t("Details") ?></a></li>
                  <?php //} ?>

                  <?php // if ( permissions_has_permission($u_rol , $c , "update") ) { ?>
                  <li><a href="index.php?c=permissions&a=edit&id=<?php echo "$permissions_item[id]"; ?>"><?php _t("Edit") ?></a></li>
                  <?php //} ?>

                  <li role="separator" class="divider"></li>

                  <?php //if ( permissions_has_permission($u_rol , $c , "delete") ) { ?>
                  <li><a href="index.php?c=permissions&a=delete&id=<?php echo "$permissions_item[id]"; ?>"><?php _t("Delete") ?></a></li>
                  <?php //} ?>

                  </ul>
                  </div>
                  </td> */ ?>

                <td>
                    <a class="btn btn-sm btn-default" href="index.php?c=permissions&a=details&id=<?php echo "$permissions_item[id]"; ?>">
                        <span class="glyphicon glyphicon-eye-open"></span>
                        <?php _t("Details") ?>
                    </a>
                </td>


                <td>
                    <a class="btn btn-sm btn-primary" href="index.php?c=permissions&a=edit&id=<?php echo "$permissions_item[id]"; ?>">
                        <span class="glyphicon glyphicon-edit"></span>
                        <?php _t("Edit") ?>
                    </a>
                </td>


                <td>
                    <a class="btn btn-sm btn-danger" href="index.php?c=permissions&a=delete&id=<?php echo "$permissions_item[id]"; ?>">
                        <span class="glyphicon glyphicon-trash"></span>
                        <?php _t("Delete") ?>
                    </a>
                </td>


            </tr>                            
            <?php
            $i++;
        }
        ?>	
        </tr>




        <?php if ($a == "sesssssssssssssssssarch") { ?>
        <form action="index.php" method="post">
            <input type="hidden" name="c" value="permissions">
            <input type="hidden" name="a" value="ok_add">
            <input type="hidden" name="rol" value="<?php echo "go"; ?>">
            <tr>
                <td></td>
                <td></td>
                <td><?php echo $rol; ?></td>
                <td>

                    <?php //echo vardump(permissions_($rol));  ?>

                    <select class="form-control" name="controller" >
                        <?php // foreach ( permissions_search_by_rol($rol) as $key => $value ) {  ?>

                        <?php
                        $i = 1;
                        foreach (controllers_list() as $key => $value) {
                            // si este esta en el array no lo mostramos 
                            if (!in_array($value['controller'], permissions_search_by_rol($rol))) {
                                ?>
                                <option value="xx"><?php echo $i . " -" . $value['controller']; ?></option>
                            <?php } ?>                                                                       



                            <?php
                            $i++;
                        }
                        ?>

                    </select>
                </td>
                <td>
                    <input class="form-control" type="text" name="controller" value="" placeholder="0000">
                </td>

                <td>
                    <button type="submit" class="btn btn-primary"><?php _t("Send"); ?></button>
                </td>

            </tr>

        </form>
    <?php } ?>



</tbody>


</table>

<?php
$pagination->createHtml();
?>



