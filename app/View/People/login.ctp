<?php
/**
 * @var $this View
 */
?>

<div class="login form" align="center">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Person'); ?>
        <fieldset>
            <legend>
                <?php echo __('Please enter your username and password'); ?>
            </legend>
            <?php   echo $this->Form->input('username');
                    echo $this->Form->input('password');
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Login')); ?>
</div>