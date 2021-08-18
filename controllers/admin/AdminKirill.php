<?php

require_once _PS_MODULE_DIR_ . '/kirilladmin/classes/KirillNote.php';

class AdminKirillController extends ModuleAdminController
{

    /**
     * Instanciation de la classe
     * Définition des paramètres basiques obligatoires
     */
    public function __construct()
    {
        $this->table = KirillNote::$definition['table']; //Table de l'objet
        $this->identifier = KirillNote::$definition['primary']; //Clé primaire de l'objet
        $this->className = KirillNote::class; 
        $this->bootstrap = true;
        parent::__construct();
        $this->fields_list = [
            'id_note' => [ //nom du champ sql
                'title' => $this->module->l('ID'),
                'align' => 'center',
                'class' => 'fixed-width-xs'
            ],
            'title' => [
                'title' => $this->module->l('title'),
                'align' => 'left',
            ],
            'text' => [
                'title' => $this->module->l('text'),
                'align' => 'left',
            ],
        ];

        $this->addRowAction('edit');
        $this->addRowAction('delete');
    }

    public function renderForm()
    {
        //Définition du formulaire d'édition
        $this->fields_form = [
            //Entête
            'legend' => [
                'title' => $this->module->l('Edit note'),
                'icon' => 'icon-cog'
            ],
            //Champs
            'input' => [
                [
                    'type' => 'text', //Type de champ
                    'label' => $this->module->l('title'), //Label
                    'name' => 'title', //Nom
                    'class' => 'input fixed-width-sm', //classes css
                    'size' => 50, //longueur maximale du champ
                    'required' => true, //Requis ou non
                    'empty_message' => $this->l('Пожалуйста, введите название'), //Message d'erreur si vide
                    'hint' => $this->module->l('Введите название') //Indication complémentaires de saisie
                ],
                [
                    'type' => 'textarea',
                    'label' => $this->module->l('text'),
                    'name' => 'text',
                    'class' => 'input fixed-width-sm',
                    'size' => 5,
                    'required' => true,
                    'empty_message' => $this->module->l('Введите текст'),
                ]
            ],
            //Boutton de soumission
            'submit' => [
                'title' => $this->l('Save'), //On garde volontairement la traduction de l'admin par défaut
            ]
        ];
        return parent::renderForm();
    }
 

    /*public function initContent(){
       parent::initContent();
       $this->context->smarty->assign(array());
       $this->setTemplate('main.tpl');
    }*/
}
