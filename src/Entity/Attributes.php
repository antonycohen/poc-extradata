<?php

namespace App\Entity;



use ArrayAccess;
use ArrayIterator;
use IteratorAggregate;
use JsonSerializable;

class Attributes implements JsonSerializable, IteratorAggregate, ArrayAccess
{

    /**
     * @var array
     */
    private $values;

    /**
     * @param array $values
     */
    public function __construct(array $values =  [])
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

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->values?:[]);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->values);
    }

    public function offsetGet($offset)
    {
        return $this->values[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->values[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->values[$offset]);
    }
}
