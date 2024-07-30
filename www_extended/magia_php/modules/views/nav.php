<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?c=modules">
                <?php _menu_icon("top", 'modules'); ?>
                <?php _t("Modules"); ?>
            </a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <?php
            /**
             * <ul class="nav navbar-nav">
              <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>


              <li><a href="index.php?c=modules"><?php _t("All"); ?></a></li>



              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
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
              </ul>
             */
            ?>



            <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="modules">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="w" value="all">
                <div class="form-group">
                    <input type="text" name="txt" class="form-control" placeholder="">
                </div>
                <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
            </form>


            <ul class="nav navbar-nav">
                <li <?php echo (!isset($w) && isset($a) && $a != 'install') ? ' class="active" ' : ''; ?>>
                    <a href="index.php?c=modules">
                        <?php _t("All"); ?> 
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li <?php echo (isset($w) && $w == 'actived') ? ' class="active" ' : ''; ?>><a href="index.php?c=modules&a=search&w=actived&status=1"><?php _t("Actived"); ?></a></li>
                <li <?php echo (isset($w) && $w == 'inactived') ? ' class="active" ' : ''; ?>><a href="index.php?c=modules&a=search&w=inactived&status=0"><?php _t("Inactived"); ?></a></li>
                <li <?php echo (isset($a) && $a == 'install') ? ' class="active" ' : ''; ?>><a href="index.php?c=modules&a=install"><?php _t("Install"); ?></a></li>




            </ul>




            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">-----</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



















