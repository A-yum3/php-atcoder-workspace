#!/opt/homebrew/bin/php
<?php declare(strict_types=1);

const MOD1000000007 = 10 ** 9 + 7;
const MOD = MOD1000000007;


class Solve
{
    use StdInputTrait, StdUtilTrait;

    public function execute(): void
    {
        $n = $this->inInt()[0];

        for ($i = 1; $i <= $n; $i++) {
            $x = (int) ($i * 1.08);
            if ($x === $n) {
                $this->output($i);
                return;
            }
        }
        $this->output(':(');
    }

    private function output($var): void
    {
        echo $var.PHP_EOL;
    }
}

//$start = microtime(true);
(new Solve())->execute();
//print_r(microtime(true) - $start);


///////////////////////////////////////////////////////////////////

trait StdInputTrait
{
    /**
     * @param  string  $format
     * @return array|false|null
     */
    public function in(string $format)
    {
        return fscanf(STDIN, $format);
    }

    /**
     * @param  int  $n
     * @return array|false|null
     */
    public function inInt(int $n = 1)
    {
        return fscanf(STDIN, str_repeat("%d", $n));
    }

    /**
     * @param  int  $n
     * @return array|false|null
     */
    public function inStr(int $n = 1)
    {
        return fscanf(STDIN, str_repeat("%s", $n));
    }

    public function inFloat(int $n = 1)
    {
        return fscanf(STDIN, str_repeat("%f", $n));
    }

    public function inIntMat(int $rows, int $cols): array
    {
        $res = [];
        for ($i = 0; $i < $rows; ++$i) {
            $res[] = $this->inInt($cols);
        }
        return $res;
    }

    public function inIntRow(int $rows): array
    {
        $res = [];
        for ($i = 0; $i < $rows; ++$i) {
            [$res[]] = $this->inInt(1);
        }
        return $res;
    }

    /**
     * @param  string|null  $sep
     * @return string|array
     */
    public function readline(string $sep = null)
    {
        if (empty($sep)) {
            return trim(fgets(STDIN));
        }
        return explode($sep, trim(fgets(STDIN)));
    }

    public function readlineInt(string $sep = ' '): array
    {
        return array_map(static fn($e) => (int) $e, explode($sep, trim(fgets(STDIN))));
    }

    public function readlineFloat(string $sep = ' '): array
    {
        return array_map(static fn($e) => (float) $e, explode($sep, trim(fgets(STDIN))));
    }
}

trait StdUtilTrait
{
    /**
     * 値の入れ替え
     * @param &$a
     * @param &$b
     */
    public function swap(&$a, &$b): void
    {
        $tmp = $a;
        $a = $b;
        $b = $tmp;
    }

    /**
     * 整数除算切り上げ
     * @param  int  $x
     * @param  int  $y
     * @return int
     */
    public function intDivCeil(int $x, int $y): int
    {
        return intdiv($x + $y - 1, $y);
    }

    public function changeMax(&$a, $b): bool
    {
        if ($a < $b) {
            $a = $b;
            return true;
        }
        return false;
    }

    public function changeMin(&$a, $b): bool
    {
        if ($a > $b) {
            $a = $b;
            return true;
        }
        return false;
    }

    public function arrayFlatten(array $a): array
    {
        $ret = [];
        array_walk_recursive($a, static function ($a) use (&$ret) {
            $ret[] = $a;
        });
        return $ret;
    }
}