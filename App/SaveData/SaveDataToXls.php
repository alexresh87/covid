<?php

namespace App\SaveData;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SaveDataToXls implements SaveDataInterface
{
    const DIR_TO_SAVE = "xls_data";

    public function map(array $data): array
    {
        $return_data = [];
        foreach ($data as $key => $item) {
            if (in_array(gettype($item), ["integer", "string", "double"])) {
                $return_data[] = [$key, $item];
                continue;
            }
            if ($key == 'news') {
                $str = "";
                foreach ($data[$key] as $newsItem) {
                    $str .= "title = " . $newsItem['title'] . "\r\n" .
                        "date = " . $newsItem['date'] . "\r\n" .
                        "pub = " . $newsItem['pub'] . "\r\n" .
                        "link = " . $newsItem['link'] . "\r\n\r\n";
                }
                $return_data[] = [$key, $str];
                echo $str;
            }
            if($key == 'lockdownInfo'){
                foreach($data[$key] as $keyLockdown => $lockdownItem){
                    $return_data[] = [$key.'.'.$keyLockdown, $lockdownItem];
                }
            }
        }
        return $return_data;
    }

    public function save($data)
    {

        $mappedData = $this->map($data);
        $countryCode = isset($data['cId']) ? $data['cId'] : "NONE";

        //Директория, куда будем сохранять файлы
        $dirToSave = BASEDIR . '/' . self::DIR_TO_SAVE . '/';

        //Если не создана, тогда создаём
        if (!file_exists($dirToSave)) {
            mkdir($dirToSave);
        }

        //Имя файла текущего сохранения
        $fileName = sprintf("data_%s.xlsx", date("Y_m_d_H"));
        $fullFileName = $dirToSave . $fileName;

        if (file_exists($fullFileName)) {
            $inputFileType = IOFactory::identify($fullFileName);
            $reader = IOFactory::createReader($inputFileType);
            $spreadsheet = $reader->load($fullFileName);
        } else {
            $spreadsheet = new Spreadsheet();
        }

        $newWorkSheet = new Worksheet($spreadsheet, $countryCode);
        $spreadsheet->addSheet($newWorkSheet);

        $spreadsheet
            ->getSheetByName($countryCode)
            ->fromArray($mappedData, NULL, 'A1');

        $writer = new Xlsx($spreadsheet);
        $writer->save($fullFileName);
    }
}
