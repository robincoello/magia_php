<?php

echo '<div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img class="' . $class . '" src="' . $img . '" alt="...">
      <div class="caption">
        <h3>' . ucfirst($module['module']) . '</h3>
        <p>' . $module['description'] . '</p>
        <p>
        ';
if ($hidden) {
    message("info", "You do not have permission to view this module");
} else {
    echo '
        <a href="index.php?c=modules&a=details&id=' . $module['id'] . '" ' . $disabled . ' class="btn btn-primary" role="button">' . _tr("Details") . '</a> 
        ' . $btn_status . '
        </p>';
}
echo '
      </div>
    </div>
  </div>';
?>