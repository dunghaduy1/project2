<?php

namespace App\Imports;

use App\Student;
use App\Classes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class sinhVienImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $row = array_filter($row);
        if(!empty($row)){
            $array = [
                'ten' => $row['ten'],
                'email' => $row['email'],
                'so_dien_thoai' => $row['so_dien_thoai'],
                'ngay_sinh' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['ngay_sinh'])->format('Y-m-d'),
                'gioi_tinh' => ($row['gioi_tinh']=='Nam') ? 1 : 0,
                'trang_thai' => 1,
                'ma_lop' => Classes::where('ten_lop',$row['ten_lop'])->value('ma_lop'),
            ];
            return new Student($array);
        }
    }
}
