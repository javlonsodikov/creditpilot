<?php

namespace CreditPilot\Responses;

class FindPayResponse extends AbstractResponse
{

    public function resultCode()
    {
        if (
            !isset($this->parsed()->payment) ||
            !isset($this->parsed()->payment->result)
        ) {
            return null;
        }

        return current($this->parsed()->payment->result->attributes()->resultCode);
    }

    public function resultDescription()
    {
        if (
            !isset($this->parsed()->payment) ||
            !isset($this->parsed()->payment->result)
        ) {
            return null;
        }

        return current($this->parsed()->payment->result->attributes()->resultDescription);
    }

}
