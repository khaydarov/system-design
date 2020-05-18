<?php

use App\Kses;
use App\Renderer;
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

//        $str = (string) $duration;

        echo $duration / count($this->xssStrings);
//        $b = str_replace('.', ',', $str);
//        echo $b . '<br>';
    }

    public function test($sanitizer)
    {
        $clean = [];
        foreach ($this->xssStrings as $string) {
            $t = $sanitizer->doSanitize($string);
            $clean[] = $t;

            echo $t . PHP_EOL;
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
echo $app->test($app->getSanitizer(2));
//for ($i = 0; $i < 100; $i++) {
//$app->measure(3);
//}