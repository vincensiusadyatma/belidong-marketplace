<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){

        $products = Product::where('creator_id', Auth::id())->get();
        
        return view('admin.products.index',[
            'products' => $products
        ]);
    }

    public function create(){

        $categories = Category::all();
        return view('admin.products.create',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request){
    
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cover' => ['required','image', 'mimes:png,jpg,jpeg'],
            'path_file' => ['required','file', 'mimes:zip'],
            'about' => ['required', 'string', 'max:2555555'],
            'category_id' => ['required', 'string'],
            'price' => ['required', 'string','min:0'],
        ]);

        DB::beginTransaction();
        try {
        
            if ($request->hasFile('cover')) {
                $cover_path = $request->file('cover')->store('product_covers', 'public');
                $validated['cover'] = $cover_path;
            }
            
            if ($request->hasFile('file_path')) {
                $file_path = $request->file('file_path')->store('product_files', 'public');
                $validated['file_path'] = $file_path;
            }
            

            $validated['slug'] =  Str::slug($request->name);
            $validated['creator_id'] = Auth::id();

            $newProduct = Product::create($validated);
            DB::commit();

            return redirect()->route('admin.products.index')->with('success','Product created sucessfully');

        } catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System Error!'. $e->getMessage()],
              
            ]);
    
        }
        dd($validated);
    }
}
