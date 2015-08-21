<?php
/**
 * Created by PhpStorm.
 * User: OnyxzeD
 * Date: 20/08/2015
 * Time: 11:51
 */

namespace App\Domain\Repositories;

use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Contracts\Searchable;
use App\Domain\Entities\User;

/**
 * Class UserRepository
 *
 * @package App\Domain\Repositories
 */
class UserRepository extends AbstractRepository implements Crudable, Searchable, Paginable
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
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
                'name'     => e($data['name']),
                'email'    => e($data['email']),
                'password' => bcrypt($data['password']),
                'address'  => e($data['address']),
                'phone'    => e($data['phone']),
                'level'    => e($data['level']),
                'role'     => e($data['role']),
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
                'name'     => e($data['name']),
                'email'    => e($data['email']),
                'password' => bcrypt($data['password']),
                'address'  => e($data['address']),
                'phone'    => e($data['phone']),
                'level'    => e($data['level']),
                'role'     => e($data['role']),
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