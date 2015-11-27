<?php
declare(strict_types = 1);
namespace Atanor\Router;

interface RouteResult extends \ArrayAccess
{
    /**
     * @param RouteResult $result
     * @return RouteResult
     */
    public function merge(RouteResult $result):RouteResult;
}