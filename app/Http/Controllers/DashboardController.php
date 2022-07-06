<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\Plot;
use App\Switches;
use App\Sell_produce;
use App\Traceability;
use App\Traceability_factor;
use App\Traceability_use_factor;
use App\Traceability_harvest;
use App\Setting_plant;
use App\Setting_qrcode;
use App\Note_plant;
use App\Note_harvest;
use App\Note_maintenance;
use App\Note_plant_area;
use App\Note_sell;
use App\Temp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($plotID, Request $request)
    {
        
        $data_plot = DB::table('plots')->get();

        $get_plot_name = DB::table('plots')
            ->select('name')
            ->where('id', '=', $plotID)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
            foreach ($value_name as $key_name_sub => $value_name_sub) {
            }
        }
        $get_plot_id = DB::table('plots')
            ->select('id')
            ->where('id', '=', $plotID)->get();
        foreach ($get_plot_id as $key_plot_id => $value_plot_id) {
        }
        $get_host_topic = DB::table('plots')
            ->select('host', 'topic_send', 'topic_sub')
            ->where('id', '=', $plotID)->get();
        foreach ($get_host_topic as $keyht => $valueht) {
        }

        $seed = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'เมล็ด')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->get()->sum('total_price');
        $fertilizer = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'ปุ๋ย')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->get()->sum('total_price');
        $wage = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'ค่าแรง')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->get()->sum('total_price');
        $etc = DB::table('traceability_factors')->select('total_price')->where('type', '=', 'ค่าอื่นๆ')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->get()->sum('total_price');

        $check_tract_total_price = DB::table('traceability_factors')->select('total_price')->where('plot_id', '=', $plotID)->count();
        $tract_total_price = DB::table('traceability_factors')->select('total_price')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->get()->sum('total_price');

        $check_sale_product = DB::table('note_sells')->select('price')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->count();
        // dd($check_sale_product);
        $sale_product = DB::table('note_sells')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->get()->sum('total_price');

        $get_trac_fact_id = DB::table('traceability_factors')->where('plot_id', '=', $plotID)->get('plot_id');
        foreach ($get_trac_fact_id as $k_t_f => $v_t_f) {
        }

        $check_del_date = DB::table('note_plants')->select('deleted_at')->where('plot_id', '=', $plotID)->where('deleted_at', '!=', null)->count();

        // $get_new_plant_dates = DB::table('new_plant_dates')->select('delete_date')->where('plot_id', '=', $plotID)->get();

        $get_new_plant_dates = DB::table('new_plant_dates')->select('id', 'delete_date', 'plot_id', 'total_price', 'total_sale')->where('plot_id', '=', $plotID)->get();
        foreach ($get_new_plant_dates as $key_new_plant_dates => $value_new_plant_dates) {
        }

        $get_data_setting_plant = DB::table('setting_plants')->select('id','date_of_plant','name','harvest_day','plot_id')
        ->where('plot_id', '=', $plotID)
        ->where('deleted_at', '=', null)->get();
        foreach($get_data_setting_plant as $key_data_setting_plant => $value_data_setting_plant){}

        $check_setting_plant = DB::table('setting_plants')->select('id')
        ->where('plot_id', '=', $plotID)->where('deleted_at',null)->count();

        $check_harv_date = DB::table('note_harvests')->select('id')
        ->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->count();

        $check_traceability = DB::table('traceabilitys')
        ->where('plot_id',$plotID)->where('deleted_at', '=', null)->count();

        $plant_area_total_price = DB::table('note_plant_areas')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $plant_total_price = DB::table('note_plants')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $harvest_total_price = DB::table('note_harvests')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $maintenance_total_price = DB::table('note_maintenances')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');

        $plant_area_price = DB::table('note_plant_areas')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $plant_price = DB::table('note_plants')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $harvest_price = DB::table('note_harvests')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');
        $maintenance_price = DB::table('note_maintenances')->where('plot_id', $plotID)->where('deleted_at', null)->get()->sum('price');

        $sum_total_price = $plant_area_price += $plant_price += $harvest_price += $maintenance_price;

        // dd($plant_area_total_price);
        $check_plant_price = Note_plant::where('plot_id', $plotID)->where('deleted_at', null)->count();

        $get_temp_humid = DB::table('temp_humid')->get('temp', 'humid');

        // $get_temps = DB::table('temps')->latest('temp')->where('plot_id',$plotID)->first();
        // $get_humids = DB::table('humids')->latest('humid')->where('plot_id',$plotID)->first();
        // $temp = $get_temps->temp;
        // $humid = $get_humids->humid;

        // dd($temp);

        return view('dashboards.index', compact(
            // 'humid',
            // 'temp',
            // 'get_humids',
            // 'get_temps',
            'get_temp_humid',
            'check_plant_price',
            'sum_total_price',
            'plant_total_price',
            'harvest_total_price',
            'plant_area_total_price',
            'maintenance_total_price',
            'plotID',
            'value_name_sub',
            'check_harv_date',
            'get_plot_id',
            'get_host_topic',
            'seed',
            'fertilizer',
            'wage',
            'etc',
            'check_tract_total_price',
            'check_sale_product',
            'check_del_date',
            'tract_total_price',
            'sale_product',
            'get_trac_fact_id',
            'get_new_plant_dates',
            'get_data_setting_plant',
            'check_setting_plant',
            'check_traceability',
        ))->with('title_savenote_index','จดบันทึก - ');
    }

    public function settime($plotID)
    {
        //
        $get_plot_name = DB::table('plots')
            ->select('name')
            ->where('id', '=', $plotID)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
            foreach ($value_name as $key_name_sub => $value_name_sub) {
            }
        }


        $get_data_settime = DB::table('settimes')
            ->select('id', 'settime_value')
            ->where('plot_id', '=', $plotID)->get();

        // dd($value_name_sub);
        return view('settimes.index', compact('plotID', 'value_name_sub', 'get_data_settime'));
    }

    public function st(Request $request, $id)
    {
        $newPermLevel = $request->input('value');
        $override = (int) $newPermLevel;

        DB::table('settimes')
            ->where('id', $id)
            ->update(array('settime_value' => $override));

        return back();
    }

    public function destroySwitch(Switches $switches)
    {
        //
        $switches->delete();
        return back()->with('success', 'ลบสวิตซ์สำเร็จแล้ว');
    }

    public function newPlant($plotID, Request $request)
    {
        $get_plot_name = DB::table('plots')
            ->select('name')
            ->where('id', '=', $plotID)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
            foreach ($value_name as $key_name_sub => $value_name_sub) {
            }
        }

        // dd($tf);
        Note_sell::where('plot_id', '=', $plotID)->delete();
        Note_plant_area::where('plot_id', '=', $plotID)->delete();
        Note_maintenance::where('plot_id', '=', $plotID)->delete();
        Note_harvest::where('plot_id', '=', $plotID)->delete();
        Note_plant::where('plot_id', '=', $plotID)->delete();
        Setting_plant::where('plot_id', '=', $plotID)->delete();
        Setting_qrcode::where('plot_id', '=', $plotID)->delete();
        

        DB::table('new_plant_dates')->insert([[
            'delete_date' => Carbon::now(),
            'plot_id' => $plotID,
            'name' => $value_name_sub,
        ]]);
        
        Traceability::where('plot_id', '=', $plotID)->delete();

        $reference_id = Traceability::withTrashed()->where('plot_id',$plotID)->get('reference_id');
        foreach($reference_id as $key_reference_id => $value_reference_id){}

        $new_plant_id = DB::table('new_plant_dates')->select('id', 'plot_id', 'name', 'delete_date')
            ->where('name', '=', $value_name_sub)
            ->where('plot_id', '=', $plotID)->get();
        foreach ($new_plant_id as $key_new_plant_id => $value_new_plant_id) {
        }

        $get_date_of_plant = DB::table('setting_plants')->select('date_of_plant')
        ->where('plot_id', '=', $plotID)
        ->where('deleted_at', '=', $value_new_plant_id->delete_date)->get();
        foreach($get_date_of_plant as $key_date_of_plant => $value_date_of_plant){}

        DB::table('note_sells')->where('deleted_at', $value_new_plant_id->delete_date)->update(
            array('history_plant_id' => $value_new_plant_id->id)
        );
        DB::table('note_plant_areas')->where('deleted_at', $value_new_plant_id->delete_date)->update(
            array('history_plant_id' => $value_new_plant_id->id)
        );
        DB::table('note_maintenances')->where('deleted_at', $value_new_plant_id->delete_date)->update(
            array('history_plant_id' => $value_new_plant_id->id)
        );
        DB::table('traceabilitys')->where('deleted_at', $value_new_plant_id->delete_date)->update(
            array('history_plant_id' => $value_new_plant_id->id)
        );
        DB::table('note_harvests')->where('deleted_at', $value_new_plant_id->delete_date)->update(
            array('history_plant_id' => $value_new_plant_id->id)
        );
        DB::table('note_plants')->where('deleted_at', $value_new_plant_id->delete_date)->update(
            array('history_plant_id' => $value_new_plant_id->id)
        );
        DB::table('setting_plants')->where('deleted_at', $value_new_plant_id->delete_date)->update(
            array('history_plant_id' => $value_new_plant_id->id)
        );

        $plant_area_total_price = DB::table('note_plant_areas')->where('plot_id', $plotID)->where('deleted_at',$value_new_plant_id->delete_date)->get()->sum('price');
        $plant_total_price = DB::table('note_plants')->where('plot_id', $plotID)->where('deleted_at',$value_new_plant_id->delete_date)->get()->sum('price');
        $harvest_total_price = DB::table('note_harvests')->where('plot_id', $plotID)->where('deleted_at',$value_new_plant_id->delete_date)->get()->sum('price');
        $maintenance_total_price = DB::table('note_maintenances')->where('plot_id', $plotID)->where('deleted_at',$value_new_plant_id->delete_date)->get()->sum('price');
        $sell_total_price = DB::table('note_sells')->where('plot_id', $plotID)->where('deleted_at',$value_new_plant_id->delete_date)->get()->sum('total_price');

        $sum_total_price = $plant_area_total_price += $plant_total_price += $harvest_total_price += $maintenance_total_price;

        DB::table('new_plant_dates')->where('id', $value_new_plant_id->id)->update(
            array('total_price' => $sum_total_price, 
            'total_sale' => $sell_total_price, 
            'reference_id' => $value_reference_id->reference_id,
            )
        );

        DB::table('switch_logs')->where('plot_id', $plotID)->update(
            array('history_plant_id' => $value_new_plant_id->id)
        );
        DB::table('switch_set_time_logs')->where('plot_id', $plotID)->update(
            array('history_plant_id' => $value_new_plant_id->id)
        );
        
        return back()->with('success', 'รีเซ็ตข้อมูล สำหรับการเริ่มปลูกใหม่สำเร็จแล้ว');
    }

    public function historyPlant($plotID, $historyPlantID)
    {
        $get_plot_name = DB::table('plots')
            ->select('name')
            ->where('id', '=', $plotID)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
            foreach ($value_name as $key_name_sub => $value_name_sub) {
            }
        }

        $get_new_plant_dates = DB::table('new_plant_dates')->select('id', 'delete_date')->where('plot_id', '=', $plotID)->get();
        foreach ($get_new_plant_dates as $key_new_plant_dates => $value_new_plant_dates) {
        }
        // dd($value_new_plant_dates);

        $get_data_trac = DB::table('traceability_factors')
            ->select('id', 'received_date', 'type', 'name', 'amount', 'price', 'unit', 'source', 'total_price', 'recorder')
            ->where('plot_id', '=', $plotID)
            ->where('history_plant_id', '=', $historyPlantID)->paginate(5);
        $check_tract_total_price = DB::table('traceability_factors')->select('total_price')->where('plot_id', '=', $plotID)->count();
        $tract_total_price = DB::table('traceability_factors')->select('total_price')
            ->where('plot_id', '=', $plotID)

            ->where('history_plant_id', '=', $historyPlantID)->get()->sum('total_price');
        // dd($check_tract_total_price);

        $check_data_trac_use_fact = DB::table('traceability_use_factors')->select('id')
            ->where('plot_id', '=', $plotID)

            ->where('history_plant_id', '=', $historyPlantID)->count();
        $get_data_trac_use_fact = DB::table('traceability_use_factors')
            ->select('id', 'date_of_use', 'name_of_use', 'amount', 'unit', 'recorder')
            ->where('plot_id', '=', $plotID)
            ->where('history_plant_id', '=', $historyPlantID)->paginate(5);

        $check_data_trac_harv = DB::table('traceability_harvests')->select('id')->where('plot_id', '=', $plotID)->count();
        $get_data_trac_harv = DB::table('traceability_harvests')
            ->select('id', 'harvest_date', 'product', 'total_product', 'unit', 'recorder')
            ->where('plot_id', '=', $plotID)
            ->where('history_plant_id', '=', $historyPlantID)->paginate(5);

        $get_data_sell_produce = DB::table('sell_produce')
            ->select('id', 'sale_date', 'produce', 'amount', 'unit', 'price', 'recorder')
            ->where('plot_id', '=', $plotID)
            ->where('history_plant_id', '=', $historyPlantID)->paginate(5);

        $new_plant_id = DB::table('new_plant_dates')->select('id', 'plot_id', 'name', 'delete_date')
            ->where('name', '=', $value_name_sub)
            ->where('plot_id', '=', $plotID)->get();
        foreach ($new_plant_id as $key_new_plant_id => $value_new_plant_id) {
        }

        $plant_area_total_price = DB::table('note_plant_areas')->where('plot_id', $plotID)->where('history_plant_id', '=', $historyPlantID)->get()->sum('price');
        $plant_total_price = DB::table('note_plants')->where('plot_id', $plotID)->where('history_plant_id', '=', $historyPlantID)->get()->sum('price');
        $harvest_total_price = DB::table('note_harvests')->where('plot_id', $plotID)->where('history_plant_id', '=', $historyPlantID)->get()->sum('price');
        $maintenance_total_price = DB::table('note_maintenances')->where('plot_id', $plotID)->where('history_plant_id', '=', $historyPlantID)->get()->sum('price');
        $sell_total_price = DB::table('note_sells')->where('plot_id', $plotID)->where('history_plant_id', '=', $historyPlantID)->get()->sum('total_price');

        $plant_area_price = DB::table('note_plant_areas')->where('plot_id', $plotID)->where('history_plant_id', '=', $historyPlantID)->get()->sum('price');
        $plant_price = DB::table('note_plants')->where('plot_id', $plotID)->where('history_plant_id', '=', $historyPlantID)->get()->sum('price');
        $harvest_price = DB::table('note_harvests')->where('plot_id', $plotID)->where('history_plant_id', '=', $historyPlantID)->get()->sum('price');
        $maintenance_price = DB::table('note_maintenances')->where('plot_id', $plotID)->where('history_plant_id', '=', $historyPlantID)->get()->sum('price');

        $sum_total_price = $plant_area_price += $plant_price += $harvest_price += $maintenance_price;

        // $tract_total_price = DB::table('traceability_factors')->select('total_price')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->get()->sum('total_price');

        $check_sale_product = DB::table('sell_produce')->select('price')->where('plot_id', '=', $plotID)->where('deleted_at', '=', null)->count();
        // dd($check_sale_product);
        $sale_product = DB::table('sell_produce')->select('price')->where('plot_id', '=', $plotID)->where('history_plant_id', '=', $historyPlantID)->get()->sum('price');

        $get_trac_fact_id = DB::table('traceability_factors')->where('plot_id', '=', $plotID)->get('plot_id');
        foreach ($get_trac_fact_id as $k_t_f => $v_t_f) {
        }

        $check_del_date = DB::table('traceability_factors')->select('deleted_at')->where('plot_id', '=', $plotID)->where('deleted_at', '!=', null)->count();

        $get_data_trac_use_fact_first = DB::table('traceability_use_factors')
            ->select('date_of_use', 'recorder')
            ->where('plot_id', '=', $plotID)->get()->first();
        // foreach($get_data_trac_use_fact as $key_data_trac_use_fact){}

        $get_data_trac_harv_first = DB::table('traceability_harvests')
            ->select('harvest_date', 'product')
            ->where('plot_id', '=', $plotID)->get()->first();

        $get_data_maintenance = DB::table('maintenances')
            ->select('id', 'date_of_use', 'name_of_use', 'type_of_use', 'amount', 'unit', 'notation')
            ->where('plot_id', '=', $plotID)
            ->where('history_plant_id', '=', $historyPlantID)->paginate(5);

        $get_data_setting_plant = DB::table('setting_plants')->select('id','date_of_plant','name', 'grower_name', 'harvest_day','plot_id')
        ->where('plot_id', '=', $plotID)
        ->where('history_plant_id', '=', $historyPlantID)->get();
        foreach($get_data_setting_plant as $key_data_setting_plant => $value_data_setting_plant){}

        $get_data_note_plant_area = DB::table('note_plant_areas')->where('history_plant_id', $historyPlantID)->get();
        $get_data_note_plant = DB::table('note_plants')->where('history_plant_id', $historyPlantID)->get();
        $get_data_note_harvest = DB::table('note_harvests')->where('history_plant_id', $historyPlantID)->get();
        $get_data_note_maintenance = DB::table('note_maintenances')->where('history_plant_id', $historyPlantID)->get();
        $get_data_note_sell = DB::table('note_sells')->where('history_plant_id', $historyPlantID)->get();
        foreach($get_data_note_sell as $key_sell => $value_sell){}

        return view('savenotes.historyPlant', compact(
            'value_sell',
            'value_data_setting_plant',
            'get_data_note_plant_area',
            'get_data_note_plant',
            'get_data_note_harvest',
            'get_data_note_maintenance',
            'get_data_note_sell',
            'plant_area_total_price',
            'plant_total_price',
            'harvest_total_price',
            'maintenance_total_price',
            'sell_total_price',
            'sum_total_price',
            'value_name_sub',
            'plotID',
            'historyPlantID',
            'get_data_trac_use_fact',
            'get_data_trac_harv',
            'get_data_trac',
            'tract_total_price',
            'sale_product',
            'check_tract_total_price',
            'check_data_trac_use_fact',
            'check_sale_product',
            'check_data_trac_harv',
            'get_data_sell_produce',
            'get_data_trac_use_fact_first',
            'get_data_trac_harv_first',
            'get_data_maintenance',
            'get_data_setting_plant',
        ));
    }

    public function storeSettingPlant(Request $request)
    {
        Setting_plant::create($request->all());

        return back()->with('success', 'ตั้งค่าการปลูกสำเร็จแล้ว');
    }

    public function setupQrcode($plotID)
    {
        $get_plot_name = DB::table('plots')
            ->select('id', 'name')
            ->where('id', '=', $plotID)->get();
        foreach ($get_plot_name as $key_name => $value_name) {
        }
        DB::table('new_plant_dates')->insert([
            [
                'name' => $value_name->name, 
                'delete_date' => null, 
                'plot_id' => $value_name->id , 
                'total_price' => null, 
                'total_sale' => null
            ]
        ]);

        return back()->with('success', 'สร้าง Qr code สำเร็จแล้ว');
    }

    public function storeTraceability($plotID)
    {
        $PN = Plot::where('id',$plotID)->get('name');
        foreach($PN as $key_pn => $value_pn){}

        $get_data_note_harvest = Note_harvest::where('plot_id', $plotID)->get()->all();
        foreach($get_data_note_harvest as $key_harvest => $value_harvest){}

        $setting_plant = Setting_plant::where('plot_id',$plotID)->where('deleted_at',null)->get()->all();
        foreach($setting_plant as $key_setting_plant => $value_setting_plant){}

        $reference_id = Str::random(12);

        DB::table('traceabilitys')->insert([
            [
                'plot_name' => $value_pn->name,
                'product' => $value_setting_plant->name, 
                'grower_name' => $value_setting_plant->grower_name, 
                'plant_date' => $value_setting_plant->date_of_plant, 
                'harvest_date' => $value_harvest->date,
                'plot_id' => $plotID,
                'reference_id' => $reference_id,
            ]
        ]);

        $get_reference_id = DB::table('traceabilitys')
            ->where('plot_id',$plotID)
            ->where('deleted_at', null)->get()->all();
        foreach($get_reference_id as $key_reference_id => $value_reference_id){}

        DB::table('note_maintenances')->where('plot_id', $plotID)->update(
            array('reference_id' => $value_reference_id->reference_id)
        );
        
        return back()->with('success', 'สร้าง Qr code สำเร็จแล้ว');
    }
}