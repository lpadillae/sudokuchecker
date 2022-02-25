<?php

namespace Challenge\Sudoku\Helpers;

class Utils
{
    /**
     * Transform csv file to an array.
     *
     * @param $filename
     * @param $delimiter
     * @return array|false
     */
    public static function csvToArray($filename, $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $data = [];

        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                $data[] = $row;
            }

            fclose($handle);
        }

        return $data;
    }
}