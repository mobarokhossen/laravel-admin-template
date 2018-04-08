<?php
/**
 * Created by PhpStorm.
 * User: Sovon
 * Date: 12/21/2017
 * Time: 6:10 PM
 */

namespace App\Acme\SmsSystem;

use App\Http\Traits\FormatterTrait;

class Onnorokom extends SendSms
{
    use FormatterTrait;

    /**
     * @var string
     */
    private $baseUrl = 'https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl';

    /**
     * @var string
     */
    private $username = '01841647647';

    /**
     * @var string
     */
    private $password = 'a26962';

    /**
     * @var string
     */
    private $type = 'text';

    /**
     * Onnorokom constructor.
     */
    public function __construct()
    {
        $this->setBaseUrl($this->baseUrl);
        $this->setMethod('OneToOne');
    }

    /**
     * Send sms
     *
     * @param $phone
     * @param $text
     * @return bool
     */
    public function send($phone, $text)
    {
        $phone = $this->formatBdPhone($phone);

        $this->setData(
            $this->generateFormData($phone, $text)
        );

        $response = $this->populateSmsSoap();

        $responseText = $response->OneToOneResult;

        $responseArr = explode('||', $responseText);
        $status = $responseArr[0];

        if ($status !== 1900) {
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
            [
                'userName' => $this->username,
                'userPassword' => $this->password,
                'mobileNumber' => $phone,
                'smsText' => $text,
                'type' => $this->type,
                'maskName' => '',
                'campaignName' => '',
            ]
        ];
    }

    /**
     * Get status text
     *
     * @param $status
     * @return string
     */
    private function getStatusText($status)
    {
        switch ($status) {
            case 1900:
                $text = 'Successfully sent message';
                break;
            case 1901:
                $text = 'Parameter content missing';
                break;
            case 1902:
                $text = 'Invalid user/pass';
                break;
            case 1903:
                $text = 'Not enough balance';
                break;
            case 1905:
                $text = 'Invalid destination number';
                break;
            case 1906:
                $text = 'Operator Not found';
                break;
            case 1907:
                $text = 'Invalid mask Name';
                break;
            case 1908:
                $text = 'Sms body too long';
                break;
            case 1909:
                $text = 'Duplicate campaign Name';
                break;
            case 1910:
                $text = 'Invalid message';
                break;
            case 1911:
                $text = 'Too many Sms Request. Please try less than 500 in one request';
                break;
            default:
                $text = 'No status found';
        }

        return $text;
    }
}