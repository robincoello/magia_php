<?php include view("home", "header"); ?>



<form class="form-signin" method="post">
    <h2 class="form-signin-heading"><?php _t("Forget password"); ?></h2>




    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="identification">


    <div class="form-group">
        <input type="email" placeholder="email" name="login" class="form-control">
    </div>





    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php _t("Reset password"); ?></button>


    <bR>
    <p><a href="index.php?c=home"><?php _t("Login"); ?></a></p>


</form>






<?php include view("home", "footer"); ?>