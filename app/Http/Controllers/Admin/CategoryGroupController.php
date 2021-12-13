<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryGroupRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Models\CategoryGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $categoryGroups = CategoryGroup::paginate(5);
        return view('admin.categories.index', compact('categoryGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryGroupRequest $request)
    {
        CategoryGroup::create($request->validated());
        return redirect()->route('groups.index')->with('message', 'Grupo creado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CategoryGroup $categoryGroup
     * @return RedirectResponse
     */
    public function destroy(CategoryGroup $group)
    {
        $group->delete();
        return redirect()->route('groups.index')->with('message', 'Grupo eliminado correctamente');
    }

    public function groupStore(Request $request)
    {

    }
}
