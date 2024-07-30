<?php echo '<div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img class="' . $class . '" src="' . $img . '" alt="...">
      <div class="caption">
        <h3>' . ucfirst($module['module']) . '</h3>
        <p>' . $module['description'] . '</p>
        <p>

        <a href="index.php?c=modules&a=install_details&module=' . $module['module'] . '" class="btn btn-primary" role="button">' . _tr("Details") . '</a> 
        
        </p>
        
        
      </div>
    </div>
  </div>'; ?>