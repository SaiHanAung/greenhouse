<?php 
namespace App\Exports;
 
use App\Traceability_factor;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
 
class TracFactExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */ 
    public function headings():array{
        return[
            'received_date' => 'วันที่ซื้อ / ได้มา', 
            'name' => 'รายการปัจจัยการผลิต', 
            'type' => 'ประเภท', 
            'amount' => 'ปริมาณ', 
            'price' => 'ราคา', 
            'unit' => 'หน่วย', 
            'source' => 'แหล่งที่มา', 
            'total_price' => 'รวมเป็นเงิน(บาท)', 
            'recorder' => 'ผู้บันทึก'
        ];
    } 
    public function collection()
    {
        return Traceability_factor::all('received_date', 'name', 'type', 'amount', 'price', 'unit', 'source', 'total_price', 'recorder');
    }
}