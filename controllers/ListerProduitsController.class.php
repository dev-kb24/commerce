<?php

class ListerProduitsController extends Controller{
    
    public function index(){
        $this->loadModel();
        return $this->model->findAll();
    }
}