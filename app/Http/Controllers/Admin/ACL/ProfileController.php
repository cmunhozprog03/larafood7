<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->paginate(5);

        return view('admin.pages.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfileRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('profiles.index')
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
        $profile = $this->repository->where('id', $id)->first();

        if(!$profile)
            return redirect()->back();

        return view('admin.pages.profiles.show', [
            'profile' => $profile,
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
        $profile = $this->repository->where('id', $id)->first();

        if(!$profile)
            return redirect()->back();

        return view('admin.pages.profiles.edit', [
            'profile' => $profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfileRequest $request, $id)
    {
        $profile = $this->repository->where('id', $id)->first();

        
        if(!$profile)
            return redirect()->back();
        
        $profile->update($request->all());

        return redirect()->route('profiles.index')
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
        $profile = $this->repository->where('id', $id)->first();

        
        if(!$profile)
            return redirect()->back();
        
        $profile->delete();

        return redirect()->route('profiles.index')
                         ->with('record_exclused', 'Exclu??do com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $profiles = $this->repository
                         ->where(function($query) use ($request){
                             if($request->filter){
                                 $query->where('name', 'LIKE', "%{$request->filter}%");
                                 $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                             }
                            })
                         ->paginate();

        return view('admin.pages.profiles.index', compact('profiles'), compact('filters'));
    }
}
