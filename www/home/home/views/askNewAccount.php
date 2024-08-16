
<form class="form-signin" method="post">
    <?php logo(); ?>

    <h2 class="form-signin-heading"><?php _t("New account"); ?></h2>

    <input type="hidden" name="c" value="home">
    <input type="hidden" name="a" value="ok_newAccount">


    <div class="form-group">
        <input type="email" placeholder="email" name="email" class="form-control">
    </div>



    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php _t("Create new account"); ?></button>


    <bR>



    <div class="well well-lg">
        <?php _t("If you want an account please contact us"); ?>
    </div>



    <p>
        <a href="index.php?c=home&a=forgetPassword"><?php _t("Forget password"); ?></a> | 
        <a href="index.php?c=home"><?php _t("Login"); ?></a> | 
        <?php _t("New account"); ?>
    </p>

</form>