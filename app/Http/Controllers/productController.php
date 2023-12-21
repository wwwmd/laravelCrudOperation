<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{
    public function index(){
        return view("products.index",['products'=> product::get() ]);
    }


    public function create(){
        return view("products.create");
    }

   

    public function store(request $request){
        //dd($request->all());
        //die();
       // validate data 
       $request->validate([
       'name'=> 'required',
       'email'=> 'required|email',
      'textarea'=> 'required',
       'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
 ]);
        // file uploding 
      $imageName = time().''.$request->image->extension();
      $request->image->move(public_path('products'),$imageName);
      
      $product = new product;
      $product->image = $imageName;
      $product->name = $request->name;
      $product->email = $request->email;
      $product->description = $request->textarea;
      $product->save();
      return back()->withsuccess('product created !!!');
    }

    public function edit($id){
        $product = product:: where ('id',$id)->first();
        return view('products.edit', ['product'=> $product]);
       // dd($id);

    }

    public function update( request $request, $id){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
           'textarea'=> 'required',
            'image'=> 'nullable'
      ]);

          $product = product:: where ('id',$id)->first();
           if(isset($request->image)){
            $imageName = time().''.$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image = $imageName;
           }
             // file uploding 
          
           
          
           
           $product->name = $request->name;
            $product->email = $request->email;
           $product->description = $request->textarea;
           $product->save();
           return back()->withsuccess('product updated !!!');
         } 
         
         public function destroy($id){
          $product = product:: where ('id',$id)->first();
          $product->delete();
          return back()->withsuccess('product Deleted !!!');
         // dd($id);
  
      }

      public function show($id){
        $product = product:: where ('id',$id)->first();
       
        return view('products.show',['product'=>$product]);
       // dd($id);

    }

    }

