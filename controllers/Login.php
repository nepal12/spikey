<?php

/**
 * Description of Login
 *
 * @author Ritesh Rijal(riteshrijal@yahoo.com) 
 */
class Login extends Controller {

    /**
     * Class Constructor
     */
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('users/login');
    }

    /**
     *  Function to authenticate the login
     */
    public function authenticate() {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {
                $validate = new Validation();
                $validation = $validate->check($_POST, array(
                    'username' => array(
                        'required' => true
                    ),
                    'password' => array(
                        'required' => true
                    ),
                ));

                if ($validation->passed()) {
                    $user = new User();
                    $remember = (Input::get('remember') === 'on') ? true : false;
                    $login = $user->login(Input::get('username'), Input::get('password'), $remember);

                    if ($login) {
                        Redirect::to('index.php');
                    } else {
                        echo "sorry! Failed";
                    }
                } else {
                    foreach ($validation->errors() as $error) {
                        echo $error, '<br />';
                    }
                }
            }
        }
    }

}
