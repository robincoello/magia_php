<form class="form-signin" method="post">

    <p class="text-center">
        <?php logo(200, "img-responsive"); ?>
    </p>
    <h2 class="form-signin-heading text-center"><?php _t("Update password"); ?></h2>





    <input type="hidden" name="c" value="home">
    <input type="hidden" name="a" value="ok_updatePassword">

    <div class="form-group">
        <input 
            type="text" 
            placeholder="<?php _t("Code"); ?>" 
            name="code" 
            class="form-control" value="<?php echo $code; ?>">
    </div>


    <div class="form-group">
        <input 
            type="text" 
            placeholder="<?php _t("Email"); ?>" 
            name="email" 
            class="form-control" 
            value="<?php echo $email; ?>">
    </div>

    <div class="form-group">
        <input 
            type="password" 
            placeholder="<?php _t("New password"); ?>" 
            name="npassword" 
            class="form-control" 
            value="">
    </div>

    <div class="form-group">
        <input 
            type="password" 
            placeholder="<?php _t("Repete password"); ?>" 
            name="rpassword" 
            class="form-control" 
            value="">
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo _t("Change password"); ?></button>


    <bR>
    <p class="text-center">
        <a href="index.php?c=home&a=forgetPassword"><?php _t("Forget password"); ?></a> | 
        <a href="index.php?c=home"><?php _t("Login"); ?></a> | 
        <a href="index.php?c=home&a=newAccount"><?php _t("New account"); ?></a>
    </p>


</form>