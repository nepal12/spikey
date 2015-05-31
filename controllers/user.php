<?php

/**
 * Description of user
 *
 * @author Ritesh Rijal(riteshrijal@yahoo.com) 
 */
class User extends Controller {

    /**
     * Class Constructor
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Index Mothod
     */
    public function index() {
        
    }

    
    
    /**
     * Logout Method
     */
    public function logout(){
        $this->model->logout();
        Redirect::to(URL);
    }
    
    /*
     * Login Function inside the User Controller
     */
    public function login() {
        $this->view->render('users/login');
    }

    /**
     * Registration function inside user Controller
     */
    public function register() {
        $this->view->render('user/register');
    }

    /**
     * Registration Process method
     */
    public function registration() {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {
                $validate = new Validation();
                $validation = $validate->check($_POST, array(
                    'username' => array(
                        'required' => true,
                        'min' => 3,
                        'max' => 20,
                        'unique' => 'users'
                    ),
                    'password' => array(
                        'required' => true,
                        'min' => 6
                    ),
                    'password_again' => array(
                        'required' => true,
                        'matches' => 'password'
                    ),
                    'name' => array(
                        'required' => true,
                        'min' => 3,
                        'max' => 50
                    ),
                    'email' => array(
                        'required' => true,
                        'unique' => 'users'
                    )
                ));

                if ($validate->passed()) {
                    //$user = new User();
                    $salt = Hash::salt(32);

                    try {
                        $this->model->create(array(
                            'username' => Input::get('username'),
                            'password' => Hash::make(Input::get('password'), $salt),
                            'salt' => $salt,
                            'name' => Input::get('name'),
                            'email' => Input::get('email'),
                            'verification' => random(32),
                            'joined' => date('Y-m-d H:i:s'),
                            'groups' => 1,
                            'status' => 0
                        ));

                        Session::flash('home', 'Thanks for registering! You can login now.');
                        Redirect::to(URL);
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    $this->view->errors = $validate->errors();
                    $this->view->render('user/register');
                }
            }
        }
    }

   
}
