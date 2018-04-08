<?php
/**
 * Created by PhpStorm.
 * User: Sovon
 * Date: 12/21/2017
 * Time: 6:10 PM
 */

namespace App\Acme\SmsSystem;

use App\Http\Traits\FormatterTrait;

class DianaHost extends SendSms
{
    use FormatterTrait;

    private $baseUrl = 'http://esms.dianahost.com/smsapi';
    private $apiKey = 'C20008465a548bede2ed95.47838529';
    private $type = 'text';
    private $senderId = '8804445629106';

    public function __construct()
    {
        $this->setBaseUrl($this->baseUrl);
    }

    /**
     * Send SMS
     *
     * @param $phone
     * @param $text
     * @return bool|mixed
     */
    public function send($phone, $text)
    {
        $phone = $this->formatBdPhone($phone);

        $this->setMethod('GET');

        $this->setData(
            $this->generateFormData($phone, $text)
        );

        $response = $this->populateSms();

        $status = substr($response, 0, 3);

        if ($status === 'ERR') {
            return false;
        }

        return true;
    }

    /**
     * Generate for query data
     *
     * @param $phone
     * @param $text
     * @return array
     */
    private function generateFormData($phone, $text)
    {
        return [
            'api_key' => $this->apiKey,
            'type' => $this->type,
            'senderid' => $this->senderId,
            'contacts' => $phone,
            'msg' => $text
        ];
    }
}