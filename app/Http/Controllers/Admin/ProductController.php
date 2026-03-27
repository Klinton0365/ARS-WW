<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', [
            'products' => Product::latest()->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $data['image'] = 'uploads/products/' . $filename;
        }
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products/attachments'), $filename);
            $data['attachment'] = 'uploads/products/attachments/' . $filename;
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.products.edit', $id);
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validatedData($request, $product);

        if ($request->hasFile('image')) {
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $data['image'] = 'uploads/products/' . $filename;
        }
        if ($request->hasFile('attachment')) {
            if ($product->attachment && File::exists(public_path($product->attachment))) {
                File::delete(public_path($product->attachment));
            }
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products/attachments'), $filename);
            $data['attachment'] = 'uploads/products/attachments/' . $filename;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }
        if ($product->attachment && File::exists(public_path($product->attachment))) {
            File::delete(public_path($product->attachment));
        }
        $product->delete();

        return back()->with('success', 'Product deleted.');
    }

    private function validatedData(Request $request, ?Product $product = null): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($product)],
            'category' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'specifications_input' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'max:4096'],
            'attachment' => ['nullable', 'file', 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip', 'max:10240'],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['is_published'] = $request->boolean('is_published', true);
        $data['specifications'] = $this->parseSpecifications($data['specifications_input'] ?? null);
        unset($data['specifications_input']);

        return $data;
    }

    private function parseSpecifications(?string $specs): array
    {
        if (! $specs) {
            return [];
        }

        return collect(explode("\n", $specs))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }
}
