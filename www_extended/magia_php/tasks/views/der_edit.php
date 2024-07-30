
<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo _t("Status"); ?>
    </div>
    <div class="panel-body">


        <div class="dropdown">
            <button 
                class="btn btn-default dropdown-toggle" 
                type="button" 
                id="dropdownMenu1" 
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="true">                
                    <?php echo tasks_status_field_code('icon', $tasks->getStatus()); ?>
                    <?php _t(tasks_status_field_code('name', $tasks->getStatus())); ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <?php
                foreach (tasks_status_list() as $key => $tsl) {
                    echo '<li><a href="index.php?c=tasks&a=ok_change_status&id=' . $tasks->getId() . '&status=' . $tsl['code'] . '&redi=5">' . $tsl['icon'] . ' ' . _tr($tsl['name']) . '</a></li>';
                }
                ?>
            </ul>
        </div>

        <br>

        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete">
            <?php echo icon("trash"); ?>
            <?php echo _t("Delete"); ?>
        </button>


        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="deleteLabel">
                            <?php _t("Delete"); ?>
                        </h4>
                    </div>
                    <div class="modal-body">


                        <?php
                        if (tasks_medias_search_by('task_id', $tasks->getId())) {
                            message('info', 'To delete this tasks, you must first delete the photos and videos related to this taks.');
                        } else {
                            ?>
                            <p>
                                <?php _t("Are you sure you want to delete this task?"); ?>
                            </p>

                            <a class="btn btn-md btn-danger" href="index.php?c=tasks&a=ok_delete&id=<?php echo $tasks->getId(); ?>&redi[redi]=1"><?php echo _t("Delete"); ?></a>

                        <?php }
                        ?>


                    </div>
                </div>
            </div>
        </div>



        <br>
        <br>
        <p>
            <a class="btn btn-primary" href="index.php?c=tasks&a=details&id=<?php echo $tasks->getId(); ?>"><?php _t("Details"); ?></a>
        </p>






    </div>
</div>


<?php
/**
 * 
  <div class="panel panel-default">
  <div class="panel-heading">
  <?php echo _t("Category"); ?>
  </div>
  <div class="panel-body">
  <div class="dropdown">
  <button
  class="btn btn-default dropdown-toggle"
  type="button"
  id="dropdownMenu1"
  data-toggle="dropdown"
  aria-haspopup="true"
  aria-expanded="true">
  <?php echo tasks_status_field_code('icon', $tasks->getStatus()); ?>
  <?php _t(tasks_categories_field_id('category', $tasks->getCategory_id())); ?>
  <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
  <?php
  foreach (tasks_categories_list() as $key => $tclist) {
  echo '<li><a href="index.php?c=tasks&a=ok_change_field&field=category_id&data=' . $tclist['id'] . '&id=' . $tasks->getId() . '&redi=5">' . $tclist['icon'] . ' ' . _tr($tclist['category']) . '</a></li>';
  }
  ?>
  </ul>
  </div>
  </div>
  </div>

 */
?>










<br>
<br>

<?php
/**
 * <div class="panel panel-default">
  <div class="panel-heading">
  <?php echo icon("user"); ?>
  <?php _t("Assign this task to a user"); ?>
  </div>
  <div class="panel-body">
  <table class="table table-striped">
  <?php
  foreach (tasks_contacts_search_by('task_id', $tasks->getId()) as $key => $tcsb) {
  echo '<tr>
  <td>' . contacts_formated($tcsb['contact_id']) . ' </td>
  <td>
  <a href="index.php?c=tasks_contacts&a=ok_delete&id=' . $tcsb['id'] . '&redi[redi]=6">' . icon("trash") . '</a>
  </td>
  </tr>';
  }
  ?>
  </table>

  <form method="post" action="index.php">

  <input type="hidden" name="c" value="tasks_contacts">
  <input type="hidden" name="a" value="ok_add">
  <input type="hidden" name="task_id" value="<?php echo $tasks->getId(); ?>">
  <input type="hidden" name="redi[redi]" value="5">
  <input type="hidden" name="redi[c]" value="tasks">
  <input type="hidden" name="redi[a]" value="details">
  <input type="hidden" name="redi[params]" value="id=<?php echo $tasks->getId(); ?>">
  <div class="form-group">
  <label for="contact_id"><?php _t("Users"); ?></label>

  <select
  class="form-control selectpicker"
  data-live-search="true"
  name="contact_id"
  required=""
  onchange="this.form.submit()"
  >
  <?php
  foreach (users_list() as $key => $user) {
  echo '<option value="' . $user['contact_id'] . '">' . contacts_formated($user['contact_id']) . '</option>';
  }
  ?>
  </select>
  </div>
  </form>
  </div>
  </div>
 */
?>