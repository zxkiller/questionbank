<div class = "home" id = 'home_body'>
    <div id = 'home_container'>
        <?php
        $user = $this->Session->read('Auth.User');
        // logged in
        if(empty($user)) {
            echo "<p class = 'sample'><h1>Try a test!</h1></p>";
            echo $this->HTML->link('Take a test', array(
                                'controller' => 'tests',
                                'action' => 'sampleTest'
                                ));
            echo "<p class = 'sample'><h1>or join us:</h1></p>";
            echo $this->HTML->link('Join us', array(
                                        'controller' => 'people',
                                        'action' => 'register'
                                        ));
        }
        // not logged in
        else{
            echo "<p class = ''>Logged in</p>";
        }
        ?>

    </div>

</div>