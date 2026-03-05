<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('index', [
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
        return view('about', [
            'services' => Service::active()->limit(4)->get(),
            'projectCount' => Project::published()->count(),
        ]);
    }

    public function services(): View
    {
        return view('service', [
            'services' => Service::active()->get(),
        ]);
    }

    public function projects(): View
    {
        return view('projects', [
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
        return view('catalog', [
            'catalogItems' => Catalog::published()->get(),
        ]);
    }

    public function catalogShow(string $slug): View
    {
        $catalogItem = Catalog::where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('pages.catalog.show', [
            'catalogItem' => $catalogItem,
            'relatedCatalogItems' => Catalog::published()
                ->where('id', '!=', $catalogItem->id)
                ->where('category', $catalogItem->category)
                ->latest('id')
                ->limit(3)
                ->get(),
        ]);
    }

    public function products(): View
    {
        return view('products', [
            'products' => Product::published()->get(),
        ]);
    }

    public function productShow(string $slug): View
    {
        $product = Product::where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('pages.products.show', [
            'product' => $product,
            'relatedProducts' => Product::published()
                ->where('id', '!=', $product->id)
                ->where('category', $product->category)
                ->latest('id')
                ->limit(3)
                ->get(),
        ]);
    }
}
