<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShoeController extends Controller
{   
    //read
    public function index() {

        $shoes = Shoe::all();

        // return view('/catalog') -> with('shoes', $shoes);
        return view('/catalog', ['shoes' => $shoes]);
    }

    //create
    public function store(Request $req) {
        $newShoes = new Shoe();
        $brand = $req -> brand; //
        $model = $req -> model; //
        $type = $req -> type; //
        $color = $req -> color; //
        $price = $req -> price; //
        $size = $req -> size; //

        if($req -> hasFile('image')) {
            $image = $req -> file('image');
            $image_extension = $image -> getClientOriginalExtension();
            $image_name = uniqid() . '.' . $image_extension;
            $image_folder = public_path('images/') ;
            $image -> move($image_folder, $image_name);

            //Add data to DB;
            $newShoes -> brand = $brand;
            $newShoes -> model = $model;
            $newShoes -> type = $type;
            $newShoes -> color = $color;
            $newShoes -> price = $price;
            $newShoes -> size = $size;
            $newShoes -> image = $image_name;
        } else {
            return redirect('/create');
        }

        $newShoes -> save();

        return redirect('/catalog');
    }

    public function edit() {
        $shoes = Shoe::all();
        return view('update', ['shoes' => $shoes]);
    }

    public function update(Request $req) {
        $shoe = Shoe::findOrFail($req->selected_shoe);
        $sent = true;

        return view('update', [ 'shoe' => $shoe, 'sent' => $sent]);
    }

    public function save(Request $req){
        $shoe = Shoe::findOrFail($req->id);

        $shoe -> price = $req->price;

        if($req -> hasFile('image')) {
            if($shoe -> image) {
                unlink(public_path('images/' . $shoe -> image));
            }

            $image = $req -> file('image');
            $img_ext = $image -> getClientOriginalExtension();
            $img_name = uniqid() . '.' . $img_ext; //
            $img_folder = public_path('images/'); 
            $image -> move($img_folder, $img_name);
            $shoe -> image = $img_name ; 
        }

        $shoe -> save(); //
        return redirect('/catalog');
    }

    public function delete(Request $req) {

        $shoes = Shoe::all();
        return view ('delete', ['shoes' => $shoes]);
    }

    public function destroy($id){
        $shoe = Shoe::findOrFail($id);

        if($shoe -> image) {
            unlink(public_path('images/' . $shoe -> image));
        }

        $shoe -> delete(); //
        return redirect('/catalog');
    }

    public function deleted(Request $req){
        $shoe = Shoe::findOrFail($req -> $id); //gaseste doar 1 element;

        if($shoe -> image) {
            unlink(public_path('images/' . $shoe -> image));
        }

        $shoe -> delete(); //
        return redirect('/catalog');
    }

    public function sort(Request $req) {
        $shoes = Shoe::all() -> where('type', '=', $req -> type);
        $type = $req -> type; 

        return view('sort') -> with(compact('shoes')) -> with(compact('type'));
    
    }

    public function cart(Request $req) {
        $user = Auth::user();
        $id = $req -> shoe_id;

        if ($user -> cart) {
            $cartItems =explode('/', $user -> cart);

            if( !in_array($id, $cartItems)) {
                array_push($cartItems, $id);

                $cartStr = implode("/", $cartItems);
                $user -> cart = $cartStr;
            }
    } else {
        $cartItems = [];
        array_push($cartItems, $req-> shoe_id);
        $cartStr = implode("/", $cartItems);
        $user -> cart = $cartStr;
    }

        $user -> save();
        return redirect('/cart');
   }



   public function showCart() {
    $userCart = explode('/', Auth::user() -> cart);

    $shoes = Shoe::all();

    if(count($userCart) > 0) {
        $cartItems = []; 
    
        for($i = 0 ; $i < count($shoes); $i++) {

            for($j =0; $j< count($userCart); $j++) 
            {
                if($userCart[$j] == $shoes[$i] -> id) {
                    array_push($cartItems, $shoes[$i]);
                }
            }
        }
        return view('cart') -> with(compact('cartItems'));
    }    
   }


}