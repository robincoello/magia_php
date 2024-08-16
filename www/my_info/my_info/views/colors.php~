<div class="row">


    <?php
    $themes = array();

    $directory = 'includes/themeroller/';
    $scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
    foreach ($scanned_directory as $archivo) {
        if (is_dir("$directory$archivo")) {
            array_push($themes, $archivo);
        }
    }


    foreach ($themes as $t) {

        if ($t == user_options("colors")) {
            $btn = '<a href="" class="btn btn-danger" role="button">' . _tr('Selected') . '</a>';
        } else {
            $btn = '<a href="index.php?c=user_options&a=ok_change_colors_update&option=colors&data=' . $t . '&redi=6" class="btn btn-primary" role="button">' . _tr('Activate') . '</a>';
        }

        echo '    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="' . $directory . '/' . $t . '/screenshot.png" alt="...">
            <div class="caption">
                <p>
                    ' . $btn . '
                </p>
            </div>
        </div>
    </div>';
    }
    ?>

</div>




