<?php include view("home", "header"); ?>


<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php include "izq.php"; ?>
    </div>
    <div class="col-sm-9 col-md-9 col-lg-9">
        <h1><?php _t("Edit user"); ?></h1>

        <form class="form-horizontal" action="index.php" method="post">
            <input type="hidden" name="c"  value="users">	
            <input type="hidden" name="a"  value="editOk">	

            <input type="hidden" name="id" value="<?php echo $id; ?>">			    	




            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Id"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?php echo $id; ?>" disabled="">
                </div>
            </div>	

            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("contact_id"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?php echo $id; ?>" disabled="">
                </div>
            </div>	



            <div class="form-group">
                <label class="control-label col-sm-2" for="title"><?php _t("Estatus"); ?></label>
                <div class="col-sm-10">                                                
                    <select class="form-control" name="title" id="title">
                        <?php
                        foreach (users_titles_array() as $key => $value) {
                            $selected = ($key == $user["title"] ) ? " selected " : "";
                            echo '<option value="' . $key . '"  ' . $selected . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>










            <div class="form-group">
                <label class="control-label col-sm-2" for="login"><?php _t("login"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="login" id='login' value="<?php echo $user["login"] ?>" readonly="">
                </div>
            </div>	





            <div class="form-group">
                <label class="control-label col-sm-2" for="password"><?php _t("New password"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="password" id='password' value="" placeholder="<?php echo _t("New password"); ?>">
                </div>
            </div>	







            <div class="form-group">
                <label class="control-label col-sm-2" for="email"><?php _t("email"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="email" id='email' value="<?php echo $user["email"] ?>">
                </div>
            </div>	




            <div class="form-group">
                <label class="control-label col-sm-2" for="status"><?php _t("Estatus"); ?></label>
                <div class="col-sm-10">                                                
                    <select class="form-control" name="status" id="status">
                        <?php
                        foreach (users_status_array() as $key => $value) {
                            $selected = ($key == $user["status"] ) ? " selected " : "";
                            echo '<option value="' . $key . '"  ' . $selected . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>	



            <div class="form-group">	
                <div class="col-sm-offset-2 col-sm-10" >
                    <input class="btn btn-primary active col-sm-2" type ="submit" value ="<?php _t("Save"); ?>">
                </div>	
            </div>

        </form>	

        <?php
        users_photo($user['id']);
        ?>

        <form id="subirImg" name="subirImg" enctype="multipart/form-data" method="post" action="index.php">

            <input type="hidden" name="c" value="users_photo">
            <input type="hidden" name="id" id="id"  value="<?php echo $user["id"] ?>">
            <label for="imagen">Subir imagen:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
            <input type="file" name="imagen" id="imagen" />
            <input type="submit" name="subirBtn" id="subirBtn" value="Subir imagen" />
        </form>


        <h2><?php _t("Conections"); ?></h2>
        <p><?php _t("Last conections"); ?></p>

        <ul>

            <?php
            foreach (logs_list_by_user_id($user['id']) as $value) {
                echo "<li>$value</li>";
            }
            ?>


        </ul>



    </div>
</div>




<?php include view("home", "footer"); ?>