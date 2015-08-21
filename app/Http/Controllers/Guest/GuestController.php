<?php

namespace App\Http\Controllers\Guest;

use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Contracts\Searchable;

use App\Guest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\GuestFormRequest;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $crud;
    protected $paginate;
    protected $search;

    public function __construct(Crudable $crudable, Paginable $paginable, Searchable $searchable)
    {
        $this->crud = $crudable;
        $this->paginate = $paginable;
        $this->search = $searchable;
    }

    public function index()
    {
//        return Guest::paginate(10, ['name', 'phone', 'message', 'site']);
        return $this->paginate->getByPage(10);
    }


    public function search(Request $request)
    {
        return $this->search->search($request->input('query'));
    }
    /**
     * Create a new entity
     *
     * @param ArticleRequest $request
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(GuestFormRequest $request)
    {
        return $this->crud->create($request->all());
    }
    /**
     * Find a single entity
     *
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return $this->crud->find($id);
    }
    /**
     * Update an existing entity
     *
     * @param                    $id
     * @param ArticleEditRequest $request
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, GuestFormRequest $request)
    {
        return $this->crud->update($id, $request->all());
    }
    /**
     * Delete an existing entity
     *
     * @param $id
     *
     * @return bool
     */
    public function destroy($id)
    {
        return $this->crud->delete($id);
    }
}
