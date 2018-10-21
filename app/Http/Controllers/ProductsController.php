<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Vote; 
use App\User; 
use App\Comment;
use Auth;
class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            // $uservote = Vote::select('prod_id')->where('user_id', Auth::user()->id)->get();
            $products_latest = Product::orderBy('created_at', 'desc')->get();
            $products_votes = Product::orderBy('votes', 'desc')->get();
            return view('products.index')->with('products', $products_latest)
                                        ->with('prod_votes', $products_votes);
                                         
       
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
            'domain' =>'required',
            'cover_image' => 'image|nullable|max:5000'
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

        if($request->hasFile('caro1')){
            $fileNameWithExt = $request->file('caro1')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('caro1')->getClientOriginalExtension();
            $fileCaro1 = $filename.'_'.time().'.'.$extension;
            $path = $request->file('caro1')->storeAs('public/caro1/', $fileCaro1);
        }else{
            $fileCaro1 = 'noimage.jpg';
        }
        if($request->hasFile('caro2')){
            $fileNameWithExt = $request->file('caro2')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('caro2')->getClientOriginalExtension();
            $fileCaro2 = $filename.'_'.time().'.'.$extension;
            $path = $request->file('caro2')->storeAs('public/caro2/', $fileCaro2);
        }else{
            $fileCaro2 = 'noimage.jpg';
        }

            $product = new Product;
            $product->title = $request->input('title');
            $product->description = $request->input('desc');
            $product->summary = $request->input('summ');
            $product->cover_image = $fileNameToStore;
            $product->caro1 = $fileCaro1;
            $product->caro2 = $fileCaro2;
            $product->upid = auth()->user()->id;
            $product->dpid = $request->input('domain');
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
        $owner = User::find($prod->upid);  
        $comments = $prod->comments()->get();
        // return $comment;
        return view('products.show')->with('prod',$prod)
                                    ->with('owner', $owner)
                                    ->with('comments',$comments);
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

    // public function displayProd(){
    //     return view('products.displayprod');
    // }

    public function comment(Request $req){
        //
        $prodid = $req->input('prodid');
        $comment = new Comment;
        $comment->pros = $req->input('pros');
        $comment->cons = $req->input('cons');
        $comment->description = $req->input('descr');
        $comment->user_id = Auth::user()->id;
        $comment->prod_id = $req->input('prodid');
        // $comment->dpid = =
        $comment->save();

        return redirect("/products/$prodid");
    }
}

