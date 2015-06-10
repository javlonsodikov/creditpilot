<?php

namespace CreditPilot;

use CreditPilot\Exceptions\HttpException;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\GuzzleException;

class Request
{

    protected $baseUrl;
    protected $login;
    protected $password;
    protected $params;

    protected $timeout = 60;
    protected $connectionTimeout = 60;

    public function withBaseUrl($value)
    {
        $this->baseUrl = $value;

        return $this;
    }

    public function withLogin($value)
    {
        $this->login = $value;

        return $this;
    }

    public function withPassword($value)
    {
        $this->password = $value;

        return $this;
    }

    public function withParams(array $params)
    {
        $this->params = $params;

        return $this;
    }

    public function setTimeout($value)
    {
        $this->timeout = $value;

        return $this;
    }

    public function setConnectionTimeout($value)
    {
        $this->connectionTimeout = $value;

        return $this;
    }

    public function send()
    {
        $guzzle = new Guzzle;

        try {
            $response = $guzzle->get($this->baseUrl, [
                'timeout' => $this->timeout,
                'connection_timeout' => $this->connectionTimeout,
                'auth' => [$this->login, $this->password],
                'query' => $this->params,
            ]);

            return $response->getBody()->getContents();
        } catch (GuzzleException $e) {
            throw new HttpException($e->getMessage(), $e->getCode());
        }

        return null;
    }

}