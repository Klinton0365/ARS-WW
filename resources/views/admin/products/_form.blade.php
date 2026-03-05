@csrf
<div class="form-row">
    <input type="text" name="name" placeholder="Product Name" value="{{ old('name', $product->name ?? '') }}"
        required>
    <input type="text" name="slug" placeholder="Slug" value="{{ old('slug', $product->slug ?? '') }}">
</div>
<div class="form-row">
    <input type="text" name="category" placeholder="Category" value="{{ old('category', $product->category ?? '') }}"
        required>
    <input type="text" name="short_description" placeholder="Short Description"
        value="{{ old('short_description', $product->short_description ?? '') }}">
</div>
<div class="form-row">
    <input type="file" name="image" accept="image/*">
    <input type="file" name="attachment" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip">
</div>
@if (isset($product) && $product->attachment)
    <p style="margin:0 0 10px 0;">
        Current attachment:
        <a href="{{ asset('storage/' . $product->attachment) }}" target="_blank" rel="noopener">View / Download</a>
    </p>
@endif
<textarea name="description" placeholder="Description">{{ old('description', $product->description ?? '') }}</textarea>
<textarea name="specifications_input" placeholder="One specification per line">{{ old('specifications_input', isset($product) ? implode("\n", $product->specifications ?? []) : '') }}</textarea>
<label><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $product->is_published ?? true))> Published</label>
<div style="margin-top:1rem;"><button class="btn btn-primary" type="submit">Save</button></div>
