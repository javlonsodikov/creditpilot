<?php

namespace CreditPilot\Responses;

class FindPayResponse extends AbstractResponse
{

    public function resultCode()
    {
        return current($this->parsed()->payment->result->attributes()->resultCode);
    }

}