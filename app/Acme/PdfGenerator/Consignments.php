<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 11/14/2017
 * Time: 4:29 PM
 */

namespace App\Acme\PdfGenerator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class Consignments extends GeneratePdf
{
    /**
     * @var Consignment
     */
    private $consignment;

    /**
     * MerchantConsignment constructor.
     *
     * @param Consignment $consignment
     */
    public function __construct($consignment)
    {
        $this->consignment = $consignment;
        $this->filename = 'Tiktok_Consignments_Report'.Carbon::now()->toDateString().'.pdf';
    }

    /**
     * @return $this
     */
    public function save()
    {
        $data['consignments'] = $this->consignment;

        $html = View::make('admin.reports.consignments.consignments-pdf', $data)->render();

        // Page setup
        $this->setFilename($this->filename);
        $this->setHtml($html);
        $this->setOrientation('landscape');
        $this->setSize('a3');

        return $this->downloadPdf();
    }
};