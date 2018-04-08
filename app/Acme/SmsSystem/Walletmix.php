<?php
/**
 * Created by PhpStorm.
 * User: Sovon
 * Date: 12/21/2017
 * Time: 6:10 PM
 */

namespace App\Acme\SmsSystem;

use App\Http\Traits\FormatterTrait;

class Walletmix extends SendSms
{
    use FormatterTrait;

    private $baseUrl = 'http://sms.walletmix.biz/sms-api/apiAccess';
    private $username = 'Inspirelog';
    private $password = '9cHyLLRh78gIEqFKkZXm';
    private $type = 'text';
    private $source = 'TikTok';

    /**
     * Walletmix constructor.
     */
    public function __construct()
    {
        $this->setMethod('GET');
        $this->setBaseUrl($this->baseUrl);
    }

    /**
     * Send sms
     *
     * @param $phone
     * @param $text
     * @return bool|mixed
     */
    public function send($phone, $text)
    {
        $phone = $this->formatBdPhone($phone);
        $phone = ltrim($phone, '+');

        $this->setData(
            $this->generateFormData($phone, $text)
        );

        $response = $this->populateSms();

        $responseData = json_decode($response);

        if (((int) $responseData->statusCode) !== 1000) {
            return false;
        }

        return true;
    }

    /**
     * Generate form data
     *
     * @param $phone
     * @param $text
     * @return array
     */
    private function generateFormData($phone, $text)
    {
        return [
            'username' => $this->username,
            'password' => $this->password,
            'type' => $this->type,
            'source' => $this->source,
            'destination' => $phone,
            'message' => $text
        ];
    }
}