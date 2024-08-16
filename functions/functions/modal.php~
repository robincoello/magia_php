<?php

function modal(
        $modalId,
        $title,
        $button = array("btn" => 'default'),
        $view = array(),
        $params = array(),
        $rename = array()) {

    echo '
<button type="button" class="btn btn-' . $button["btn"] . ' btn-xs" data-toggle="modal" data-target="#' . $modalId . '">
    ' . $button["label"] . '
</button>


   
<div class="modal fade" id="' . $modalId . '" tabindex="-1" role="dialog" aria-labelledby="' . $modalId . 'Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="' . $modalId . 'Label">
                    ' . $title . '
                </h4>
            </div>
            <div class="modal-body">';

    include view($view["c"], $view["a"], $params);

    echo '</div>

        </div>
    </div>
</div>';
}
