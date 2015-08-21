<?php

namespace App\Http\Controllers\User;

use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Contracts\Searchable;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserFormRequest;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\User
 */
class UserController extends Controller
{
    /**
     * @var Crudable
     */
    protected $crud;
    /**
     * @var Paginable
     */
    protected $paginate;
    /**
     * @var Searchable
     */
    protected $search;

    /**
     * @param Crudable   $crudable
     * @param Paginable  $paginable
     * @param Searchable $searchable
     */
    public function __construct(Crudable $crudable, Paginable $paginable, Searchable $searchable)
    {
        $this->crud = $crudable;
        $this->paginate = $paginable;
        $this->search = $searchable;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->paginate->getByPage(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(UserFormRequest $request)
    {
        return $this->crud->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->crud->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int     $id
     * @return Response
     */
    public function update(UserFormRequest $request, $id)
    {
        return $this->crud->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return $this->crud->delete($id);
    }
}
