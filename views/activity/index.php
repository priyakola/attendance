<?php


$objPHPExcel = new \PHPExcel();
 
 $sheet=0;
  
 $objPHPExcel->setActiveSheetIndex($sheet);
 
 
        
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        
    $objPHPExcel->getActiveSheet()->setTitle('dasd')
        
     ->setCellValue('A1', 'Firstname')
     ->setCellValue('B1', 'Lastname');
    
    $pre = 2;
    $x = 1;
     foreach($dataProvider->getModels() as $row)
     {
        $z=0;
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($z++ , $pre, $row->id);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($z++ , $pre, $row->type);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($z++ , $pre, $row->description);

        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($z++ , $pre, $row->timestamp);
        $pre++;
        $x++;
     }
                
        $objPHPExcel->getActiveSheet()->getStyle('C8')->getAlignment()->setWrapText(true);
        header('Content-Type: application/vnd.ms-excel');
        $filename = "MyExcelReport_".date("d-m-Y-His").".xls";
        header('Content-Disposition: attachment;filename='.$filename .' ');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');