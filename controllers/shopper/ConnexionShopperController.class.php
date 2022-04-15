<?php  

class ConnexionShopperController extends Auth{
    public function index(){
        $this->loadModel();
        require_once "entity/Shopper.class.php";
        if($this->checkEmail()){
            $shopper = new Shopper();
            $entity = $this->model->findShopper($this->data['email']);
            $shopper->add($entity);
            if(password_verify($this->data['password'],$shopper->password)){
                return $shopper;
            }else{
                return Errors::getError(5);
            }
        }else{
            return Errors::getError(4);
        }
    }
}