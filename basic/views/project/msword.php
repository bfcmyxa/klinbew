<?php
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

/* @var $model app\models\Project */


if (isset($model->fileName)) {
    $newFileName = $model->fileName;
} else {
    $newFileName = $model->projectid;
}
$newFileName .= '.docx';

//getting all relevant documents
if (isset($model->references)) {
    $refdocs = $model->getReferences()->asArray()->all();
}

//get all Sources with Ratings
if (isset($model->sourceprojects)) {
    $srcWithRatings = $model->getSources()->asArray()->joinWith('ratings', true, 'INNER JOIN')->all();
    $sources = $model->getSources()->asArray()->all();
}




$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../res/tmp_de.docx');



/**
 * Setting values for metadata part. Available variables:
 * @produktName
 * @produktVersion
 * @fileName
 */
$templateProcessor->setValue('produktName', $model->productName);
$templateProcessor->setValue('produktVersion', $model->productVersion);
$templateProcessor->setValue('fileName', $newFileName);


/**
 * Setting values for relevant documents table.
 *
 */
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

/**
 * Setting values for raw search source table.
 */
$templateProcessor->cloneRow('rawCounter', sizeof($sources));
$i = 1;
foreach ($sources as $source) {
    //$refdoc = $ref['name'] . ': File: ' . $ref['file'] . ' Version: ' . $ref['version'];
    //$templateProcessor->setValue('refdoc', htmlspecialchars('<br>'));

    $templateProcessor->setValue('rawCounter#' . $i, '' . $i);
    $templateProcessor->setValue('rawType#' . $i, $source['type']);
    $templateProcessor->setValue('rawTitle#' . $i, $source['title']);
    $templateProcessor->setValue('rawYear#' . $i, '' . $source['year']);
    $i++;
}

/**
 * Counting excluded sources.
 *
 */
$ausCount = 1;
foreach ($srcWithRatings as $src) {
        $evid = $src['ratings'][0]['evidenceValue'];
        $relev = $src['ratings'][0]['relevanceValue'];
        $sign = $src['ratings'][0]['signValue'];
    if ($evid == '1' or $relev == '1' or $sign == '1') {
        $ausCount++;
    }
}

/**
 * Setting values for excluded sources table.
 *
 */
if ($ausCount > 1) {
    $templateProcessor->cloneRow('counter', $ausCount);

    $i = 1;
    foreach ($srcWithRatings as $src) {
        $evid = $src['ratings'][0]['evidenceValue'];
        $relev = $src['ratings'][0]['relevanceValue'];
        $sign = $src['ratings'][0]['signValue'];

        if ($evid == '1') {
            $templateProcessor->setValue('counter#' . $i, '' . $i);
            $templateProcessor->setValue('sourceName#' . $i, $src['title']);
            $templateProcessor->setValue('sourceReason#' . $i, 'Kleiner Evidenz Wert (Evidenz == 1)');
            $i++;
            continue;
        } elseif ($relev = '1') {
            $templateProcessor->setValue('counter#' . $i, '' . $i);
            $templateProcessor->setValue('sourceName#' . $i, $src['title']);
            $templateProcessor->setValue('sourceReason#' . $i, 'Kleiner Relevanz Wert (Relevanz == 1)');
            $i++;
            continue;
        } elseif ($sign = '1') {
            $templateProcessor->setValue('counter#' . $i, '' . $i);
            $templateProcessor->setValue('sourceName#' . $i, $src['title']);
            $templateProcessor->setValue('sourceReason#' . $i, 'Kleiner Signifikanz Wert (Signifikanz== 1)');
            $i++;
            continue;
        }
    }
}

/**
 * Counting appropriate sources.
 */
$goodSourcesCount = sizeof($srcWithRatings) - $ausCount;

/**
 * Setting values for appropriate sources table.
 *
 */
$templateProcessor->cloneRow('goodCounter', $goodSourcesCount);
$i = 1;
foreach ($srcWithRatings as $src) {
    $evid = $src['ratings'][0]['evidenceValue'];
    $relev = $src['ratings'][0]['relevanceValue'];
    $sign = $src['ratings'][0]['signValue'];
    $title = $src['title'];
    $use = $src['ratings'][0]['use'];
    $risk = $src['ratings'][0]['risk'];
    $summary = $src['summary'];
    if ($evid == '1' or $relev == '1' or $sign == '1') {
          continue;
     }
    $templateProcessor->setValue('goodCounter#' . $i, '' . $i);
    $templateProcessor->setValue('goodTitle#' . $i, $title);
    $templateProcessor->setValue('goodEvidence#' . $i, '' . $evid);
    $templateProcessor->setValue('goodRelevance#' . $i, '' . $relev);
    $templateProcessor->setValue('goodSign#' . $i, '' . $sign);

    if ($use == 1) {
        $templateProcessor->setValue('use#' . $i, 'J');
    } else {
        $templateProcessor->setValue('use#' . $i, 'N');
    }

    if ($risk == 1) {
        $templateProcessor->setValue('risk#' . $i, 'J');
    } else {
        $templateProcessor->setValue('risk#' . $i, 'N');
    }

    if (isset($summary)) {
        $templateProcessor->setValue('goodSummary#' . $i, '' . $summary);
    } else {
        $templateProcessor->setValue('goodSummary#' . $i, 'Keine Zusammenfassung für die Quelle vorhanden');
    }

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
