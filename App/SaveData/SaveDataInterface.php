<?php

namespace App\SaveData;

interface SaveDataInterface
{
    public function save($data);
    public function map(array $data): array;
}
