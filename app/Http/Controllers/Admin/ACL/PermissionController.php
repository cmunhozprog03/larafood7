<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;


class PermissionController extends Controller
{
    protected $repository;

    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->repository->paginate();

        return view('admin.pages.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermissionRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('permissions.index')
                         ->with('record_added', 'Criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = $this->repository->where('id', $id)->first();

        if(!$permission)
            return redirect()->back();

        return view('admin.pages.permissions.show', [
            'permission' => $permission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->repository->where('id', $id)->first();

        if(!$permission)
            return redirect()->back();

        return view('admin.pages.permissions.edit', [
            'permission' => $permission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermissionRequest $request, $id)
    {
        $permission = $this->repository->where('id', $id)->first();

        
        if(!$permission)
            return redirect()->back();
        
        $permission->update($request->all());

        return redirect()->route('permissions.index')
                         ->with('record_changed', 'Alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = $this->repository->where('id', $id)->first();

        
        if(!$permission)
            return redirect()->back();
        
        $permission->delete();

        return redirect()->route('permissions.index')
                         ->with('record_exclused', 'Exclu??do com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $permissions = $this->repository
                         ->where(function($query) use ($request){
                             if($request->filter){
                                 $query->where('name', 'LIKE', "%{$request->filter}%");
                                 $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                             }
                            })
                         ->paginate();

        return view('admin.pages.permissions.index', compact('permissions'), compact('filters'));
    }
}
