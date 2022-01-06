<?php

namespace App\Entity;




class Attributes implements \JsonSerializable
{

    private $values;

    /**
     * @param $values
     */
    public function __construct($values)
    {
        $this->values = $values;
    }

    public function __get($extraField)
    {
        if($this->values && array_key_exists($extraField, $this->values)){
            return $this->values[$extraField];
        }else {
            return null;
        }
    }

    public function __set($extraField, $value)
    {
        $this->values[$extraField] = $value;
    }

    public function jsonSerialize()
    {
        return $this->values;
    }
}
