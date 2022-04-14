<?php  

class ShopperConnexionController extends Controller{
    public function index(){
        $this->loadModel();
        require_once "entity/Shopper.class.php";
        if($this->checkEmail()){
            return $this->model->findShopper($this->data['email'],$this->data['password']);
        }else{
            return Errors::getError(4);
        }
    }

    private function checkEmail(){
        if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$this->data['email'])){
            return true;
        }else{
            return false;
        }
    }
}