<?php

namespace App\Exports;

use App\Traceability_use_factor;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TracUseFactExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'date_of_use' => 'วันที่ใช้',
            'name_of_use' => 'รายการการใช้ปัจจัยการผลิต',
            'amount' => 'ปริมาณ',
            'unit' => 'หน่วย',
            'recorder' => 'ผู้บันทึก'
        ];
    }
    public function collection()
    {
        return Traceability_use_factor::all('date_of_use', 'name_of_use', 'amount', 'unit', 'recorder');
    }
}
