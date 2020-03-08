<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example1;

/**
 * Interface MediatorInterface
 * @package App\Behavioral\Mediator\Example1
 */
interface MediatorInterface
{
    /**
     * @param $content
     *
     * @return mixed
     */
    public function sendResponse($content);

    /**
     * @return mixed
     */
    public function makeRequest();

    /**
     * @return mixed
     */
    public function queryDb();
}