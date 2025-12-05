<?php

namespace App\Exports;

use App\Models\Member\Member;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MemberExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Member::all();
        $list = DB::table("member")->selectRaw("email, userName, pwd")->get();
        return $list;
    }

    public function headings(): array
    {
        return [
            "Email","姓名","密碼"
        ];
    }
}

