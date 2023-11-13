<?php

class Settings {

    private static $object = null;
    private $settings;
    static public $name;


    private function __construct(){

        $this->settings = [];
    }

    private function __clone(){}

    public static function getSettings(){

        if(is_null(self::$object)){
            self::$object = new self();
        }

        return self::$object;

    }

    public function __get($key){

        if(array_key_exists($key,$this->settings)){

            return $this->settings[$key];

        }else {

            return null;
        }


    }


    public function __set($key,$value){

        $this->settings[$key] = $value;

    }



}

Settings::getSettings()->color='red';
echo Settings::getSettings()->color;
Settings::getSettings()->number='20';
echo Settings::getSettings()->number;
Settings::$name = 'vasya';
echo Settings::$name;