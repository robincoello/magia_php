<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo_<?php echo $code; ?>">
            <h4 class="panel-title">
                <?php _menu_icon("top", $args['controller']); ?>
                <a 
                    class="collapsed" 
                    role="button" 
                    data-toggle="collapse" 
                    data-parent="#accordion" 
                    href="#collapseTwo_<?php echo $code; ?>" 
                    aria-expanded="false" 
                    aria-controls="collapseTwo_<?php echo $code; ?>">
                    <?php echo $args['controller']; ?> | 
                    <?php echo $args['title']; ?>  
                    <?php //echo $code; ?>
                </a>
            </h4>
        </div>
        <div 
            id="collapseTwo_<?php echo $code; ?>" 
            class="panel-collapse collapse" 
            role="tabpanel" 
            aria-labelledby="headingTwo_<?php echo $code; ?>">
            <div class="panel-body">
                <?php //vardump($args); ?>
                <p><?php echo $args['description']; ?></p>          
                <p>Cat <?php echo $args['category_id']; ?></p>          
                <p>
                    <span class="glyphicon glyphicon-user"></span>
                    <?php _t("By"); ?>: <?php echo contacts_formated($args['contact_id']); ?>
                </p>      



                <a href="#" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-camera"></span></a>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">
                                    <?php _t("Picture"); ?>
                                </h4>
                            </div>
                            <div class="modal-body">
                                <?php _t("Description"); ?>

                                <br>
                                <br>
                                <br>

                                <?php
                                include "tmp_dropdown_status.php";
                                ?>


                            </div>



                        </div>
                    </div>
                </div>

                <br>
                <br>

                <?php
                include "tmp_dropdown_status.php";
                ?>
            </div>
        </div>
    </div>
</div>