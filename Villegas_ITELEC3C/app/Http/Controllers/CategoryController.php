<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FunctionController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    
    public function index() {
        $categories = Category::latest()->paginate('5');
        return view('admin.category.category', compact('categories'));
    }

    public function create(Request $request) {
        $validated =  $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);

        $imagePath = $request->file('category_img')->storeAs('category_images', $request->file('category_img')->getClientOriginalName(), 'public');

        Category::create([
            'category_name' => $request->category_name,
            'category_img' => $imagePath,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', 'category inserted');
    }

    public function edit($id) {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    public function update(Request $request, $id) {
      $request->validate([
            'category_name' => 'required|max:255'
        ]);

        $imagePath = null;
        if ($request->hasFile('category_img')) {
            $imagePath = $request->file('category_img')->storeAs('category_img', $request->file('category_img')->getClientOriginalName(), 'public');
        } else {
            $imagePath = Category::find($id)->category_img;
        }

        Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'category_img' => $imagePath,
        ]);
        return Redirect()->route('AllCat')->with('success', 'Updated successfully');
    } 

    public function delete($id) {
        Category::find($id)->delete();
        return Redirect()->back()->with('success', 'category deleted');
    } 
}