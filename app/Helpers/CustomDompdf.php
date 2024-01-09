<?php 


namespace App\Helpers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;

class MYPDF extends \TCPDF {

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-30);
        $this->SetX(-100);
        // Set font
        $this->SetFont('helvetica', 'I', 12);
        // Page number
        $this->Cell(0, 10, __('Página') . ' ' .$this->getAliasNumPage().' / '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

class CustomDompdf extends Pdf
{
    /**
     * Create a new PDF Writer instance.
     *
     * @param Spreadsheet $spreadsheet Spreadsheet object
     */
    public function __construct(Spreadsheet $spreadsheet)
    {
        parent::__construct($spreadsheet);
        $this->setUseInlineCss(false);
    }

    /**
     * Gets the implementation of external PDF library that should be used.
     *
     * @param string $orientation Page orientation
     * @param string $unit Unit measure
     * @param array|string $paperSize Paper size
     *
     * @return \TCPDF implementation
     */
    protected function createExternalWriterInstance($orientation, $unit, $paperSize)
    {

        return new MYPDF($orientation, $unit, $paperSize);
    }

    /**
     * Save Spreadsheet to file.
     *
     * @param string $filename Name of the file to save as
     */
    public function save($filename, int $flags = 0): void
    {
        $fileHandle = parent::prepareForSave($filename);

        //  Default PDF paper size
        $paperSize = 'A4'; 
        $certificate = 'file://' . realpath('/var/www/safetysigaf.com/storage/certs/sigaf.crt');

        // set additional information
        $info = array(
            'Name' => 'Safety Sigaf',
            'Location' => 'Colombia',
            'Reason' => 'Certify Document Integrity',
            'ContactInfo' => 'https://www.safetysigaf.com.co',
            );


        //  Check for paper size and page orientation
        $setup = $this->spreadsheet->getSheet($this->getSheetIndex() ?? 0)->getPageSetup();
        $orientation = $this->getOrientation() ?? $setup->getOrientation();
        $orientation = ($orientation === PageSetup::ORIENTATION_LANDSCAPE) ? 'L' : 'P';
        $printPaperSize = $this->getPaperSize() ?? $setup->getPaperSize();
        $paperSize = self::$paperSizes[$printPaperSize] ?? PageSetup::getPaperSizeDefault();
        $printMargins = $this->spreadsheet->getSheet($this->getSheetIndex() ?? 0)->getPageMargins();


        //  Create PDF
        
        $pdf = $this->createExternalWriterInstance($orientation, 'pt', $paperSize);
        // set document signature
        $pdf->setSignature($certificate, $certificate, '12345678', '', 1, $info);
        
        $pdf->setFooterData(array(0,64,0), array(0,64,128));
        $pdf->setFontSubsetting(false);
        //    Set margins, converting inches to points (using 72 dpi)
        $pdf->SetMargins($printMargins->getLeft() * 72, $printMargins->getTop() * 72, $printMargins->getRight() * 72);
        $pdf->SetAutoPageBreak(true, $printMargins->getBottom() * 72);
        $pdf->setCellHeightRatio(3);


        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

        $pdf->AddPage();

        //  Set the appropriate font
        $pdf->SetFont($this->getFont());
        $pdf->writeHTML($this->generateHTMLAll());

        //  Document info
        $pdf->SetTitle($this->spreadsheet->getProperties()->getTitle());
        $pdf->SetAuthor($this->spreadsheet->getProperties()->getCreator());
        $pdf->SetSubject($this->spreadsheet->getProperties()->getSubject());
        $pdf->SetKeywords($this->spreadsheet->getProperties()->getKeywords());
        $pdf->SetCreator($this->spreadsheet->getProperties()->getCreator());

        //  Write to file
        fwrite($fileHandle, $pdf->output('', 'S'));

        parent::restoreStateAfterSave();
    }

}