<?php
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

/* @var $model app\models\Project */




//getting all relevant documents
if (isset($model->references)) {
    $refdocs = $model->getReferences()->asArray()->all();
}


// require_once 'src/PhpWord/Autoloader.php';
// \PhpOffice\PhpWord\Autoloader::register();

// Creating the new document...
//$phpWord = new \PhpOffice\PhpWord\PhpWord();

$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../res/tmp_de.docx');


if (isset($model->fileName)) {
    $newFileName = $model->fileName;
} else {
    $newFileName = $model->projectid;
}
$newFileName .= '.docx';

/**
 * Setting values for msword document. Available variables:
 * @produktName
 * @produktVersion
 */
$templateProcessor->setValue('produktName', $model->productName);
$templateProcessor->setValue('produktVersion', $model->productVersion);
$templateProcessor->setValue('fileName', $newFileName);

$templateProcessor->cloneRow('refdocsName', sizeof($refdocs));

$i = 1;
foreach ($refdocs as $ref) {
    //$refdoc = $ref['name'] . ': File: ' . $ref['file'] . ' Version: ' . $ref['version'];
    //$templateProcessor->setValue('refdoc', htmlspecialchars('<br>'));

    $templateProcessor->setValue('refdocsName#' . $i, $ref['name']);
    $templateProcessor->setValue('refdocsPfad#' . $i, $ref['file']);
    $templateProcessor->setValue('refdocsVersion#'. $i, $ref['version']);
    $i++;
}





$newFileDist = '../res/' . $newFileName;
$templateProcessor->saveAs($newFileDist);

// Saving the document as OOXML file...
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
//$objWriter->save('helloWorld.docx');

// Saving the document as ODF file...
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
//$objWriter->save('helloWorld.odt');

// Saving the document as HTML file...
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
//$objWriter->save('helloWorld.html');

//download code
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $newFileName);
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Content-Length: ' . filesize($newFileDist));
readfile($newFileDist);


?>
