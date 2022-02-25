<?php

use Challenge\Sudoku\Checker;
use Challenge\Sudoku\Helpers\Utils;

require __DIR__ . '/vendor/autoload.php';

//Invalid csv file
echo "Invalid CSV: example_invalid.csv" . PHP_EOL;
$invalidData = Utils::csvToArray('example_invalid.csv');
$sudokuChecker = new Checker($invalidData);
echo $sudokuChecker->validateRows() . PHP_EOL;
echo $sudokuChecker->validateColumns() . PHP_EOL;
echo $sudokuChecker->validateSubGrids() . PHP_EOL . PHP_EOL;

echo "Invalid CSV: invalid.csv" . PHP_EOL;
$invalidData = Utils::csvToArray('invalid.csv');
$sudokuChecker = new Checker($invalidData);
echo $sudokuChecker->validateRows() . PHP_EOL;
echo $sudokuChecker->validateColumns() . PHP_EOL;
echo $sudokuChecker->validateSubGrids() . PHP_EOL . PHP_EOL;

//Valid csv file
echo "Valid CSV: example_valid.csv" . PHP_EOL;
$validData = Utils::csvToArray('example_valid.csv');
$sudokuChecker = new Checker($validData);
echo $sudokuChecker->validateRows() . PHP_EOL;
echo $sudokuChecker->validateColumns() . PHP_EOL;
echo $sudokuChecker->validateSubGrids() . PHP_EOL . PHP_EOL;

echo "Valid CSV: valid.csv" . PHP_EOL;
$validData = Utils::csvToArray('valid.csv');
$sudokuChecker = new Checker($validData);
echo $sudokuChecker->validateColumns() . PHP_EOL;
echo $sudokuChecker->validateRows() . PHP_EOL;
echo $sudokuChecker->validateSubGrids() . PHP_EOL;