<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

namespace Pilmico\Service;

use Pilmico\Model\Plan;

interface PlanService
{
    /**
     * @param Plan $plan
     */
    public function savePlan(Plan $plan);
}
