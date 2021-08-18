<?php

require_once _PS_MODULE_DIR_ . '/kirilladmin/classes/KirillNote.php';

class KirillAdmin extends Module
{
    public function __construct()
    {
        $this->author = 'kirill tsvetkov';
        $this->name = 'kirilladmin';
        $this->tab = 'kirilladmin';
        $this->version = '0.1.1';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Prestashop KirillNote Module');
        $this->description = $this->l('Prestashop KirillNote Module with front controller');
    }

    /**
     * Installation du module
     * @return boolean
     */
    public function install()
    {
        return parent::install() && $this->_installTab() &&  $this->_installSql() ;
    }

    /**
     * Désinstallation du module
     * @return boolean
     */
    public function uninstall()
    {
        return parent::uninstall() && $this->_uninstallTab() &&  $this->_uninstallSql();
    }

    protected function _installSql()
    {
        $sqlCreate = "CREATE TABLE `" . _DB_PREFIX_ . KirillNote::$definition['table'] . "` (
                `id_note` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `title` varchar(255) DEFAULT NULL,
                `text` TEXT DEFAULT NULL,
                PRIMARY KEY (`id_note`)
                ) ";


        return Db::getInstance()->execute($sqlCreate);
    }

    protected function _installTab()
    {
        $tab = new Tab();
        $tab->class_name = 'AdminKirill';
        $tab->module = $this->name;
        $tab->id_parent = (int)Tab::getIdFromClassName('DEFAULT');
        $tab->icon = 'settings_applications';
        $languages = Language::getLanguages();
        foreach ($languages as $lang) {
            $tab->name[$lang['id_lang']] = $this->l('My first Admin controller');
        }
        try {
            $tab->save();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }

        return true;
    }

 
    protected function _uninstallTab()
    {
        $idTab = (int)Tab::getIdFromClassName('AdminKirill');
        if ($idTab) {
            $tab = new Tab($idTab);
            try {
                $tab->delete();
            } catch (Exception $e) {
                echo $e->getMessage();
                return false;
            }
        }
        return true;
    }

    protected function _uninstallSql()
    {
        $sql = "DROP TABLE "._DB_PREFIX_.KirillNote::$definition['table'];
        return Db::getInstance()->execute($sql);
    }

}
