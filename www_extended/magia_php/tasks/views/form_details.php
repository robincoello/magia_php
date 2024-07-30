<h1><?php echo $tasks->getTitle(); ?></h1>
<h2><?php echo $tasks->getController(); ?> : <?php echo $tasks->getDoc_id(); ?></h2>
<h3><?php echo _tr(tasks_categories_field_id('category', $tasks->getCategory_id())); ?></h3>

<p>
    <span class="glyphicon glyphicon-calendar"></span>
    <?php echo $tasks->getDate_registre(); ?>  
    <span class="glyphicon glyphicon-user"></span>
    <?php echo contacts_formated($tasks->getContact_id()); ?>
</p>

<?php echo $tasks->getDescription(); ?>





