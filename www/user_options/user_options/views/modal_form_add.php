

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#user_options_add_">
    <span class="glyphicon glyphicon-plus"></span> 
    <?php _t("Add new"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="user_options__add_" tabindex="-1" role="dialog" aria-labelledby="user_options_add_Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="user_options_add_Label"> <?php _t("Add"); ?></h4>
            </div>
            <div class="modal-body">
                <?php
                $redi = 1;
                include views("user_options", "form_add", $arg = ["redi" => 1]);
                $redi = "";
                ?>
            </div>



        </div>
    </div>
</div>


