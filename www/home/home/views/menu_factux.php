<nav class="navbar navbar-default navbar">
    <div class="container">
        <div class="navbar-header">


            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <?php
            /*            <a class="navbar-brand" href="index.php">
              <?php // echo $config_company_name ; ?>






              <?php //logo(35); ?>
              </a> */
            ?>


        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li>                    
                    <a href="index.php?&c=contacts">
                        <?php _menu_icon('top', 'contacts'); ?>
                        <?php _t("Contacts"); ?>
                    </a>
                </li>


                <li>                    
                    <a href="index.php?&c=budgets">
                        <?php _menu_icon('top', 'budgets'); ?>
                        <?php _t("Budgets"); ?>
                    </a>
                </li>


                <li>                    
                    <a href="index.php?&c=invoices">
                        <?php _menu_icon('top', 'invoices'); ?>
                        <?php _t("Invoices"); ?>
                    </a>
                </li>



                <li>                    
                    <a href="index.php?&c=balance">
                        <?php _menu_icon('top', 'balance'); ?>
                        <?php _t("Balance"); ?>
                    </a>
                </li>


                <li>                    
                    <a href="index.php?&c=credit_notes">
                        <?php _menu_icon('top', 'credit_notes'); ?>
                        <?php _t("Credit notes"); ?>
                    </a>
                </li>



                <li>                    
                    <a href="index.php?&c=banks">
                        <?php _menu_icon('top', 'banks'); ?>
                        <?php _t("Banks"); ?>
                    </a>
                </li>
            </ul> 



            <?php
            /* <form class="navbar-form navbar-right">
              <input type="hidden" name="c" value="users">
              <input type="hidden" name="a" value="logout">
              <button type="submit" class="btn btn-success"><?php _t("Logout"); ?></button>
              </form> */
            ?>  



            <ul class="nav navbar-nav navbar-right">
                <?php /* <li><a href="#">Link</a></li> */ ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo contacts_formated($u_id); ?> 
                        (<?php echo users_field_contact_id("rol", $u_id) ?>)
                        <span class="caret"></span></a>

                    <ul class="dropdown-menu">

                        <?php if (permissions_has_permission($u_rol, "contacts", "read")) { ?>                        
                            <li>
                                <a href="index.php?c=contacts&a=details&id=<?php echo $u_owner_id; ?>">
                                    <span class="glyphicon glyphicon-home" ></span>  
                                    <?php _t("My company"); ?>
                                </a>
                            </li>
                        <?php } ?>



                        <?php if (permissions_has_permission($u_rol, "my_info", "read")) { ?>   
                            <li>
                                <a href="index.php?c=my_info">
                                    <span class="glyphicon glyphicon-user" ></span> 
                                    <?php _t("My info"); ?>
                                </a>
                            </li>
                        <?php } ?>




                        <?php if (permissions_has_permission($u_rol, "my_info", "read")) { ?>  
                            <li>
                                <a href="index.php?c=my_info&a=language">
                                    <span class="glyphicon glyphicon-globe" ></span> 
                                    <?php _t("Change language"); ?>
                                </a>
                            </li>  
                        <?php } ?>




                        <li role="separator" class="divider"></li>

                        <li>
                            <a href="index.php?c=home&a=about">
                                <span class="glyphicon glyphicon-info-sign" ></span> 
                                <?php _t("About"); ?>
                            </a>
                        </li>

                        <?php if (permissions_has_permission($u_rol, 'config', "read")) { ?>
                            <li>
                                <a href="index.php?c=config">
                                    <span class="glyphicon glyphicon-wrench" ></span> 
                                    <?php _t("Config"); ?>
                                </a>
                            </li>
                        <?php } ?>



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





        </div>
    </div>
</nav>


