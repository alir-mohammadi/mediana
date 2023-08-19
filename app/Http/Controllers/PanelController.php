<?php

namespace App\Http\Controllers;

class PanelController extends Controller
{

    public function dashboard()
    {
        return view('dashboard');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function timesheetSettings()
    {
        return view('timesheet-settings');
    }

    public function internalSettings()
    {
        return view('internal-settings');
    }

    public function phoneSettings()
    {
        return view('phone-settings');
    }


}
