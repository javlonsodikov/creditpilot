<?php

namespace CreditPilot\Responses;

/**
 * Class CheckPayResponse
 * @package CreditPilot\Responses
 */
class CheckPayResponse extends AbstractResponse
{
    /**
     * @return mixed|null
     */
    public function billNumber()
    {
        switch (true) {
            case isset($this->parsed()->billNumber):
                return current($this->parsed()->billNumber);
            case isset($this->parsed()->billnumber):
                return current($this->parsed()->billnumber);
        }

        return null;
    }

    /**
     * @return bool
     */
    public function succeed()
    {
        return !empty($this->parsed()->billNumber) || !empty($this->parsed()->billnumber);
    }
}
