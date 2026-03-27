@csrf
<div class="form-row">
  <input type="text" name="title" placeholder="Title" value="{{ old('title', $portfolio->title ?? '') }}" required>
  <input type="text" name="slug" placeholder="Slug" value="{{ old('slug', $portfolio->slug ?? '') }}">
</div>
<div class="form-row">
  <input type="text" name="service_type" placeholder="Service Type" value="{{ old('service_type', $portfolio->service_type ?? '') }}" required>
  <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $portfolio->sort_order ?? 0) }}">
</div>
<label class="form-label">Image</label>
@if(isset($portfolio) && $portfolio->image)
  <div style="margin-bottom:8px;">
    <img src="{{ asset($portfolio->image) }}" alt="Current image" style="max-width:200px;max-height:140px;object-fit:cover;border-radius:8px;border:1px solid #e5e7eb;">
  </div>
@endif
<input type="file" name="image" accept="image/*">
<textarea name="description" placeholder="Description">{{ old('description', $portfolio->description ?? '') }}</textarea>
<label><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $portfolio->is_published ?? true))> Published</label>
<div style="margin-top:1rem;"><button class="btn btn-primary" type="submit">Save</button></div>
