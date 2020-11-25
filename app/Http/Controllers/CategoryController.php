<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
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
        return redirect(route('category'))->with(['success' => 'Category Ditambah']);
    }
}
