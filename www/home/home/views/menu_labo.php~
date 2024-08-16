<nav class="navbar navbar-default navbar">
    <div class="container">
        <div class="navbar-header">


            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#navbar" 
                aria-expanded="false" 
                aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a class="navbar-brand" href="index.php">
                <?php //echo contacts_formated($u_owner_id) ; ?>

                <?php // echo contacts_formated(contacts_work_for($u_id)) ; ?>
                <?php //echo contacts_formated(contacts_work_at($u_id)) ; ?>


                <?php //logo(35); ?>
            </a>


        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li><a class="nav-link" href='index.php?c=shop'>
                        <i class="fas fa-file"></i>
                        <?php _t("My orders"); ?>
                    </a>
                </li>


                <li><a class="nav-link" href='index.php?c=shop&a=contacts'>
                        <i class="fas fa-user"></i>
                        <?php _t("Contacts"); ?>
                    </a>
                </li>  



                <li><a class="nav-link" href='index.php?c=shop&a=patients'>
                        <i class="fas fa-user"></i>
                        <?php _t("Patients"); ?>
                    </a>
                </li>  

                <?php //if ( permissions_has_permission($u_rol, "shop_offices", "read")) { ?>

                <li><a class="nav-link" href='index.php?c=shop&a=offices'>
                        <i class="fas fa-user"></i>
                        <?php _t("Offices"); ?>
                    </a>
                </li>                  

                <?php // } ?>


                <?php if (permissions_has_permission($u_rol, "shop_products", "read")) { ?>

                    <li><a class="nav-link" href='index.php?c=shop&a=products'>
                            <i class="fas fa-user"></i>
                            <?php _t("Products"); ?>
                        </a>
                    </li>                  

                <?php } ?>











            </ul> 





            <?php
            /* <form class="navbar-form navbar-right">
              <input type="hidden" name="c" value="users">
              <input type="hidden" name="a" value="logout">
              <button type="submit" class="btn btn-success"><?php _t("Logout"); ?></button>
              </form> */
            ?>  




            <ul class="nav navbar-nav navbar-right">



                <li class="dropdown">
                    <a href="#" 
                       class="dropdown-toggle" 
                       data-toggle="dropdown" 
                       role="button" 
                       aria-haspopup="true" 
                       aria-expanded="false">
                           <?php echo contacts_formated($u_id); ?> 
                        (<?php echo users_field_contact_id("rol", $u_id) ?>)

                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                        <?php
                        /*
                          <li><a href="index.php?c=shop&a=address">
                          <span class="glyphicon glyphicon-map-marker"></span>
                          <?php _t("My addresses") ; ?>
                          </a>
                          </li> */
                        ?>


                        <li><a href="index.php?c=shop&a=myInfo">
                                <span class="glyphicon glyphicon-user"></span>
                                <?php _t("My Info"); ?>
                            </a>
                        </li>
                        <li><a href="index.php?c=shop&a=changePass">
                                <span class="glyphicon glyphicon-wrench"></span>
                                <?php _t("Change Password"); ?>
                            </a>
                        </li>
                        <li><a href="index.php?c=shop&a=changeLanguage">
                                <span class="glyphicon glyphicon-globe"></span>
                                <?php _t("Change language"); ?>
                            </a>
                        </li>

                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="index.php?c=home&a=logout">
                                <span class="glyphicon glyphicon-off" ></span> 
                                <?php _t("Logout"); ?>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>


            <form class="navbar-form navbar-right" action="index.php" method="get">
                <input type="hidden" name="c" value="shop">
                <input type="hidden" name="a" value="order_choose_contact">

                <button type="submit" class="btn btn-danger">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <?php _t("New order"); ?>
                </button>
            </form>





        </div>
    </div>
</nav>


