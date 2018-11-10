<?php

namespace Pilmico\Model;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class Plan
{
    /**
     * @var array
     */
    private $steps;

    /**
     */
    public function __construct()
    {
        $this->steps = [];
    }

    /**
     * @param PlanStep $step
     */
    public function addStep(PlanStep $step)
    {
        $this->steps[] = $step;
    }
}
