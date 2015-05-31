<?php

/**
 * Description of register
 *
 * @author Ritesh Rijal(riteshrijal@yahoo.com) 
 */
class Register extends Controller {

    /**
     * Class constructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Index function 
     */
    public function index() {
        $this->view->render('users/register');
    }

    /**
     * Register Function
     */
    public function process() {
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
                    $user = new User();
                    $salt = Hash::salt(32);

                    try {
                        $user->create(array(
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
