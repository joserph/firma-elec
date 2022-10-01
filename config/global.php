<?php
define("CONTROLADOR_DEFECTO", "Usuarios");
define("ACCION_DEFECTO", "index");
define("APIKEY","ssuh4367@fksavnsd64khHGKfvf732u.ykfHKGVhgkc");
define("UID", "25");


function cellColor($objPHPExcel,$cells,$color){

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));
}

function cellfont($objPHPExcel,$cells,$color){

    $styleArray = array(
            'font'  => array(
                'bold' => true,
                'color' => array('rgb' => $color),
                'size'  => 10,
                'name' => 'Arial'
    ));

    $objPHPExcel->getActiveSheet()->getStyle($cells)->applyFromArray($styleArray);
}

function colsize($objPHPExcel,$col,$size){

    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(false);
    $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth($size);
}

function DownloadFile($file) { // $file = include path
        if(file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }

    }
?>

