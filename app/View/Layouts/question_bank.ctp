<?php
/**
* @var $this HintView
*/
?>


<!DOCTYPE html>

<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<?php echo $this->HTML->css('style'); ?>

</head>
<body>
    <div class = "header">
        <div id = "menu">
            <?php echo $this->element('menu');?>
        </div>
    </div>

    <div class = "content">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>

    <div class = 'footer'>
        <?php //echo $this->element('footer');?>
        <?php //echo $this->element('sql_dump'); ?>
    </div>
</body>
</html>