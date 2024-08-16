<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">NAV</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <?php echo (($config_company_name)); ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">




                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc('home', 'index', 'menu_root');
                    }
                    ?>
                </li>





                <?php
                foreach (_menus_list_by_location_without_father('top') as $key => $item) {
//                    vardump($item['controller']);
//                        vardump(_menus_can_show($item['controller']));
                    if (_menus_can_show($item['controller'])) {
                        echo _menus_dropdown_create_html('top', $item);
                    }
                }
                ?>

                <?php
                /**
                  <li><a href="#"><span class="glyphicon glyphicon-heart"></span> MM2</a></li>
                  <li class="dropdown">
                  <a href="#"
                  class="dropdown-toggle"
                  data-toggle="dropdown"
                  role="button"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >
                  <span class="glyphicon glyphicon-heart"></span>
                  Dropdown
                  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                  </ul>
                  </li>
                 */
                ?>

            </ul>

            <?php
            /**
             * 
              <form class="navbar-form navbar-left">
              <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
              </form>

             */
            ?>

            <ul class="nav navbar-nav navbar-right">


                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc('home', 'index', 'menu_root2');
                    }
                    ?>
                </li>




                <?php
                /**
                 *                <li class="active"><a href="#"><span class="glyphicon glyphicon-refresh"></span> Mobil<span class="sr-only">(current)</span></a></li>


                 */
                ?>

                <?php
                /**
                 *    <li>
                  <a href="#">
                  <span class="glyphicon glyphicon-user"></span>
                  <?php echo contacts_formated($u_id) ?> (<?php echo $u_rol; ?>)
                  </a>
                  </li>
                 */
                ?>

                <?php
                foreach (_menus_list_by_location_without_father('top2') as $key => $item) {
                    echo _menus_dropdown_create_html('top2', $item);
                }
                ?>
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>