<?php

class kirillAdminfrontModuleFrontController extends ModuleFrontController
{

    public function initContent()
    {
        parent::initContent();
        $sql = "SELECT * FROM `" . _DB_PREFIX_ . KirillNote::$definition['table'] . "` ORDER BY `id_note`";
        $note = Db::getInstance()->executeS($sql);
        $this->context->smarty->assign(
            array(
              'msg' => $note[0],
            ));
        $this->setTemplate('module:kirilladmin/views/templates/front/front.tpl');
    }
}