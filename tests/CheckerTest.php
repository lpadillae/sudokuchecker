<?php

namespace Tests;

use Challenge\Sudoku\Checker;
use PHPUnit\Framework\TestCase;

class CheckerTest extends TestCase
{
    private $validSudoku;
    private $invalidSudoku;

    public function setUp()
    {
        $this->validSudoku = [[3, 2, 8, 9, 6, 4, 1, 7, 5],
            [7, 5, 1, 3, 8, 2, 4, 9, 6],
            [9, 4, 6, 5, 7, 1, 3, 2, 8],
            [2, 1, 3, 6, 4, 7, 5, 8, 9],
            [4, 9, 7, 8, 1, 5, 6, 3, 2],
            [8, 6, 5, 2, 9, 3, 7, 4, 1],
            [6, 3, 4, 1, 2, 9, 8, 5, 7],
            [1, 7, 9, 4, 5, 8, 2, 6, 3],
            [5, 8, 2, 7, 3, 6, 9, 1, 4]];

        $this->invalidSudoku = [[4, 7, 2, 3, 8, 9, 6, 2, 1],
            [9, 9, 7, 8, 4, 6, 3, 4, 2],
            [4, 1, 2, 7, 8, 4, 3, 7, 9],
            [1, 4, 2, 5, 3, 6, 3, 4, 1],
            [8, 7, 9, 6, 4, 5, 2, 3, 1],
            [3, 3, 3, 5, 7, 8, 6, 5, 5],
            [3, 7, 8, 9, 7, 2, 3, 1, 5],
            [4, 1, 4, 7, 8, 5, 2, 1, 3],
            [6, 4, 5, 3, 2, 1, 8, 7, 9]];


        $this->secondInvalidSudoku = [[3, 2, 8, 9, 6, 4, 1, 7, 5],
            [7, 5, 1, 3, 8, 2, 4, 9, 6],
            [9, 4, 6, 5, 7, 1, 3, 2, 8],
            [2, 1, 3, 6, 4, 7, 5, 8, 9],
            [4, 9, 7, 8, 1, 5, 6, 3, 2],
            [8, 6, 5, 2, 9, 3, 7, 4, 1],
            [6, 3, 4, 1, 2, 9, 8, 5, 1],
            [1, 7, 9, 4, 5, 8, 2, 6, 3],
            [5, 8, 2, 7, 3, 6, 9, 1, 4]];
    }

    /**
     * @test
     */
    public function it_checks_valid_rows()
    {
        $sudokuChecker = new Checker($this->validSudoku);
        $result = $sudokuChecker->validateRows();
        $this->assertSame("Valid!", $result);
    }

    /**
     * @test
     */
    public function it_checks_valid_columns()
    {
        $sudokuChecker = new Checker($this->validSudoku);
        $result = $sudokuChecker->validateColumns();
        $this->assertSame("Valid!", $result);
    }

    /**
     * @test
     */
    public function it_checks_valid_subgrids()
    {
        $sudokuChecker = new Checker($this->validSudoku);
        $result = $sudokuChecker->validateSubGrids();
        $this->assertSame("Valid!", $result);
    }


    /**
     * @test
     */
    public function it_checks_invalid_rows()
    {
        $sudokuChecker = new Checker($this->invalidSudoku);
        $result = $sudokuChecker->validateRows();
        $this->assertSame("Row: 0 contains an invalid number", $result);

        $sudokuChecker = new Checker($this->secondInvalidSudoku);
        $result = $sudokuChecker->validateRows();
        $this->assertSame("Row: 6 contains an invalid number", $result);
    }

    /**
     * @test
     */
    public function it_checks_invalid_columns()
    {
        $sudokuChecker = new Checker($this->invalidSudoku);
        $result = $sudokuChecker->validateColumns();
        $this->assertSame("Col: 0 contains an invalid number", $result);

        $sudokuChecker = new Checker($this->secondInvalidSudoku);
        $result = $sudokuChecker->validateColumns();
        $this->assertSame("Col: 8 contains an invalid number", $result);
    }

    /**
     * @test
     */
    public function it_checks_invalid_subgrids()
    {
        $sudokuChecker = new Checker($this->invalidSudoku);
        $result = $sudokuChecker->validateSubGrids();
        $this->assertSame("Invalid subgrid in row: 0 and col: 0", $result);

        $sudokuChecker = new Checker($this->secondInvalidSudoku);
        $result = $sudokuChecker->validateSubGrids();
        $this->assertSame("Invalid subgrid in row: 6 and col: 6", $result);
    }
}