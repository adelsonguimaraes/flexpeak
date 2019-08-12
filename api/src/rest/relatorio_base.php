<?php


require_once 'autoload.php';

$nameFile = "mpdf";

function gerarPDF($dados)
{

    require_once('../../util/mpdf/mpdf.php');

    $mpdf = new mPDF('c', 'A4-'.$dados['orientation'], '', '', 20, 15, 48, 25, 10, 10);
    $mpdf->SetProtection(array('print'));
    // $mpdf->SetTitle("SOLVERP - RELATÓRIO DE CONTRATOS");
    $mpdf->SetTitle($data['titulo']);
    $mpdf->SetAuthor("SOLVERP");
    $mpdf->SetWatermarkText("SOLVERP");
    $mpdf->showWatermarkText = false;
    $mpdf->watermark_font = 'DejaVuSansCondensed';
    $mpdf->watermarkTextAlpha = 0.1;
    $mpdf->SetDisplayMode('fullpage');
    // $mpdf->SetProtection(array(), 'UserPassword', 'MyPassword');
    $mpdf->SetProtection(false); // permissões full do documento

    include $dados['path'] . ".php";


    $html = ob_get_contents();

    ob_end_clean();

    $mpdf->WriteHTML($html);


    $mpdf->Output($nameFile.".pdf", "I");

    exit;

}

gerarPDF($_GET);
