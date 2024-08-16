<form class="form-horizontal" method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_email_update">  
    <input type="hidden" name="redi" value="<?php echo $redi; ?>"> 

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label"><?php _t("Email"); ?></label>
        <div class="col-sm-4">
            <input 
                type="text" 
                class="form-control" 
                id="config_mail_username" 
                name="config_mail_username" 
                placeholder="config_mail_username" 
                value="<?php echo _options_option('config_mail_username'); ?>"
                >
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label"><?php _t("Password"); ?></label>
        <div class="col-sm-4">
            <input 
                type="text" 
                class="form-control" 
                id="config_mail_password" 
                name="config_mail_password" 
                placeholder="config_mail_password" 
                value="<?php echo _options_option('config_mail_password'); ?>"
                >
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label"><?php _t("Host"); ?></label>
        <div class="col-sm-4">
            <input 
                type="text" 
                class="form-control" 
                id="config_mail_host" 
                name="config_mail_host" 
                placeholder="config_mail_host" 
                value="<?php echo _options_option('config_mail_host'); ?>"
                >
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label"><?php _t("Port"); ?></label>
        <div class="col-sm-4">
            <input 
                type="text" 
                class="form-control" 
                id="config_mail_port" 
                name="config_mail_port" 
                placeholder="config_mail_port" 
                value="<?php echo _options_option('config_mail_port'); ?>"
                >
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label"><?php _t("Actived"); ?></label>
        <div class="col-sm-4">
            <?php $checked = (_options_option('config_mail')) ? " checked " : ""; ?>
            <input 
                type="checkbox" 
                name="config_mail" 
                id="config_mail" 
                value="1"
                <?php echo $checked; ?>
                >
            <span id="config_mail" class="help-block"><?php _t("Select here to activate the sending of documents by email"); ?></span>

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button 
                type="submit" 
                class="btn btn-default">
                    <?php _t("Update"); ?>
            </button>
        </div>
    </div>
</form>

