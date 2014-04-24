<?php
/**
 * @var $this View
 */
?>
<?php echo $this->HTML->script('https://www.google.com/jsapi', array('inline' => 'false')); ?>
<?php echo $this->HTML->script('chart.js', array('inline' => 'false')); ?>

<div id = "chart_per" class = "dashboard">
    <div id = "chart" class = "dashboard">chart
    </div>
    <div id = "performance" class = "dashboard">
            <p class = 'hint'>Your overall performance: </p>
            <p id = 'performance_value'>66%</p>
            <p id = 'ranking'>rank #125/582 users on VPQ</p>
            <p id = 'rating'>You are doing: well!</p>
            <p class = 'hint'>share this! on <a href="">FB</a></p>

            <p id = 'suggestion'>Want to improve your result?</p>
            <p class = 'hint'>try our <?php echo $this->HTML->link('suggestion', array('controller' => 'people', 'action'=>'suggestion'));?></p>
    </div>

</div>