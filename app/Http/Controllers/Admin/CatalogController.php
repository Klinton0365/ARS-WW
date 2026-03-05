<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index(): View
    {
        return view('admin.catalogs.index', [
            'catalogs' => Catalog::latest()->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.catalogs.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('catalog', 'public');
        }
        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('catalog/attachments', 'public');
        }

        Catalog::create($data);
        return redirect()->route('admin.catalogs.index')->with('success', 'Catalog item created.');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.catalogs.edit', $id);
    }

    public function edit(Catalog $catalog): View
    {
        return view('admin.catalogs.edit', compact('catalog'));
    }

    public function update(Request $request, Catalog $catalog)
    {
        $data = $this->validatedData($request, $catalog);
        if ($request->hasFile('image')) {
            if ($catalog->image) {
                Storage::disk('public')->delete($catalog->image);
            }
            $data['image'] = $request->file('image')->store('catalog', 'public');
        }
        if ($request->hasFile('attachment')) {
            if ($catalog->attachment) {
                Storage::disk('public')->delete($catalog->attachment);
            }
            $data['attachment'] = $request->file('attachment')->store('catalog/attachments', 'public');
        }

        $catalog->update($data);
        return redirect()->route('admin.catalogs.index')->with('success', 'Catalog item updated.');
    }

    public function destroy(Catalog $catalog)
    {
        if ($catalog->image) {
            Storage::disk('public')->delete($catalog->image);
        }
        if ($catalog->attachment) {
            Storage::disk('public')->delete($catalog->attachment);
        }
        $catalog->delete();
        return back()->with('success', 'Catalog item deleted.');
    }

    private function validatedData(Request $request, ?Catalog $catalog = null): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('catalogs', 'slug')->ignore($catalog)],
            'category' => ['required', 'string', 'max:255'],
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
