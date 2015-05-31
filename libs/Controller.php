<?php

/**
 * Description of Controller
 *
 * @author Ritesh Rijal(riteshrijal@yahoo.com) 
 */
class Controller {

    function __construct() {
        $this->view = new View();
    }
    
    /**
     * 
     * @param string $name Name of the model
     * @param string $modelPath Location of the models
     */
    public function loadModel($name, $modelPath = 'models/') {
        
        
        $path = $modelPath . $name.'_model.php';
        
        if (file_exists($path)) {
            require $modelPath .$name.'_model.php';
            
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
        /*if there is no controller given then load the default index model*/
        else{
            require $modelPath .'index_model.php';
            $modelName = 'index_Model';
            $this->model = new $modelName();
        }
    }

}