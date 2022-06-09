<?php

namespace App\SaveData;

use PhpOffice\PhpSpreadsheet\IOFactory;

class SaveDataToXls implements SaveDataInterface
{
    const DIR_TO_SAVE = "xls_data";

    public function save($data)
    {

        //Директория, куда будем сохранять файлы
        $dirToSave = __DIR__ . '/'. self::DIR_TO_SAVE . '/';

        //Если не создана, тогда создаём
        if(!file_exists($dirToSave)){
            mkdir($dirToSave);
        }

        //Имя файла текущего сохранения
        $fileName = sprintf("data_%s.xlsx", date("Y_m_d_H"));

        if(!file_exists($dirToSave . $fileName)){
            file_put_contents($dirToSave . $fileName, "");
        }
    }
}
