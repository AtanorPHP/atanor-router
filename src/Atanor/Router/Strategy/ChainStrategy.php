<?php
declare(strict_types = 1);
namespace Atanor\Router\Strategy;

use Atanor\Http\Message\Request\Request;
use Atanor\Router\DefaultRouteResult;
use Atanor\Router\RoutingStrategy;

class ChainStrategy implements RoutingStrategy
{
    /**
     * Strategy stack
     * @var array
     */
    protected $strategyStack = [];

    /**
     * @inheritDoc
     */
    public function match(Request $request):bool
    {
        foreach($this->strategyStack as $strategy) {
            if ( ! $strategy->match($request)) return false;
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function parse(Request $request,\ArrayAccess &$result = null):\ArrayAccess
    {
        if ( ! $result) $result = new DefaultRouteResult();
        foreach($this->strategyStack as $stategy) {
            $stategy->parse($request,$result);
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
}