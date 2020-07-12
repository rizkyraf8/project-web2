<?php 
class MYPDF extends TCPDF {

    public function Header() {
        $this->SetFont('helvetica', 'B', 18);
        $this->SetY(13);
        $this->Cell(0, 15, 'Invoice', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Rizky Aditya');
$pdf->SetTitle('Laporan');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

$html = <<<EOD
<style>
    table, th, td {
        border: 1px solid black;
        padding:5px;
    }

    table th {
        background-color: #c1c1c1;
        font-weight: bold;
    }

</style>
<table>
    <tr>
        <th>Transaction ID</th>
        <td>${data['transactionId']}</td>
        <th>Customer Name</th>
        <td>${data['customerName']}</td>
    </tr>
    <tr>
        <th>Transaction Target</th>
        <td>${data['transactionDateTarget']}</td>
        <th>Transaction Actual</th>
        <td>${data['transactionDateActual']}</td>
    </tr>
    <tr>
        <th>Transaction Status</th>
        <td>${data['status']}</td>
        <th>Transaction Send</th>
        <td>${data['transactionDateSend']}</td>
    </tr>
</table>
<br><br><br>
<table>
    <tr>
        <th width="5%" style="text-align: center">No</th>
        <th width="30%" style="text-align: center">Product Name</th>
        <th width="15%" style="text-align: center">Qty Request</th>
        <th width="15%" style="text-align: center">Qty Available</th>
        <th width="15%" style="text-align: center">Price Product</th>
        <th width="20%" style="text-align: center">Sub Total</th>
    </tr>
EOD;
$i = 1;
foreach ($product as $key => $value) {
    $subTotal = konversi_uang($value['productSalesPrice'] * $value['qtyReady']);
    $price = konversi_uang($value['productSalesPrice']);
$html .= <<<EOD
    <tr>
        <td width="5%" style="text-align: center">{$i}</td>
        <td width="30%">{$value['productName']}</td>
        <td width="15%" style="text-align: right">{$value['qtyRequest']}</td>
        <td width="15%" style="text-align: right">{$value['qtyReady']}</td>
        <td width="15%" style="text-align: right">Rp {$price}</td>
        <td width="20%" style="text-align: right">Rp {$subTotal}</td>
    </tr>
EOD;
$i++;
}
$html .= <<<EOD
</table>
EOD;

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);
// reset pointer to the last page
$pdf->lastPage();
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('tes.pdf', 'I');
