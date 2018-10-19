<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Vote; 
use Auth;
class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $uservote = Vote::select('prod_id')->where('user_id', Auth::user()->id)->get();
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index')->with('products', $products)
                                     ->with('uservote',Auth::user()->votes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $user_id = auth()->user('id');
        // $user = User::find($user_id);
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'summ' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
            $product = new Product;
            $product->title = $request->input('title');
            $product->description = $request->input('desc');
            $product->summary = $request->input('summ');
            $product->cover_image = $fileNameToStore;
            $product->upid = auth()->user()->id;
            $product->save();

            return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $prod = Product::find($id);
        return view('products.show')->with('prod',$prod);
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
     * @param  \Illuminate\Http\Request  $request
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function vote(Request $req)
    {
        # code...
        $vote = new Vote;
        $vote->user_id = Auth::user()->id;
        $vote->prod_id = $req->id;
        $vote->save();
        // DB::insert('insert into userVotes (user_id, prod_id) values (?, ?)', [Auth::user()->id, $req->id]);
        $prod = Product::find($req->id);
        $prod->votes =  $prod->votes+1;
        $prod->save();

        
        // return redirect('/products');
        return response()->json($prod);
    }
}
