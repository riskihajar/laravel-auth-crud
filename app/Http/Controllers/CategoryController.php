<?php
namespace App\Http\Controllers;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(20);

        return view('category.index', compact('category'));
    }

    public function create()
    {
        return $this->form();
    }

    public function edit($id)
    {
        return $this->form($id);
    }

    public function form($id = null)
    {
        if($id){
            $category = Category::find($id);
            session()->flashInput(array_merge($category->toArray(), old()));

            $method = 'PUT';
            $action = route('category.update', $id);
        }else{
            $method = 'POST';
            $action = route('category.store');
        }


        return view('category.form', compact('method', 'action'));
    }

    public function store()
    {
        return $this->save();
    }

    public function update($id)
    {
        return $this->save($id);
    }

    public function save($id = null)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        if($id){
            $category = Category::find($id);
        }else{
            $category = new Category;
        }

        $category->name = request()->input('name');
        $category->description = request()->input('description');
        $category->save();

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}