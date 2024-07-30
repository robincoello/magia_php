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
                <p><?php echo tasks_categories_field_id('category', $args['category_id']); ?></p>          
                <?php
                include "tmp_dropdown_status.php";
                ?>
            </div>
        </div>
    </div>
</div>