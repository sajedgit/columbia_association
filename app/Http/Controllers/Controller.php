<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getStatusItem()
    {
        $status_items = array('Select' => 'Select', '1' => 'Active', '0' => 'Inactive');
        return $status_items;

    }

    protected function adminEmail()
    {

        $data = Setting::findOrFail(1);
        return $data->admin_email;
    }

}
