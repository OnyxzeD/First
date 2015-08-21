<?php
/**
 * Created by PhpStorm.
 * User: OnyxzeD
 * Date: 19/08/2015
 * Time: 14:07
 */

namespace App\Domain\Contracts;


interface Paginable
{
    /**
     * @param int $limit
     *
     * @return mixed
     */
    public function getByPage($limit = 10);
}