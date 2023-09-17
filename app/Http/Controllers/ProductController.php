<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{


        public function create(){


            return view('products.create'); //view creat.blade.php file
        }


        public function store(Request $request){


            $data = $request->validate([
                'name' => 'required'
            ]); //validate data acquired
            

            $newdata = Product::create($data); //add new data to product table


            return redirect(route('products.view')); // redirect to route products.view in web.php 
        }


        public function view(){
                $products = Product::orderBy('name', 'ASC')->get(); //fetches products with ascending order from name


                return view('products.view', ['products' => $products]); //view product view.blade.php sending products

        }

        public function edit($id){

            $product = Product::find($id); //find product by id

            return view('products.edit',['product' => $product]); //view products.edit and sending fetched data

        }


        public function update(Request $request, $id){

            $product = Product::find($id); //find product by id

            $product->name = $request->name; //overwrite the name value from database to passed value 

            $product->update();  //initiate update product

            return redirect(route('products.view')); // redirect to route products.view in web.php 
        

        }


        public function remove($product){

            $data = Product::find($product);//find product by id
            

            $data->delete(); //initiate delete product


            return redirect(route('products.view')); //redirect to route products.view in web.php

        }

    //
}
