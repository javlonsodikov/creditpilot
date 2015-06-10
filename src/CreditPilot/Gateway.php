<?php

namespace CreditPilot;

use CreditPilot\Responses\FindPayResponse;
use CreditPilot\Responses\PayResponse;

class Gateway
{

    protected $url;
    protected $login;
    protected $password;
    protected $providers;

    protected $response;

    public function __construct($url, $login, $password, array $providers)
    {
        $this->url = $url;
        $this->login = $login;
        $this->password = $password;
        $this->providers = $providers;
    }

    /**
     * @param string $id
     * @param string $destination phone or card number
     * @param $provider
     * @param float $amount
     *
     * @return PayResponse
     */
    public function pay($id, $destination, $provider, $amount)
    {
        $params = [
            'actionName' => 'PAY',
            'dealerTransactionId' => $id,
            'serviceProviderId' => $provider,
            'fullAmount' => $amount,
            'amount' => $amount,
            'phoneNumber' => $destination,
        ];

        $request = new Request;
        $response = $request
            ->withBaseUrl($this->url)
            ->withLogin($this->login)
            ->withPassword($this->password)
            ->withParams($params)
            ->send();

        return new PayResponse($response);
    }

    public function findPay($id, $isBillNumber = true)
    {
        $params = [
            'actionName' => 'FINDPAY',
        ];

        if ($isBillNumber) {
            $params['billNumber'] = $id;
        } else {
            $params['dealerTransactionId'] = $id;
        }

        $request = new Request;
        $response = $request
            ->withBaseUrl($this->url)
            ->withLogin($this->login)
            ->withPassword($this->password)
            ->withParams($params)
            ->send();

        return new FindPayResponse($response);
    }

}