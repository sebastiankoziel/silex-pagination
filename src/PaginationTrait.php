<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 08.10.2016
 * Time: 15:12
 */

namespace SKoziel\Silex\Pagination;

use Kilte\Pagination\Pagination;

class PaginationTrait
{
    /**
     * @param int $total
     * @param int $current
     * @param int $perPage
     * @param int $neighbours
     * @return Pagination
     */
    public function pagination($total, $current, $perPage = null, $neighbours = null)
    {
        return $this['pagination']($total, $current, $perPage, $neighbours);
    }
}