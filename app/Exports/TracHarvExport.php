<?php

namespace App\Exports;

use App\Traceability_harvest;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TracHarvExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'harvest_date' => 'วันที่เก็บเกี่ยว',
            'product' => 'ผลผลิต',
            'total_product' => 'ปริมาณผลผลิตรวม	',
            'unit' => 'หน่วย',
            'recorder' => 'ผู้บันทึก'
        ];
    }
    public function collection()
    {
        return Traceability_harvest::all('harvest_date', 'product', 'total_product', 'unit', 'recorder');
    }
}
