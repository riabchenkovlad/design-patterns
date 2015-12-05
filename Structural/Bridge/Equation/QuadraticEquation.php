<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 24.07.2015
 * Time: 0:40
 */

namespace DesignPatterns\Structural\Bridge\Equation;


use DesignPatterns\Structural\Bridge\Math\MathImpl;

class QuadraticEquation extends Equation
{
    private $a;
    private $b;
    private $c;

    /**
     * @param $a
     * @param $b
     * @param $c
     */
    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function solve()
    {
        if (!$this->mathImpl instanceof MathImpl) {
            throw new \LogicException("Math engine should be set via setMathImpl method");
        }
        $D = $this->mathImpl->sub(
            $this->mathImpl->mul($this->b, $this->b),
            $this->mathImpl->mul(4, $this->mathImpl->mul($this->a, $this->c))
        );

        $twoTimesA = $this->mathImpl->mul(2, $this->a);
        $minusB = $this->mathImpl->neg($this->b);

        //Two solutions
        if ($this->mathImpl->cmp($D, 0) == MathImpl::GREATER) {
            $sqrtD = $this->mathImpl->sqrt($D);

            return array(
                $this->mathImpl->div($this->mathImpl->add($minusB, $sqrtD), $twoTimesA),
                $this->mathImpl->div($this->mathImpl->sub($minusB, $sqrtD), $twoTimesA)
            );
        }

        //Single solution
        if ($this->mathImpl->cmp($D, 0) == MathImpl::EQUALS) {

            return array($this->mathImpl->div($minusB, $twoTimesA));
        }

        //No sulution
        return array();
    }
}
