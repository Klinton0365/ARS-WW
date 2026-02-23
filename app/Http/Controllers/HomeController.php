<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Portfolio;
use App\Models\Project;
use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.home', [
            'services' => Service::active()->limit(6)->get(),
            'featuredProjects' => Project::published()->where('is_featured', true)->limit(6)->get(),
            'portfolioItems' => Portfolio::published()->limit(6)->get(),
            'catalogItems' => Catalog::published()->limit(6)->get(),
            'stats' => [
                'projects' => Project::published()->count(),
                'services' => Service::active()->count(),
                'portfolio' => Portfolio::published()->count(),
                'catalog' => Catalog::published()->count(),
            ],
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'services' => Service::active()->limit(4)->get(),
            'projectCount' => Project::published()->count(),
        ]);
    }

    public function services(): View
    {
        return view('pages.services', [
            'services' => Service::active()->get(),
        ]);
    }

    public function projects(): View
    {
        return view('pages.projects.index', [
            'projects' => Project::published()->paginate(9),
        ]);
    }

    public function projectShow(string $slug): View
    {
        return view('pages.projects.show', [
            'project' => Project::where('slug', $slug)->where('is_published', true)->firstOrFail(),
        ]);
    }

    public function portfolio(): View
    {
        return view('pages.portfolio', [
            'portfolioItems' => Portfolio::published()->get(),
        ]);
    }

    public function catalog(): View
    {
        return view('pages.catalog', [
            'catalogItems' => Catalog::published()->get(),
        ]);
    }
}
