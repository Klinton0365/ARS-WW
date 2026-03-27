@csrf
<div class="form-row">
    <label class="form-label">Product Name</label>
    <input type="text" name="name" placeholder="Product Name" value="{{ old('name', $product->name ?? '') }}"
        required>
    <label class="form-label">Slug</label>
    <input type="text" name="slug" placeholder="Slug" value="{{ old('slug', $product->slug ?? '') }}">
</div>
<div class="form-row">
    <label class="form-label">Category</label>
    <input type="text" name="category" placeholder="Category" value="{{ old('category', $product->category ?? '') }}"
        required>
    <label class="form-label">Short Description</label>
    <input type="text" name="short_description" placeholder="Short Description"
        value="{{ old('short_description', $product->short_description ?? '') }}">
</div>
<div class="form-row">
    <label class="form-label">Product Display Image</label>
    <input type="file" name="image" accept="image/*">
    <label class="form-label">Product Attachment (Brochure/Spec Sheet)</label>
    <input type="file" name="attachment" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip">
</div>
<p style="margin:-4px 0 10px 0; color:#6b7280; font-size:12px;">Allowed: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, ZIP</p>
@if (isset($product) && $product->attachment)
    <p style="margin:0 0 10px 0;">
        Current attachment:
        <a href="{{ asset($product->attachment) }}" target="_blank" rel="noopener">View / Download</a>
    </p>
@endif
<label class="form-label">Full Description</label>
<textarea name="description" placeholder="Description">{{ old('description', $product->description ?? '') }}</textarea>
<label class="form-label">Specifications (one line per point)</label>
<textarea name="specifications_input" placeholder="One specification per line">{{ old('specifications_input', isset($product) ? implode("\n", $product->specifications ?? []) : '') }}</textarea>
<label><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $product->is_published ?? true))> Published</label>
<div style="margin-top:1rem;"><button class="btn btn-primary" type="submit">Save</button></div>
