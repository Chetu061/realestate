<?php

namespace App\Exports;

// use App\Models\Permission;replace by below due spport spatie package
use Spatie\Permission\Models\Permission;

use Maatwebsite\Excel\Concerns\FromCollection;

class PermissionExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Permission::select('name', 'group_name')->get();
    }
}
