
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDetails">
    <?php echo $l; ?>
</button>


<div class="modal fade" id="myModalDetails" tabindex="-1" role="dialog" aria-labelledby="myModalDetailsLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalDetailsLabel">Details</h4>
            </div>
            <div class="modal-body">
                <?php include "form_edit_tr.php"; ?>
            </div>


        </div>
    </div>
</div>
