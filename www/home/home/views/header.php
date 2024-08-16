<!DOCTYPE html>
<html lang="<?php echo substr(users_field_contact_id('language', $u_id), 0, 2) ?>">    
    <head>
        <?php include view("home", "head"); ?>
    </head> 
    <body>
        <div class="container-fluid">
            <p>&nbsp;</p>
            <?php include view("home", 'menu'); ?>    
        </div>
        <div class="container-fluid">


            <?php if (is_logued()) { ?>

                <ol class="breadcrumb">
                    <li><a href="index.php"><?php _t("Home"); ?></a></li>
                    <li><a href="index.php?c=<?php echo "$c"; ?>"><?php echo _tr($c); ?></a></li>
                    <?php echo ( isset($a) && $a != "index" ) ? '<li class="active">' . _tr($a) . '</li>' : ''; ?>
                </ol>

            <?php }
            ?>
            
