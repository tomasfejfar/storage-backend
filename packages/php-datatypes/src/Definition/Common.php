<?php

namespace Keboola\Datatype\Definition;

class Common
{
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $length;
    /**
     * @var bool
     */
    protected $nullable = false;

    /**
     * Common constructor.
     *
     * @param $type
     * @param string $length
     * @param bool $nullable
     */
    public function __construct($type, $length = null, $nullable = true)
    {
        $this->type = $type;
        $this->length = $length;
        $this->nullable = (bool) $nullable;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @return boolean
     */
    public function isNullable()
    {
        return $this->nullable;
    }

    /**
     * @return string
     */
    public function getSQLDefinition()
    {
        if ($this->getLength() && $this->getLength() != "") {
            return $this->getType() . "(" . $this->getLength() . ")";
        }
        return $this->getType();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            "type" => $this->getType(),
            "length" => $this->getLength(),
            "nullable" => $this->isNullable()
        ];
    }
}
