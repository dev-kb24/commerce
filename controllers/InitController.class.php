<?php

class InitController extends Controller{
    protected function render(){
        $datas = [];
        $this->loadModel();
        return $datas;
    }
}