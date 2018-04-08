<?php
/**
 * Created by PhpStorm.
 * User: Sovon
 * Date: 12/21/2017
 * Time: 6:00 PM
 */

namespace App\Acme\SmsSystem;

use SoapClient;
use GuzzleHttp\Client;

abstract class SendSms
{
    /**
     * @var null
     */
    private $baseUrl = null;

    /**
     * @var string
     */
    private $method = 'POST';

    /**
     * @var array
     */
    private $data = [];

    /**
     * Send sms abstract
     *
     * @param $phone
     * @param $text
     * @return mixed
     */
    abstract function send($phone, $text);

    /**
     * Send http request
     *
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function populateSms()
    {
        try {
            $client = new Client();

            if ($this->method === 'POST') {
                $res = $client->request($this->method, $this->baseUrl, $this->data);
            } else {
                $res = $client->get($this->baseUrl, [
                    'query' => $this->data
                ]);
            }

            return $res->getBody();
        } catch (\Exception $e) {
            return 'ERR: ' . $e->getMessage();
        }
    }

    /**
     * Send soap request
     *
     * @return mixed|string
     */
    public function populateSmsSoap()
    {
        try {
            $soapClient = new SoapClient($this->baseUrl);
            $value = $soapClient->__soapCall($this->method, $this->data);

            return $value;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Set data
     *
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = array_merge($this->data, $data);
    }

    /**
     * Set Base Url
     *
     * @param null $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * Set method
     *
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}