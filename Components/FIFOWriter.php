<?php declare(strict_types=1);

namespace FIFOShopwareEvents\Components;

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;

class FIFOWriter
{
    public function write(...$args)
    {
        $fp = fopen(__DIR__.'/../fifo', 'wb+');

        foreach($args as $arg) {
            $cloner = new VarCloner();
            $dumper = new CliDumper();
            $output = fopen('php://memory', 'r+b');
            $dumper->dump($cloner->cloneVar($arg), $output);
            fwrite($fp, stream_get_contents($output, -1, 0));
        }

        fclose($fp);
    }
}