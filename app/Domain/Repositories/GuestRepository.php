<?php
/**
 * Created by PhpStorm.
 * User: OnyxzeD
 * Date: 19/08/2015
 * Time: 14:25
 */

namespace App\Domain\Repositories;

use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Contracts\Searchable;
use App\Domain\Entities\Guest;

/**
 * Class GuestRepository
 *
 * @package App\Domain\Repositories
 */
class GuestRepository extends AbstractRepository implements Crudable, Paginable, Searchable
{
    /**
     * Instance Model
     *
     * @param Guest $user
     */
    public function __construct(Guest $user)
    {
        $this->model = $user;
    }

    /**
     * @param int   $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, array $columns = ['*'])
    {
        return parent::find($id, $columns);
    }

    /**
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {
        return parent::create([
                'name'    => e($data['name']),
                'phone'   => e($data['phone']),
                'email'   => e($data['email']),
                'site'    => e($data['site']),
                'message' => e($data['message']),
            ]
        );
    }

    /**
     * @param       $id
     * @param array $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id, array $data)
    {
        return parent::update($id, [
                'name'    => e($data['name']),
                'phone'   => e($data['phone']),
                'email'   => e($data['email']),
                'site'    => e($data['site']),
                'message' => e($data['message']),
            ]
        );
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

    /**
     * @param $query
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($query)
    {
        return parent::likeSearch('name', $query);
    }

    /**
     * @param int   $limit
     * @param array $columns
     * @return \Illuminate\Pagination\Paginator
     */
    public function getByPage($limit = 10, array $columns = ['*'])
    {
        return parent::getByPage($limit, $columns);
    }
}