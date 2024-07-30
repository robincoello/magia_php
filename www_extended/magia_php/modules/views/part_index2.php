<?php

echo '<div class="col-sm-6 col-md-2">
    <div class="thumbnail">
      <img class="' . $class . '" src="' . $img . '" alt="...">
      <div class="caption">
        <h3>' . ($module['module']) . '</h3>
        <p>Module: ' . $module['father'] . '</p>
        <p>
        ';

echo '
        <a href="index.php?c=modules&a=details&id=' . $module['id'] . '"  class="btn btn-primary" role="button">' . _tr("Details") . '</a> 
        ' . $btn_status . '
        </p>';

echo '
      </div>
    </div>
  </div>';
?>