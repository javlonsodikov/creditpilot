<?php

namespace CreditPilot\Responses;


class PrepareResponse extends AbstractResponse
{

    public function resultCode()
    {
        return current($this->parsed()->result->attributes()->resultCode);
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