<?php

use App\Kses;
use App\Renderer;
use App\Sanitizer;
use App\StripTags;
use App\Htmlawed;
use App\HtmlPurifier;

error_reporting(E_ERROR | E_PARSE);

require_once '../vendor/autoload.php';
require_once 'kses/kses.php';

//header("X-XSS-Protection: 0;");
//header("Content-Security-Policy: default-src https: 'unsafe-eval' 'unsafe-inline';");

class Main
{
    /**
     * @var array
     */
    private $sanitizers = [];

    /**
     * @var array
     */
    private $xssStrings = [];

    /**
     * @var Renderer
     */
    private $renderer;

    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->xssStrings = require 'xss.php';
        $this->sanitizers = [
            new Htmlawed(),
            new StripTags(),
            new HtmlPurifier(),
            new Kses()
        ];
    }

    public function measure($index)
    {
        $start = microtime(true);
        $this->test($this->sanitizers[$index]);
        $end = microtime(true);

        $duration = $end - $start;

        var_dump($duration);
        echo $duration / count($this->xssStrings);
//        $b = str_replace('.', ',', $str);
//        echo $b . '<br>';
    }

    public function test(Sanitizer $sanitizer)
    {
        echo 'Testing mechanism: ' . $sanitizer . PHP_EOL;
        $clean = [];
        foreach ($this->xssStrings as $i => $string) {
//            echo 'Attack ' . ($i + 1) . ':' . PHP_EOL;
//            echo 'TaintString: ' . $string . PHP_EOL;
            $t = $sanitizer->doSanitize((string) $string);
//            echo 'ProcessedString: ' . $t . PHP_EOL;
            echo PHP_EOL;

            $clean[] = $t;
        }

        return $clean;
    }

    public function render()
    {
        return $this->renderer->render('tpl/1.phtml', [
            'xss' => $this->xssStrings
        ]);
    }

    public function getSanitizer($index)
    {
        return $this->sanitizers[$index];
    }
}

$app = new Main();
//echo $app->test($app->getSanitizer(0));
//for ($i = 0; $i < 100; $i++) {
$app->measure(3);
//}