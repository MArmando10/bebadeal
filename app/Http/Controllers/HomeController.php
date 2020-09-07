<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Offers;
use App\Categoria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $isGame = true;
        $bestOffers = collect();
        $products = Product::all()->where('status', 1)->take(6);
        $categorias = Product::all()->where('categoria', 2);

        foreach($products as $product){
            if(count($product->ofertas) > 0){
                $bestOffers->push($product->ofertas()->orderBy('oferta', 'desc')->first());
            }
        }

        $bestOffers = $bestOffers->sortBy('oferta');

        $users = \App\User::all();
        // dd($users);
        $anterior = [];
        return view('home3',compact('anterior','products','users','bestOffers','categorias'));
    }





    function search(Request $request) {

        $anterior = $request->all();

       $product = Product::when($request->categorias,function($query, $request){return $query->where('nombre','like', '%'. $request .'%');})
                                     ->orderBy('nombre', 'ASC')
                                     ->Paginator::defaultSimpleView('products.index')
                                     ->setPath ( '' );

                $product->appends ( array (
                 'nombre' => $request->categorias
                ) );

       }



        public function getLicenseExpireAttribute($tiempo)
        {
            return Carbon::parse($tiempo);
        }


}
