<?php
/**
 * Created by PhpStorm.
 * User: OnyxzeD
 * Date: 19/08/2015
 * Time: 14:07
 */

namespace App\Domain\Contracts;


/**
 * Interface Searchable
 *
 * @package App\Domain\Contracts
 */
interface Searchable
{
    /**
     * @param $query
     * @return mixed
     */
    public function search($query);
}