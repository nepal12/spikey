<?php

/**
 * Description of index
 *
 * @author Ritesh Rijal(riteshrijal@yahoo.com) 
 */
class Index extends Controller{
    // Class constructor
    public function __construct() {
        parent::__construct();
        require_once 'models/user_model.php';
    }
    
    public function index(){
        // Initialization of User Model
        $user = new User_Model;
        $user->isLoggedIn();
        $this->view->loggedIn = $user->isLoggedIn();
               
        $this->view->loggedIn =$user->isLoggedIn(); 
        $this->view->render('index/index');
    }
    
    
    
}
