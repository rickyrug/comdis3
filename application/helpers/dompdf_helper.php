<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

require_once(APPPATH . '/third_party/dompdf/autoload.inc.php');

function pdf_create($html, $filename = '', $stream = TRUE) {


    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    
   $dompdf->set_paper('folio', 'portrait');
    
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename . ".pdf");
    } else {
        return $dompdf->output();
    }
}
