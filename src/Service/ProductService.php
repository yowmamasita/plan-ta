<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

namespace Pilmico\Service;


interface ProductService
{
    /**
     * Fetches an array of products sorted by the last 3 mos volume, hi to lo
     *
     * @return array
     */
    public function getTopProducts();
}
