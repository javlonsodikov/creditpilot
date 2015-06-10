<?php

namespace CreditPilot\Responses;


class PhoneRangesResponse extends AbstractResponse
{

    /**
     * Provider name
     *
     * @return string
     */
    public function providerName()
    {
        return current($this->parsed()->phoneRange->attributes()->providerName);
    }

    /**
     * Array of provider ids that can be used
     *
     * @return array
     */
    public function providerIds()
    {
        return explode(',', current($this->parsed()->phoneRange->attributes()->providerIds));
    }

}