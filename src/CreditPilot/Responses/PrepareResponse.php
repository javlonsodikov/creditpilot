<?php

namespace CreditPilot\Responses;

class PrepareResponse extends AbstractResponse
{

    public function resultCode()
    {
        return current($this->parsed()->result->attributes()->resultCode);
    }

    public function resultDescription()
    {
        return current($this->parsed()->payment->result->attributes()->resultDescription);
    }

    /**
     * Is PAY request allowed?
     *
     * @return bool
     */
    public function canPay()
    {
        return $this->resultCode() == 0 && $this->resultCode() != -20110;
    }

}
