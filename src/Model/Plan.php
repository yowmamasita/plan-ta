<?php

namespace Pilmico\Model;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class Plan
{
    /**
     * @var Feedmill
     */
    private $feedmill;

    /**
     * @var array
     */
    private $steps;

    /**
     * @param Feedmill $feedmill
     */
    public function __construct(Feedmill $feedmill)
    {
        $this->feedmill = $feedmill;
        $this->steps = [];
    }

    /**
     * @return Feedmill
     */
    public function getFeedmill()
    {
        return $this->feedmill;
    }

    /**
     * @param Feedmill $feedmill
     */
    public function setFeedmill($feedmill)
    {
        $this->feedmill = $feedmill;
    }

    /**
     * @param PlanStep $step
     */
    public function addStep(PlanStep $step)
    {
        $this->steps[] = $step;
    }
}
