<?php

namespace App\Http\Controllers;

use App\Product;
use App\Traceability_factor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EchartController extends Controller
{
    //
    public function echart(Request $request)
    {
    	$fruit = Product::where('product_type','fruit')->get();
    	$veg = Product::where('product_type','vegitable')->get();
    	$grains = Product::where('product_type','grains')->get();
    	$fruit_count = count($fruit);    	
    	$veg_count = count($veg);
    	$grains_count = count($grains);
    	return view('echart',compact('fruit_count','veg_count','grains_count'));
    }

    public function echart2(Request $request)
    {
    	// $seed = Traceability_factor::where('type', '=','เมล็ด')->get();
    	$seed = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'เมล็ด')->get()->sum('total_price');
    	// $seed = DB::table('traceability_factors')->select('total_price')->where('plot_id', '=', $datas)->get()->sum('total_price');
    	$fertilizer = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'ปุ๋ย')->get()->sum('total_price');
    	$wage = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'ค่าแรง')->get()->sum('total_price');
    	$etc = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'ค่าอื่นๆ')->get()->sum('total_price');
    	$seed_count = $seed;    	
    	$fertilizer_count = $fertilizer;
    	$wage_count = $wage;
    	$etc_count = $etc;
    	return view('test2',compact('seed_count',
		'fertilizer_count',
		'wage_count',
		'etc_count'
	));
    }
}
