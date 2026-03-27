@csrf
<div class="form-row">
    <label class="form-label">Catalog Name</label>
    <input type="text" name="name" placeholder="Catalog Name" value="{{ old('name', $catalog->name ?? '') }}"
        required>
    <label class="form-label">Slug</label>
    <input type="text" name="slug" placeholder="Slug" value="{{ old('slug', $catalog->slug ?? '') }}">
</div>
<div class="form-row">
    <label class="form-label">Category</label>
    <input type="text" name="category" placeholder="Category" value="{{ old('category', $catalog->category ?? '') }}"
        required>
    <label class="form-label">Catalog Display Image</label>
    @if(isset($catalog) && $catalog->image)
      <div style="margin-bottom:8px;">
        <img src="{{ asset($catalog->image) }}" alt="Current image" style="max-width:200px;max-height:140px;object-fit:cover;border-radius:8px;border:1px solid #e5e7eb;">
      </div>
    @endif
    <input type="file" name="image" accept="image/*">
</div>
<div class="form-row">
    <label class="form-label">Catalog Attachment (Brochure/Spec Sheet)</label>
    <input type="file" name="attachment" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip">
</div>
<p style="margin:-4px 0 10px 0; color:#6b7280; font-size:12px;">Allowed: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, ZIP</p>
@if (isset($catalog) && $catalog->attachment)
    <p style="margin:0 0 10px 0;">
        Current attachment:
        <a href="{{ asset($catalog->attachment) }}" target="_blank" rel="noopener">View / Download</a>
    </p>
@endif
<label class="form-label">Description</label>
<textarea name="description" placeholder="Description">{{ old('description', $catalog->description ?? '') }}</textarea>
<label class="form-label">Specifications (one line per point)</label>
<textarea name="specifications_input" placeholder="One specification per line">{{ old('specifications_input', isset($catalog) ? implode("\n", $catalog->specifications ?? []) : '') }}</textarea>
<label><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $catalog->is_published ?? true))> Published</label>
<div style="margin-top:1rem;"><button class="btn btn-primary" type="submit">Save</button></div>
