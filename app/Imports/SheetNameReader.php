<?php

namespace App\Imports;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;

class SheetNameReader implements IReadFilter
{
    public function readCell($column, $row, $worksheetName = '')
    {
        // Read only the first row in each sheet to get the sheet name.
        return $row == 1;
    }
}
