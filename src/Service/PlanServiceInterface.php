<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

namespace Pilmico\Service;

use Pilmico\Model\Plan;

interface PlanServiceInterface
{
    /**
     * @param Plan $plan
     */
    public function savePlan(Plan $plan);
}
