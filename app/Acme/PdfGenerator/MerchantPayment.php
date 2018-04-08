<?php
/**
 * Created by PhpStorm.
 * User: Sovon
 * Date: 10/24/2017
 * Time: 5:07 PM
 */

namespace App\Acme\PdfGenerator;

use App\Payment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class MerchantPayment extends GeneratePdf
{
    /**
     * @var Payment
     */
    private $payment;

    /**
     * MerchantPayment constructor.
     *
     * @param Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
        $this->filename = 'payments/Tiktok_Payments_'. $payment->merchant->merchant->unique_id .'_'. $payment->id .'.pdf';
    }

    /**
     * @return $this
     */
    public function save()
    {
        $data['payment'] = $this->payment;

        $html = View::make('pdfs.payments.merchant-payment', $data)->render();

        // Page setup
        $this->setFilename($this->filename);
        $this->setHtml($html);
        $this->setOrientation('portrait');
        $this->setSize('a4');

        return $this->getOrGenerateFile();
    }
};
