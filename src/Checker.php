<?php

namespace Challenge\Sudoku;

class Checker
{
    const ROW_SIZE = 9;
    const COL_SIZE = 9;
    const DEFAULT_SIZE = 9;

    private $sudokuInput = [];

    public function __construct($input)
    {
        $this->sudokuInput = $input;
    }

    /**
     * Checks if the row has all the required values and if they are unique or not.
     *
     * @param $rowNum int
     * @return bool
     */
    private function isRowValid($rowNum)
    {
        if (count($this->sudokuInput[$rowNum]) != self::ROW_SIZE ||
            count(array_unique($this->sudokuInput[$rowNum])) != self::ROW_SIZE) {
            return false;
        }

        return true;
    }

    public function validateRows()
    {
        for ($i = 0; $i < self::DEFAULT_SIZE; $i++) {
            if (!$this->isRowValid($i)) {
               return "Row: " . $i . " contains an invalid number";
            }
        }

        return "Valid!";
    }

    /**
     * Checks if the colum has all the required values and if they are unique or not.
     *
     * @param $colNum int
     * @return bool
     */
    private function isColValid($colNum)
    {
        $col = array_column($this->sudokuInput, $colNum);

        if (count($col) != self::COL_SIZE || count(array_unique($col)) != self::COL_SIZE) {
            return false;
        }

        return true;
    }

    public function validateColumns()
    {
        for ($i = 0; $i < self::DEFAULT_SIZE; $i++) {
            if (!$this->isColValid($i)) {
                return "Col: " . $i . " contains an invalid number";
            }
        }

        return "Valid!";
    }

    /**
     * Checks if the subgrid has all the required values and if they are unique or not.
     *
     * @param $celRow int
     * @param $celCol int
     * @return bool
     */
    private function isValidSubGrid($celRow, $celCol)
    {
        $subGrid = [];
        $subGrid[] = array_slice($this->sudokuInput[$celRow], $celCol, 3);
        $subGrid[] = array_slice($this->sudokuInput[$celRow + 1], $celCol, 3);
        $subGrid[] = array_slice($this->sudokuInput[$celRow + 2], $celCol, 3);
        $subGrid = array_merge(...$subGrid);

        if (count($subGrid) != self::DEFAULT_SIZE || count(array_unique($subGrid)) != self::DEFAULT_SIZE) {
            return false;
        }

        return true;
    }

    public function validateSubGrids()
    {
        for ($row = 0; $row < 9; $row += 3) {
            for ($col = 0; $col < 9; $col += 3) {
                if (!$this->isValidSubGrid($row, $col)) {
                    return "Invalid subgrid in row: $row and col: $col";
                }
            }
        }

        return "Valid!";
    }
}