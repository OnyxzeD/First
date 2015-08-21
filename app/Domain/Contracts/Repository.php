<?php
/**
 * Created by PhpStorm.
 * User: OnyxzeD
 * Date: 19/08/2015
 * Time: 14:07
 */

namespace App\Domain\Contracts;


/**
 * Interface Repository
 *
 * @package App\Domain\Contracts
 */
interface Repository
{
    /**
     * Get data all
     *
     * @return mixed
     */
    public function all();

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function getManyBy($key, $value);

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function getFirstBy($key, $value);

    /**
     * @param       $key
     * @param array $array
     * @return mixed
     */
    public function getWhereIn($key, array $array);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function instance(array $attributes = []);
}