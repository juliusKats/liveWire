<?php

namespace App\Exports;
use App\Models\Subjects;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class USERModel implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return Subjects::select('*')->get();
    }
    public function map($user):array{
        return[
            $user->id,
            $user->name,
            $user->created_at
        ];
    }
    function headings():array{
        return [
            '#',
            'Name',
            'created on'

        ];
    }
}
