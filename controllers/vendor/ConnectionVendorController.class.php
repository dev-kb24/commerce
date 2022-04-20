<?php  

class ConnectionVendorController extends Auth{
    public function index(){
        $this->loadModel();
        require_once "entity/Vendor.class.php";
        if($this->checkEmail()){
            $vendor = new Vendor();
            $entity = $this->model->findVendor($this->data['email']);
            $vendor->add($entity);
            if(password_verify($this->data['password'],$vendor->password)){
                return $vendor;
            }else{
                return Errors::getError(5);
            }
        }else{
            return Errors::getError(4);
        }
    }
}