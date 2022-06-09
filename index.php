<?php

use App\LoaderCountries;
use App\CovidControl;
use App\SaveData\SaveData;

require_once("config.php");

$loaderCountries = new LoaderCountries;
$covidControl = new CovidControl;

$saveData = new SaveData;

//Подключаем сохранение в XLS файл
$saveData->attach(SaveDataToXls::class);

//Подключаем сохранение в базу данных
//$saveData->attach(SaveDataToDB::class);

//Файл xlsx с кодами необходимых стран
$inputFileName = __DIR__ . '/Covidcontrols-countrieslist.xlsx';

$covidControl->setCountries(
    $loaderCountries
        ->load($inputFileName) //Загружаем страны из файла
        ->get() // Получаем массив кодов стран
);

//Ловим событие получения данных по api с данными covid по стране
$covidControl->on('getCountryInfo', function($country, $data) use($saveData) {

    //Сохраняем данные
    $saveData->save($data);
    echo $country. PHP_EOL;
});

$covidControl->get();