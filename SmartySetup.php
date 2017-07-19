<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'libs/smarty/Smarty.class.php';

class SmartySetup extends Smarty{
    
    function setup() {
        $this->__construct();
        $smarty->template_dir = '/Applications/MAMP/htdocs/TDW/public/templates/';
        $smarty->compile_dir = '/Applications/MAMP/htdocs/TDW/public/templates_c/';
        $smarty->config_dir = '/Applications/MAMP/htdocs/TDW/public/configs/';
        $smarty->cache_dir = '/Applications/MAMP/htdocs/TDW/public/cache/';
        $smarty->caching = true;
        $smarty->assign('app_name', 'TDW');
    }
}