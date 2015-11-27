<?php
declare(strict_types = 1);
namespace Atanor\Router\Strategy;

use Atanor\Http\Message\Request\Request;
use Atanor\Http\Uri\Url\Url;
use Atanor\Router\RoutingStrategy;

class SchemeStrategy extends AbstractRoutingStrategy implements RoutingStrategy
{
    /**
     * @var string
     */
    protected $paramName = 'scheme';

    /**
     * @inheritDoc
     */
    public function match(Request $request):bool
    {
        $url = $request->getUri();
        if ( ! $url instanceof Url) return false;
        if (empty($url->getScheme())) return false;
        return true;
    }

    /**
     * @inheritDoc
     */
    public function parse(Request $request, \ArrayAccess &$result = null):\ArrayAccess
    {
        if ( ! $this->match($request)) {
            //@todo throw exception
        }
        $scheme = $request->getUri()->getScheme();
        if ($this->checkConstraint($this->paramName,$scheme)) {
            $result[$this->paramName] = $scheme;
        }
        else {
            //@todo throw little exception :) because of security issue
        }
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function reverse(\ArrayAccess $array):Request
    {
        // TODO: Implement reverse() method.
    }

    /**
     * @param string $paramName
     */
    public function setParamName(string $paramName):SchemeStrategy
    {
        $this->paramName = $paramName;
        return $this;
    }
}