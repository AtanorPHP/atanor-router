<?php
declare(strict_types = 1);
namespace Atanor\Router;

class DefaultRouteResult implements RouteResult
{
    /**
     * Parameters
     * @var array
     */
    protected $parameters = [];

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return isset($this->parameters[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->parameters[$offset];
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->parameters[$offset] = $value;
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->parameters[$offset]);
    }
}