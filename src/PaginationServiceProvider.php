<?php
/**
 * Created by PhpStorm.
 * User: sebas
 * Date: 08.10.2016
 * Time: 15:09
 */

namespace SKoziel\Silex\Pagination;

use Kilte\Pagination\Pagination;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PaginationServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['pagination.per_page'] = isset($app['pagination.per_page']) ? (int) $app['pagination.per_page'] : 20;
        $app['pagination.neighbours'] = isset($app['pagination.neighbours']) ? (int) $app['pagination.neighbours'] : 4;
        $app['pagination'] = $app->protect(
            function ($total, $current, $perPage = null, $neighbours = null) use ($app) {
                if ($perPage === null) {
                    $perPage = $app['pagination.per_page'];
                }
                if ($neighbours === null) {
                    $neighbours = $app['pagination.neighbours'];
                }
                return new Pagination($total, $current, $perPage, $neighbours);
            }
        );
    }

    public function boot(Container $app)
    {}
}