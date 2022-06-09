<?php

namespace App\SaveData;

class SaveData
{

    private $classes;

    public function __construct()
    {
        $this->classes = [];
    }

    public function attach($className)
    {
        if(!array_search($className, $this->classes, true)){
            $this->classes[] = $className;
        }
        return $this;
    }

    /**Сохранение данных */
    public function save(array $data)
    {
        foreach ($this->classes as $class) {
            $saveObj = new $class;
            $saveObj->save($data);
        }
    }
}
