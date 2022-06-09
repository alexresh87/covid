<?php

namespace App;

use PhpOffice\PhpSpreadsheet\IOFactory;

class LoaderCountries
{

    private $countries_arr;

    public function __construct()
    {
        $this->countries_arr = [];
    }

    public function load($inputFileName)
    {
        $inputFileType = IOFactory::identify($inputFileName);

        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);

        $oCells = $spreadsheet->getActiveSheet()->getCellCollection();

        for ($iRow = 1; $iRow <= $oCells->getHighestRow(); $iRow++) {
            $oCell = $oCells->get('C' . $iRow);
            if ($oCell) {
                if ($oCell->getValue()) {
                    $this->countries_arr[] = $oCell->getValue();
                }
            }
        }
        return $this;
    }

    public function get()
    {
        return $this->countries_arr;
    }
}
