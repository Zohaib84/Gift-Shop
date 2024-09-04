<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the admin index page.
     *
     * @return \Illuminate\View\View
     */
    public function index(){

        $user = User::where('usertype', 'user')->get()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        $delivered = Order::where('status', 'Delivered')->get()->count();

        return view('admin.index', compact('user', 'product', 'order', 'delivered'));
    }

    /**
     * Show the home page with all products.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        // Retrieve all products from the database
        $product = Product::all();
        
         // Check if the user is authenticated
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            // Correct the query to count cart items for the authenticated user
            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }
        // Pass the products to the home view
        return view('home.index', compact('product', 'count'));
    }

    /**
     * Show the home page with all products after login.
     *
     * @return \Illuminate\View\View
     */
    public function login_home()
    {
        // Retrieve all products from the database
        $product = Product::all();
    
        // Initialize cart count
        $count = 0;
    
         // Check if the user is authenticated
         if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            // Correct the query to count cart items for the authenticated user
            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }
    
        // Pass the products and cart count to the home view
        return view('home.index', compact('product', 'count'));
    }
    

    /**
     * Show the product details page.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function product_details($id)
    {
        // Find the product by its ID
        $data = Product::find($id);

        
        // Check if the user is authenticated
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            // Correct the query to count cart items for the authenticated user
            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }
        // Pass the product details to the view
        return view('home.product_details', compact('data','count'));
    }

    /**
     * Add a product to the cart.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_cart($id)
    {
        // Get the product ID
        $product_id = $id;

        // Get the authenticated user
        $user = Auth::user();
        // Get the user's ID
        $user_id = $user->id;

        // Create a new Cart instance
        $data = new Cart;
        // Set the user ID and product ID for the cart entry
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        // Save the cart entry to the database
        $data->save();

        // Show a success message
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added to the Cart successfully.');

        // Redirect back to the previous page
        return redirect()->back();
    }
    // My Cart Function
    public function my_cart()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();

            $cart = Cart::Where('user_id', $userid)->get();

        }
        return view('home.my_cart', compact('count','cart'));
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;
        $cart = Cart::Where('user_id', $userid)->get();

        foreach($cart as $carts)
        {
            $order = new Order;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;

            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();

            
        }

        $cart_remove = Cart::where('user_id',$userid)->get();
        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Ordered successfully.');

        return redirect()->back();
        
    }
    // my orders functions here
    public function myorders()
    {
        $user = Auth::user()->id;

        $count = Order::where('user_id', $user)->get()->count();

        $order = Order::where('user_id', $user)->get();
        return view('home.order', compact('count', 'order'));
    }
 // Payment method strips functions
    public function stripe($value)
    {
        return view('home.stripe',compact('value'));
    }

    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from complete" 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return redirect('my_cart');
    }

    // Stripe function ends here

    public function shop()
    {
        // Retrieve all products from the database
        $product = Product::all();
        
         // Check if the user is authenticated
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            // Correct the query to count cart items for the authenticated user
            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }
        // Pass the products to the home view
        return view('home.shop', compact('product', 'count'));
    }

    public function why()
    {
        // Retrieve all products from the database
        $product = Product::all();
        
         // Check if the user is authenticated
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            // Correct the query to count cart items for the authenticated user
            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }
        // Pass the products to the home view
        return view('home.why', compact('product', 'count'));
    }

    public function testimonial()
    {
        // Retrieve all products from the database
        $product = Product::all();
        
         // Check if the user is authenticated
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            // Correct the query to count cart items for the authenticated user
            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }
        // Pass the products to the home view
        return view('home.testimonial', compact('product', 'count'));
    }

    public function contact()
    {
        // Retrieve all products from the database
        $product = Product::all();
        
         // Check if the user is authenticated
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            // Correct the query to count cart items for the authenticated user
            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }
        // Pass the products to the home view
        return view('home.contact', compact('product', 'count'));
    }

}

