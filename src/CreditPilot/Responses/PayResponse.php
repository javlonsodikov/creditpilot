<?php

namespace CreditPilot\Responses;

class PayResponse extends AbstractResponse
{

    public function succeed()
    {
        return $this->resultCode() == 0;
    }

    public function billNumber()
    {
        return current($this->parsed()->billNumber);
    }

    public function amount()
    {
        return current($this->parsed()->amount);
    }

    public function resultCode()
    {
        return current($this->parsed()->result->attributes()->resultCode);
    }

    public function resultDescription()
    {
        return current($this->parsed()->result->attributes()->resultDescription);
    }

}
