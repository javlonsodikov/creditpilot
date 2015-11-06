<?php

namespace CreditPilot\Responses;

/**
 * Class FindCheckResponse
 * @package CreditPilot\Responses
 */
class FindCheckResponse extends AbstractResponse
{
    /**
     * @return mixed
     */
    public function stepsLeft()
    {
        return isset($this->parsed()->payment->checkPayData->stepsLeft)
            ? current($this->parsed()->payment->checkPayData->stepsLeft)
            : null;
    }

    public function succeed()
    {
        if ($this->stepsLeft() === null
            || $this->getAmount() === null
            || $this->getAmountAll() === null
            || $this->getCommission() === null
        ) {
            return false;
        }
        return true;
    }

    public function resultCode()
    {
        return isset($this->parsed()->result->attributes()->resultCode) ?
            current($this->parsed()->result->attributes()->resultCode) :
            null;
    }

    public function resultDescription()
    {
        return isset($this->parsed()->result->attributes()->resultDescription) ?
            current($this->parsed()->result->attributes()->resultDescription) :
            null;
    }

    /**
     * @return mixed|null
     */
    public function getAmount()
    {
        if (!isset($this->parsed()->payment->checkPayData->checkPayMap->checkPayMapEntry)) {
            return null;
        }

        $checkPayMapEntry = $this->parsed()->payment->checkPayData->checkPayMap->checkPayMapEntry;

        foreach ($checkPayMapEntry as $item) {
            if (current($item->attributes()->name) === 'amount') {
                return current($item->attributes()->value);
            }
        }

        return null;
    }

    /**
     * @return mixed|null
     */
    public function getCommission()
    {
        if (!isset($this->parsed()->payment->checkPayData->checkPayMap->checkPayMapEntry)) {
            return null;
        }

        $checkPayMapEntry = $this->parsed()->payment->checkPayData->checkPayMap->checkPayMapEntry;

        foreach ($checkPayMapEntry as $item) {
            if (current($item->attributes()->name) === 'commission') {
                return current($item->attributes()->value);
            }
        }

        return null;
    }

    /**
     * @return mixed|null
     */
    public function getAmountAll()
    {
        if (!isset($this->parsed()->payment->checkPayData->checkPayMap->checkPayMapEntry)) {
            return null;
        }

        $checkPayMapEntry = $this->parsed()->payment->checkPayData->checkPayMap->checkPayMapEntry;

        foreach ($checkPayMapEntry as $item) {
            if (current($item->attributes()->name) === 'amountAll') {
                return current($item->attributes()->value);
            }
        }

        return null;
    }
}
