<?php include view("home", "header"); ?> 

<h2>Registre OR login</h2>


<div class="row">
    <div class="col-md-6"><h2><?php _t("Existe User"); ?></h2>

        <form  method="post" action ="index.php">

            <input type="hidden" name="c" value="users">
            <input type="hidden" name="a" value="identification">


            <div class="form-group">
                <input type="text" placeholder="Login" name="login" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success"><?php _t("Sign In"); ?></button>
        </form>



        <?php
        /*        <p></p>
          <p>You forget your password?</p>
          <a href="index.php?c=resetPassword"><?php _t("Reset Password"); ?></a>
         */
        ?>
    </div>
    <div class="col-md-6"><h2><?php _t("New user"); ?></h2>

        <p><?php _t("If you dont have a account, please registre here"); ?></p>
        <form action="index.php" method="get">

            <input type="hidden" name="c" value="users"> 
            <input type="hidden" name="a" value="registration"> 


            <button type="submit" class="btn btn-primary"><?php _t("Register here"); ?></button>
        </form>


    </div>    
</div>


<?php include view("home", "footer"); ?> 