
<form class="form-horizontal" method="post" action="index.php">
    <input type="hidden" name="c" value="home">
    <input type="hidden" name="a" value="ok_f_new_account">

    <p class="text-center">
        <?php logo(200, "img-responsive"); ?>
    </p>

    <h2 class="form-signin-heading text-center"><?php _t("New account"); ?></h2>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label"><?php _t("Email"); ?></label>
        <div class="col-sm-10">
            <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email" 
                placeholder="Email"
                required=""
                >
        </div>
    </div>




    <div class="form-group">
        <label for="company_name" class="col-sm-2 control-label"><?php _t("Company name"); ?></label>
        <div class="col-sm-10">
            <input 
                type="company_name" 
                class="form-control" 
                id="company_name" 
                name="company_name" 
                placeholder="Company ABC"
                required=""
                >
        </div>
    </div>

    <div class="form-group">
        <label for="company_vat" class="col-sm-2 control-label"><?php _t("Company vat"); ?></label>
        <div class="col-sm-10">
            <input 
                type="company_vat" 
                class="form-control" 
                id="company_name" 
                name="company_vat" 
                placeholder="BE123456789"
                required=""
                >
        </div>
    </div>




    <div class="form-group">
        <label for="password" class="col-sm-2 control-label"><?php _t("Password"); ?></label>
        <div class="col-sm-10">
            <input 
                type="password" 
                class="form-control" 
                id="password" 
                name="password" 
                placeholder="Password"
                >
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="cdu" required=""> <a href="#" target="_new">Condiciones de uso</a>
                </label>
            </div>
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Sign in</button>
        </div>
    </div>


    <br>    


    <p class="text-center">
        <a href="index.php?c=home&a=forgetPassword"><?php _t("Forget password"); ?></a> | 
        <a href="index.php?c=home"><?php _t("Login"); ?></a> | 
        <?php _t("New account"); ?>
    </p>



</form>

