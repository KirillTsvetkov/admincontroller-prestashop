<?php

class Sample extends ObjectModel
{

    public $id;
    public $name;
    public $code;
    public $email;
    public $title;
    public $description;

    public static $definition = [
        'table' => 'kirillnotes',
        'primary' => 'id_note',
        'multilang' => false,
        'fields' => [
            'title' => ['type' => self::TYPE_STRING, 'size' => 255,],
            'text' => ['type' => self::TYPE_HTML]
        ],
    ];
}
