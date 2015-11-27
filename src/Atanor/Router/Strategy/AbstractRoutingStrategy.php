<?php
declare(strict_types = 1);
namespace Atanor\Router\Strategy;

use Atanor\Router\RoutingStrategy;
use Atanor\Router\string;

abstract class AbstractRoutingStrategy implements RoutingStrategy
{
    /**
     * Constraints
     * @var array
     */
    protected $constraints = [];

    /**
     * @inheritDoc
     */
    public function setConstraint(string $parameterName, string $regExp):RoutingStrategy
    {
        $this->constraints[$parameterName] = $regExp;
    }

    /**
     * Check constraint validation on parameter value
     * @param string $parameterName
     * @param string $value
     * @return bool
     */
    protected function checkConstraint(string $parameterName,string $value):bool
    {
        if ( ! isset($this->constraints[$parameterName])) return true;
        $pattern = $this->constraints[$parameterName];
        $check = preg_match($pattern,$value);
        if ($check === 1) return true;
        if ($check === 0) return false;
        //@todo throw exception
    }


}