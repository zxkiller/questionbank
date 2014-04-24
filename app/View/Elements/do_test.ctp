<div class='doTest'>
	<h2><?php echo 'Do your Test'?></h2>
	<?php echo 'Timelimit: ', $duration, ' minutes, questions: ',	$numberOfQuestions?>


	<?php echo $this->Form->create('TestAnswers', array( 'url' => 'score')); ?>
		<?php foreach ($questions as $index => $question): ?>
			<?php echo "<div id = 'dotestQuestions'>";?>
			<?php echo '<fieldset>';?>
			<?php echo "<b>",$index+1, "</b>  "; ?>
			<?php echo h($question['Question']['content']); ?>

			<?php $option = array(); ?>
			<?php foreach ($question['Answer'] as $aindex => $answer): ?>
				<?php $option[$aindex] = $answer['content']; ?>
			<?php endforeach; ?>
			
			<?php echo $this->Form->input( $index, array(
				'name' => $question['Question']['id'],
				'legend' => false,
				'options' => $option,
				'type' => 'radio',
				)); 
			?>
			<?php echo '</fieldset>';?>
			<?php echo "</div>";?>
		<?php endforeach; ?>
		<?php echo $this->Form->input( 'test_id', array(
				'name' => 'testID',
				'value' => $testID,
				'type' => 'hidden'
				));?> 			
	<?php echo $this->Form->end(__('Submit your answers')); ?>

</div>
