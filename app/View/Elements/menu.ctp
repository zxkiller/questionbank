<div class = "nav_bar" id = "menu_container">
    <ul id = "list">
    	<!-- list item 1: VOER -->
        <li><?php echo $this->HTML->link('VOER', 'http://voer.edu.vn'); ?></li>
        <!-- list item 2: home -->
        <li><?php echo $this->HTML->link('Home', '/'); ?></li>
        <!-- list item 3: about us -->
        <li><?php echo $this->HTML->link('About us', array('controller' => 'pages', 'action' => 'about_us')); ?></li>
        <!-- list i tem 4: dashboard -->
        <li><?php echo $this->HTML->link('Dashboard', array('controller' => 'people', 'action' => 'dashboard')); ?></li>
		<!-- list i tem 5: user -->
		<li id = 'user_nav'>
			<?php
		        $user = $this->Session->read('Auth.User');
		        if(!empty($user)) {
		            echo "Logged in as: ".$user['first_name'].' '.$user['last_name'].' ';
		            echo $this->Html->link('logout',array('controller'=> 'people','action'=> 'logout',1,));
		        }
		        else {
		        	echo $this->Html->link('Login',array('controller'=> 'people','action'=> 'login',1,));
		        	echo " ";
		            echo $this->Html->link('Register',array( 'controller' => 'people','action' => 'register',1,));
	        	}
    		?>
		</li>
		<li><?php echo $this->HTML->link('Choose Test', array('controller' => 'tests', 'action' => 'chooseTest')); ?></li>
		<li><?php echo $this->HTML->link('History', array('controller' => 'people', 'action' => 'history')); ?></li>	
    </ul>
</div>