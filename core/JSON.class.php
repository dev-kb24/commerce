<?php

trait JSON
{
    public function render($array){
        echo json_encode($array);
    }
    
}
