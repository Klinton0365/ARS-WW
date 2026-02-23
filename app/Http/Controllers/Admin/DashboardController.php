<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Lead;
use App\Models\Portfolio;
use App\Models\Project;
use App\Models\Service;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'services' => Service::count(),
                'projects' => Project::count(),
                'portfolio' => Portfolio::count(),
                'catalog' => Catalog::count(),
                'new_leads' => Lead::where('status', 'new')->count(),
            ],
            'latestLeads' => Lead::newest()->limit(8)->get(),
        ]);
    }
}
