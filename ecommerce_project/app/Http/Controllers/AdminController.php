<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Support\Composer;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();

        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        toastr()->timeOut(10000)->closeButton()->success('Category Added successfully.');

        return redirect()->back();
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->success('Category Deleted successfully.');
        return redirect()->back();
    }
    public function delete_product($id){
        $data = Product::find($id);
        $image = public_path('products/'.$data->image);

        if (file_exists($image)){
            unlink($image);
        }
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->success('Product Deleted successfully.');
        return redirect()->back();
    }

    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }
    public function udpate_category( Request $request,$id){
        $data = Category::find($id);
        $data->category_name = $request->category;

        $data->save();

        toastr()->timeOut(10000)->closeButton()->success('Category Updated successfully.');
        return redirect ('/view_category');
    }
    public function add_product(){
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }
    public function upload_product(Request $request){
        $data = new Product;

        $data->title = $request->title;
        $data->Description = $request->Description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;

        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);

            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeOut(10000)->closeButton()->success('Product Added successfully.');
        return redirect()->back();

    }
    public function view_product(){
        $data = Product::paginate(3);
        return view('admin.view_product',compact('data'));
    }
    public function update_product($id){
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_product',compact('data','category'));
    }

    public function edit_product(Request $request,$id){
            $data = Product::find($id);

            $data->title = $request->title;
            $data->Description = $request->Description;
            $data->price = $request->price;
            $data->Quantity = $request->Quantity;
            $data->category = $request->category;
            $image = $request->image;

            if($image){
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->image->move('products',$imagename);
                $data->image = $imagename;
            }
            $data->save();
            toastr()->timeOut(10000)->closeButton()->success('Product Updated successfully.');

            return redirect('/view_product');
    }
    public function product_search(Request $request){
        $search =  $request->search;

        $data = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);

        return view('admin.view_product',compact('data'));
    }
    public function view_order(){
        $data=Order::all();

        return view('admin.view_order',compact('data'));
    }

    public function on_the_way($id){
        $data = Order::find($id);

        $data -> status = 'On the way';

        $data -> save();

        return redirect('/view_order');
    }

    public function delivered($id){
        $data = Order::find($id);

        $data -> status = 'Delivered';

        $data -> save();

        return redirect('/view_order');
    }
}

