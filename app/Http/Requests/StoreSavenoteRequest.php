<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreSavenoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $get_data_trac = DB::table('traceability_factors')
            ->select('received_date')->get();
        foreach($get_data_trac as $key_data_trac_fact => $value_data_trac_fact)
        $received_date = thaidate('d-m-Y', strtotime($value_data_trac_fact->received_date));
        return [
            'received_date' => $received_date,
        ];
    }
}
