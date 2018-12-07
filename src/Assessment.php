<?php  declare(strict_types=1);

namespace Assessment;

/**
 * Contains various algorithms for calculating list of numbers and Fibonacci
 *
 * @author  Dario
 * @license MIT
 */
class Assessment
{
    /**
     * The initial value for counters - const saves memory
     *
     * @var int
     */
    private const INITIAL = 0;

    /**
     * Algorithm returns the number from given list closest to zero
     *
     * @param array $input List of numbers
     * @param float $closestTo The default closest to number to find
     * @return float
     */
    public function closestToZero(array $input, float $closestTo = self::INITIAL): float
    {
        $this->isEmpty($input);

        $closest = self::INITIAL;

        foreach ($input as $num) {
            if ($closest === self::INITIAL || abs($closestTo - $closest) > abs($num - $closestTo)) {
                $closest = $num;
            }
        }

        echo "Result $closest \n";

        return $closest;
    }

    /**
     * Calculate sum from given list of numbers using For-loop
     *
     * @param array $input List of numbers
     * @return int
     */
    public function forLoop(array $input): int
    {
        $sum = self::INITIAL;

        for ($i = self::INITIAL; $i < count($input); $i++) {
            $sum += $input[$i];
        }

        return $sum;
    }

    /**
     * Calculate sum from given list of numbers using While-loop
     *
     * @param array $input List of numbers
     * @return int
     */
    public function whileLoop(array $input): int
    {
        $sum = self::INITIAL;
        $counter = self::INITIAL;

        while ($counter < count($input)) {
            $next = $input[$counter];
            $sum += $next;
            $counter++;
        }

        return $sum;
    }

    /**
     * Recursively calculate sum from given list of numbers
     *
     * @param array $input List of numbers
     * @param int $n Number of items in $input
     * @return int
     */
    public function add(array $input, int $n): int
    {
        if ($n <= self::INITIAL) {
            return self::INITIAL;
        }

        return $this->add($input, $n - 1) + $input[$n - 1];
    }

    /**
     * Alternately combines two lists
     *
     * @param array $list1 Items list
     * @param array $list2 Items list
     * @return array
     */
    public function combineArrays(array $list1, array $list2): array
    {
        $combined = [];

        for ($i = self::INITIAL; $i < count($list1); $i++) {
            $combined[] = $list1[$i];
            $combined[] = $list2[$i];
        }

        return $combined;
    }

    /**
     * Computes the list of the first 100 Fibonacci numbers
     *
     * @return array
     */
    public function fibonacci(): array
    {
        $range = 100;
        $n = self::INITIAL;
        $n1 = self::INITIAL;
        $n2 = 1;
        $sequence = [];

        //echo $n1.' '.$n2.' ';

        while ($n < $range) {
            $n3 = $n2 + $n1;

            //echo $n3 . ' ';

            $n1 = $n2;
            $n2 = $n3;
            $n += 1;

            array_push($sequence, $n3);
        }

        return $sequence;
    }

    /**
     * Check if arrays is empty returns zero.
     *
     * @param array $input Empty array
     * @return int
     */
    public function isEmpty(array $input): int
    {
        if (empty($input)) {
            return self::INITIAL;
        }

        return 1;
    }
}
