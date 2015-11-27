<?php
declare(strict_types = 1);
namespace Atanor\Router;

use Atanor\Http\Message\Request\Request;

interface RoutingStrategy
{
    /**
     * Return true if request matches the route
     * @param Request $request
     * @return bool
     */
    public function match(Request $request):bool;

    /**
     * Parse request and provide data
     * @param Request $request
     * @param \ArrayAccess $result
     * @return \ArrayAccess
     */
    public function parse(Request $request, \ArrayAccess &$result = null):\ArrayAccess;

    /**
     * Reverse given parameters
     * @param \ArrayAccess $array
     * @return Request
     */
    public function reverse(\ArrayAccess $array):Request;

    /**
     * Set constraint on parameter value
     * @param string $parameterName
     * @param string $regExp
     * @return RoutingStrategy
     */
    public function setConstraint(string $parameterName,string $regExp):RoutingStrategy;

}
