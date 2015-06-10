<?php

namespace CreditPilot\Responses;

abstract class AbstractResponse
{

    protected $raw;

    public function __construct($raw)
    {
        $this->raw = $raw;
    }

    public function raw()
    {
        return $this->raw;
    }

    /**
     * @return \SimpleXMLElement|\stdClass
     */
    protected function parsed()
    {
        return simplexml_load_string($this->raw);
    }

}