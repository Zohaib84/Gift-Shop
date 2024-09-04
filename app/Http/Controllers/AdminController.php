<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    // Add category function
    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category added successfully.');
        return redirect()->back();
    }

    // Delete category function
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category deleted successfully.');
        return redirect()->back();
    }

    // Edit category function
    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    // Update category function
    public function update_category(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category updated successfully.');
        return redirect('/view_category');
    }

    // Add product function
    public function add_product()
    {
        $categories = Category::all();
        return view('admin.add_product', compact('categories'));
    }

    // Upload product function
    public function upload_product(Request $request)
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->quantity = $request->qty;
        $image = $request->image;

        if ($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imageName);
            $data->image = $imageName; 
        }
        
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product uploaded successfully.');
        return redirect()->back();
    }
    // View Product function
    public function view_product()
    {
        $product = Product::paginate(3);
        return view('admin.view_product', compact('product'));
    }

    // Delete Product function
    public function delete_product($id)
    {
        $data = Product::find($id);
        //Delete image from folder 
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        $data->delete();
        return redirect()->back();
    }

    //Update Product function
    public function update_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_page',compact('data', 'category'));
    }

    // Edit Product data function
   public function edit_product(Request $request, $id)
    {
    $data = Product::find($id);

    // Update product details
    $data->title = $request->title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->quantity = $request->quantity;
    $data->category = $request->category;

    // Handle image upload
    $image = $request->image;
    if ($image) {
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products', $imagename);
        $data->image = $imagename;
    }

    // Save updated product
    $data->save();
    toastr()->timeOut(10000)->closeButton()->addSuccess('Product Updated successfully.');
        return redirect()->back();

    // Redirect to the view product page
    return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;

        $product = Product::where('title','LIKE','%' .$search. '%')
                            ->orWhere('category','LIKE','%' .$search. '%')->paginate(3);
        return view('admin.view_product', compact('product'));
    }

    // view order Function
    public function view_orders()
    {
        $data = Order::all();

        return view('admin.orders' , compact('data'));
    }

    // On the way function

    public function on_the_way($id)
    {
        $data = Order::find($id);

        $data->status = 'On the way';

        $data->save();

        return redirect('/view_orders');
    }

    // Delivered Function
    public function delivered($id)
    {
        $data = Order::find($id);

        $data->status = 'Delivered';

        $data->save();

        return redirect('/view_orders');
    }

    // Download PDF file
    public function print_pdf($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
