<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
  
  
    public function index(Request $request)
    {
        // getData();
        // die();
        $result['home_categories'] = DB::table('categories')
            ->where(['status' => 1])
            ->where(['is_home' => 1])
            ->get();

        foreach ($result['home_categories'] as $list) {
            $result['home_categories_product'][$list->id] = DB::table('products')
                ->where(['status' => 1])
                ->where(['category_id' => $list->id])
                ->get();

            foreach ($result['home_categories_product'][$list->id] as $list1) {
                $result['home_products_attr'][$list1->id] = DB::table('products_attr')
                    ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
                    ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
                    ->where(['products_attr.id' => $list1->id])
                    ->get();
            }

            $result['home_banner'] = DB::table('home_banners')
            ->where(['status' => 1])
            ->get();
            
            // echo '<pre>';
            // print_r($result);
            // die();
           
            return view('front.index', $result);

        }
 
    }

}