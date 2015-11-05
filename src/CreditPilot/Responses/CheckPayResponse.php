<?php

namespace CreditPilot\Responses;

/**
 * Class CheckPayResponse
 * @package CreditPilot\Responses
 */
class CheckPayResponse extends AbstractResponse
{
    /**
     * @return mixed
     */
    public function billNumber()
    {
        return current($this->parsed()->billNumber);
    }

    /**
     * @return bool
     */
    public function succeed()
    {
        return !empty($this->parsed()->billNumber);
    }
}
