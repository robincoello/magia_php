<?php include view("home", "header"); ?>  

<?php include "nav.php"; ?>

<p>
    <a href="index.php?c=user_options&a=ok_push&option=tasks_index_tmp&data=th&redi[redi]=5&redi[c]=tasks&redi[a]=index"><?php echo icon('th-large'); ?></a>
    <a href="index.php?c=user_options&a=ok_push&option=tasks_index_tmp&data=list&redi[redi]=5&redi[c]=tasks&redi[a]=index"><?php echo icon('th-list'); ?></a>
</p>

<?php
//vardump(user_options('tasks_index_tmp')); 

switch (user_options('tasks_index_tmp')) {
    case 'list':
        include "index_list.php";
        break;

    default:
        include "table_index.php";
        break;
}
?>


<?php include view("home", "footer"); ?> 

