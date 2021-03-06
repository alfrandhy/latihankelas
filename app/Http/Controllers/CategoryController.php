<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $category = Category::with(['parent'])->orderBy('created_at','DESC')->paginate(10);
        $parent = Category::getParent()->orderBy('name','ASC')->get();
        return view('category.index', compact('category','parent'));
    }
    public function create(){
        $parent = Category::getParent()->orderBy('name','ASC')->get();
        return view('category.create', compact('category','parent'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:50|unique:categories'
        ]);
        $request->request->add(['slug' => $request->name]);
        Category::create($request->except('_token'));
        return redirect(route('category.index'))->with(['success' => 'Category Ditambah']);
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $parent = Category::getParent()->orderBy('name','ASC')->get();
        return view('category.edit', compact('category','parent'));
    }
    public function Update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|string|max:50|unique:categories,name,' .$id
        ]);
        $category = Category::find($id);
        $category->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug' => $request->name
        ]);
        return redirect(route('category.index'))->with(['success' => 'Category Diperbaharui']);
    }
    public function destroy($id)
    {
        $category=Category::withCount(['child','product'])->find($id);
        if ($category->child_count == 0 && $category->product_count == 0) {
            $category->delete();
            return redirect(route('category.index'))->with(['success' => 'Category Dihapus']);
        }
        return redirect(route('category.index'))->with(['error' => 'Hapus Sub Category Terlebih Dahulu']);
        // $category = Category::find($id)->delete();
        // return redirect(Route('category.index'))
        //     ->with('success', 'Category Berhasil Dihapus')
        // ;
    }
}
