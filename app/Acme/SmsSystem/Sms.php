<?php
/**
 * Created by PhpStorm.
 * User: Sovon
 * Date: 12/21/2017
 * Time: 6:10 PM
 */

namespace App\Acme\SmsSystem;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class Sms
{
    /**
     * @var $smsSystem object based on constructor method
     */
    private $smsSystem;

    /**
     * Sms constructor.
     *
     * @param string $method
     */
    public function __construct($method = null)
    {
        if (is_null($method)) $method = env('SMS_METHOD', 'diamond');

        switch ($method) {
            case 'diamond':
                $this->smsSystem = new DianaHost();
                break;
            case 'onnorokom':
                $this->smsSystem = new Onnorokom();
                break;
            case 'walletmix':
                $this->smsSystem = new Walletmix();
                break;
        }
    }

    /**
     * Send sms through set method
     *
     * @param $phone
     * @param $text
     * @return bool
     */
    public function send($phone, $text)
    {
        if (App::environment('local') || is_null($this->smsSystem)) {
            Log::info('SMS Successful | Development Server | '. $text .' To '. $phone);

            return true;
        }

        return $this->smsSystem->send($phone, $text);
    }
}