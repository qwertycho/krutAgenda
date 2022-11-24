<?php
class auth{

    public function isAuth(){
        session_start();
        if(!isset($_SESSION['username'])){
            return false;
        } else {
            return true;
        }
    }
}

