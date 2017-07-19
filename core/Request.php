<?php

class Request {
    
    public static function uri() {
//    	echo trim($_SERVER['REQUEST_URI'], 'TDW\/');
        return trim($_SERVER['REQUEST_URI'], 'TDW\/');
    }
    public static function method() {
       return $_SERVER['REQUEST_METHOD'];
    }
    
}
