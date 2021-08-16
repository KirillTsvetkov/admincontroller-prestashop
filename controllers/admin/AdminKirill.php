<?php

class AdminKirillController extends ModuleAdminController
{

    /**
     * Instanciation de la classe
     * Définition des paramètres basiques obligatoires
     */
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
    }

 

    public function initContent(){
       parent::initContent();
       $this->context->smarty->assign(array());
       $this->setTemplate('main.tpl');
    }
}
