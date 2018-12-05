<?php
namespace Assessment\Tests;

use Assessment\Assessment;
use PHPUnit\Framework\TestCase;

class AssessmentTest extends TestCase
{
    protected $assessment;
    protected $numList;
    protected $expected;

    public function setUp()
    {
        $this->assessment = new Assessment();
        $this->numList = [13, 9, 644];
        $this->expected = 666;
    }

    public function testGivenEmptyArrayReturnsZero()
    {
        $input = [];
        $actual = $this->assessment->closestToZero($input);

        assertEquals(0, $actual);
    }

    public function testGivenArrReturnsArrElementClosestToZero()
    {
        $input = [7, -10, 13, 8, 4, -7.2, -12, -3.7, 3.5, -9.6, 6.5, -1.7, -6.2, -7];
        $actual = $this->assessment->closestToZero($input);

        assertEquals(-1.7, $actual);
    }

    public function testGivenArrForLoopSumsListOfNumbers()
    {
        $actual = $this->assessment->forLoop($this->numList);

        assertEquals($this->expected, $actual);
    }

    public function testGivenArrWhileLoopSumsListOfNumbers()
    {
        $actual = $this->assessment->whileLoop($this->numList);

        assertEquals($this->expected, $actual);
    }

    public function testGivenArrRecursivelyAddsListOfNumbers()
    {
        $n = count($this->numList);
        $actual = $this->assessment->add($this->numList, $n);

        assertEquals($this->expected, $actual);
    }

    public function testGivenTwoArraysAlternatelyCombinesArrays()
    {
        $arr1 = ['a', 'b', 'c'];
        $arr2 = [1, 2, 3];

        $actual = $this->assessment->combineArrays($arr1, $arr2);
        $expected = ['a', 1, 'b', 2, 'c', 3];

        assertEquals($expected, $actual);
    }

    public function testListsFirst100FibonacciNumbers()
    {
        $actual = count($this->assessment->fibonacci());
        $expected = 100;

        assertEquals($expected, $actual);
    }
}
