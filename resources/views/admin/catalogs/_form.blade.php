@csrf
<div class="form-row">
  <input type="text" name="name" placeholder="Catalog Name" value="{{ old('name', $catalog->name ?? '') }}" required>
  <input type="text" name="slug" placeholder="Slug" value="{{ old('slug', $catalog->slug ?? '') }}">
</div>
<div class="form-row">
  <input type="text" name="category" placeholder="Category" value="{{ old('category', $catalog->category ?? '') }}" required>
  <input type="file" name="image" accept="image/*">
</div>
<textarea name="description" placeholder="Description">{{ old('description', $catalog->description ?? '') }}</textarea>
<textarea name="specifications_input" placeholder="One specification per line">{{ old('specifications_input', isset($catalog) ? implode("\n", $catalog->specifications ?? []) : '') }}</textarea>
<label><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $catalog->is_published ?? true))> Published</label>
<div style="margin-top:1rem;"><button class="btn btn-primary" type="submit">Save</button></div>
