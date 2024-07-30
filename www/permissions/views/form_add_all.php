<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="permissions">
    <input type="hidden" name="a" value="ok_addAll">


    <table class="table table-bordered">
        <?php foreach (controllers_list() as $key => $value) { ?>
            <tr>
                <td> <input 
                        name="controller[<?php echo $value['controller']; ?>]" 
                        id="controller[<?php echo $value['controller']; ?>]"
                        type="checkbox" 

                        ></td>
                <td><?php echo $value['controller']; ?></td>
                <td><input 
                        type="text"  
                        name="crud[<?php echo $value['controller']; ?>]" 
                        class="form-control" 
                        id="crud" 
                        placeholder="" 
                        value="1110"
                        ></td>
            </tr>


        <?php } ?>





    </table>  













    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
