<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use App\Models\Activity;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $user = auth()->user();

        // Access role via relationship
        $role = $user->role; // Fetch the associated role




        $breadcrumb = (object)[
            'title' => 'Dashboard Admin',
            'subtitle' => 'Ringkasan data',
        ];

        return view('dashboardAdmin', compact('breadcrumb', 'user'));
    }


    public function indexApproval()
    {
        $user = auth()->user();

        // Access role via relationship
        $role = $user->role; // Fetch the associated role

        // Check if the role is approval

        $breadcrumb = (object)[
            'title' => 'Dashboard Approval',
            'subtitle' => 'Ringkasan data untuk approval',
        ];

        return view('dashboardApproval', compact('breadcrumb', 'user'));
    }

    // If the role is not approval, handle accordingly
    // (perhaps redirect or show an error)
}
