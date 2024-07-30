<?php
# MagiaPHP 
# file date creation: 2023-02-08 
?>
<?php include view("home", "header"); ?> 

<?php include "nav.php"; ?>


<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("tasks", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_details.php"; ?>
    </div>

    <div class="col-sm-12 col-md-5 col-lg-5">



        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php echo _tr("Edit"); ?>



        <h1><?php echo $tasks->getTitle(); ?></h1>

        <p>
            <b><?php _t("Controller"); ?>:</b> <?php echo $tasks->getController(); ?>, 
            <b><?php _t("Doc id"); ?>: </b> <?php echo ($tasks->getDoc_id()) ? '<a href="index.php?c=' . $tasks->getController() . '&a=details&id=' . $tasks->getDoc_id() . '">' . $tasks->getDoc_id() . '</a>' : ''; ?>
        </p>

        <p><?php echo _tr(tasks_categories_field_id('category', $tasks->getCategory_id())); ?></p>

        <p>
            <span class="glyphicon glyphicon-calendar"></span>
            <?php echo $tasks->getDate_registre(); ?>  
        </p>

        <p>
            <span class="glyphicon glyphicon-user"></span>
            <?php echo contacts_formated($tasks->getContact_id()); ?>
        </p>


        <?php include "form_edit.php"; ?>


        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#">Medias</a></li>
        </ul>

        <p></p>


        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalYoutube">
            <?php _t("Add video Youtube"); ?>
        </button>


        <div class="modal fade" id="myModalYoutube" tabindex="-1" role="dialog" aria-labelledby="myModalYoutubeLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalYoutubeLabel">
                            <?php _t("Add video"); ?>
                        </h4>
                    </div>
                    <div class="modal-body">


                        <form action="index.php" method="post">
                            <input type="hidden" name="c" value="tasks_medias">
                            <input type="hidden" name="a" value="ok_add">
                            <input type="hidden" name="task_id" value="<?php echo $tasks->getId(); ?>">
                            <input type="hidden" name="type" value="youtube">
                            <input type="hidden" name="redi[redi]" value="5">
                            <input type="hidden" name="redi[c]" value="tasks">
                            <input type="hidden" name="redi[a]" value="edit">
                            <input type="hidden" name="redi[params]" value="id=<?php echo $tasks->getId(); ?>">

                            <div class="form-group">
                                <label for="url"><?php _t('Video'); ?></label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="uup-gRUCvFQ">
                                <p class="help-block">https://www.youtube.com/watch?v=XXXXXXXXXXXXX</p>                     
                            </div>

                            <div class="form-group">
                                <label for="description"><?php _t("Description"); ?></label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>

                            <button type="submit" class="btn btn-default">
                                <?php _t("Add"); ?>
                            </button>
                        </form>

                        <br>


                        <p>
                            <a href="https://www.youtube.com" target="new">https://www.youtube.com</a>
                        </p>



                    </div>
                </div>
            </div>
        </div>



        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModalPicture">
            <?php _t("Add picture"); ?>
        </button>

        <div class="modal fade" id="myModalPicture" tabindex="-1" role="dialog" aria-labelledby="myModalPictureLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalPictureLabel">
                            <?php _t("Add picture"); ?>
                        </h4>
                    </div>
                    <div class="modal-body">



                        <form action="index.php" method="post">
                            <input type="hidden" name="c" value="tasks_medias">
                            <input type="hidden" name="a" value="ok_add">
                            <input type="hidden" name="task_id" value="<?php echo $tasks->getId(); ?>">
                            <input type="hidden" name="type" value="image">
                            <input type="hidden" name="redi[redi]" value="5">
                            <input type="hidden" name="redi[c]" value="tasks">
                            <input type="hidden" name="redi[a]" value="edit">
                            <input type="hidden" name="redi[params]" value="id=<?php echo $tasks->getId(); ?>">

                            <div class="form-group">
                                <label for="url"><?php _t('Image'); ?></label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="">
                                <p class="help-block"></p>                     
                            </div>

                            <div class="form-group">
                                <label for="description"><?php _t("Description"); ?></label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>

                            <button type="submit" class="btn btn-default">
                                <?php _t("Add"); ?>
                            </button>
                        </form>

                        <br>


                        <p>
                            <a href="https://photos.google.com/" target="new_photos">https://photos.google.com/</a>
                        </p>

                    </div>

                </div>
            </div>
        </div>





        <br>
        <br>



        <?php
        foreach (tasks_medias_search_by('task_id', $tasks->getId()) as $key => $tmsbid) {

            switch ($tmsbid['type']) {
                case 'youtube':
                    echo '<div class="panel panel-default">
            <div class="panel-body">

                <iframe 
                    width="100%" 
                    height="615" 
                    src="https://www.youtube.com/embed/' . $tmsbid['url'] . '" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" 
                    allowfullscreen>
                </iframe>
            </div>
            <div class="panel-footer">
            <p>' . $tmsbid['description'] . '</p>
                <a href="index.php?c=tasks_medias&a=ok_delete&id=' . $tmsbid['id'] . '&redi[redi]=5&redi[c]=tasks&redi[a]=edit&redi[params]=' . urlencode('id=' . $tasks->getId()) . '" class="btn btn-danger">' . _tr("Delete") . '</a>
            </div>
        </div>';

                    break;
                case 'image':

                    echo '  <div class="panel panel-default">
            <div class="panel-body">
                <img src="' . $tmsbid['url'] . '" alt="" class="img-thumbnail">

            </div>
            <div class="panel-footer">
                <p>' . $tmsbid['description'] . '</p>

                <a href="index.php?c=tasks_medias&a=ok_delete&id=' . $tmsbid['id'] . '&redi[redi]=5&redi[c]=tasks&redi[a]=edit&redi[params]=' . urlencode('id=' . $tasks->getId()) . '" class="btn btn-danger">' . _tr("Delete") . '</a>
            </div>
        </div>';
                    break;

                default:
                    break;
            }
        }
        ?>

    </div>


    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "der_edit.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
