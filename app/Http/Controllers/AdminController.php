<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use function Pest\Laravel\delete;
use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    //
    public function index(){
        $users=User::where('usertype','user')->count();
        $products=Product::all()->count();
        $orders=Order::all()->count();
        $delivered=Order::where('status','delivered')->count();
        return view('admin.index',compact('users','products','orders','delivered'));
    }
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request): RedirectResponse
    {
        Category::create([
            'category_name' => $request->category
        ]);
        toastr()->success('category added successfully');
        return redirect()->back();
    }

    public function delete_category($id): RedirectResponse
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->success('category deleted successfully');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->update([
            'category_name' => $request->category,
        ]);
        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request): RedirectResponse
    {

        $validated = $request->validate([

            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->price = $request->price;
        $data->category = $request->category;
        $image = $request->image;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('products', $imageName);
            $data->image = $imageName;
        }
        $data->save();
        return redirect()->back();
    }

    public function view_product()
    {
//        $products = Product::paginate(3);
        $products = Product::all();
        return view('admin.product', compact('products'));
    }

    public function delete_product($id): RedirectResponse
    {
        $data = Product::find($id);
        $image_path = 'products/' . $data->image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $data->delete();
        toastr()->success('category deleted successfully');
        return redirect()->back();
    }

    public function edit_product($slug)
    {
        $data = Product::where('slug', $slug)->first();
        $categories = Category::all();
        return view('admin.edit_product', compact('data', 'categories'));
    }

    public function update_product(Request $request, $id)
    {
        $validated = $request->validate([

            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = Product::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('products', $filename);
            if ($data->image) {
                $oldImage = public_path('products/' . $data->image);
                if (File::exists($oldImage)) {
                    unlink($oldImage);
                }

            }

        }
        $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $filename,

        ]);
//        toastr()->success('product updated successfully');
        return redirect('/view_product');
    }
    public function view_orders()
    {
        $data = Order::all();
        return view('admin.order', compact('data'));
    }
    public function on_the_way($id): RedirectResponse
    {
        $on_way=Order::find($id);
        $on_way->status="On the way";
        $on_way->save();
        return redirect()->back();
    }
    public function delivered($id): RedirectResponse
    {
        $delivered=Order::find($id);
        $delivered->status="Delivered";
        $delivered->save();
        return redirect()->back();
    }
    public function print_pdf($id): \Illuminate\Http\Response
    {
        $data=Order::find($id);
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }


}
