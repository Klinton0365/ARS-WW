@csrf
<div class="form-row">
  <label class="form-label">Service Name</label>
  <input type="text" name="name" placeholder="Service Name" value="{{ old('name', $service->name ?? '') }}" required>
  <label class="form-label">Slug</label>
  <input type="text" name="slug" placeholder="Slug (optional)" value="{{ old('slug', $service->slug ?? '') }}">
</div>
<div class="form-row">
  <label class="form-label">Tagline</label>
  <input type="text" name="tagline" placeholder="Tagline" value="{{ old('tagline', $service->tagline ?? '') }}">
  <label class="form-label">Sort Order</label>
  <input type="number" name="sort_order" min="0" placeholder="Sort Order" value="{{ old('sort_order', $service->sort_order ?? 0) }}">
</div>
<label class="form-label">Service Description</label>
<textarea name="description" placeholder="Description" required>{{ old('description', $service->description ?? '') }}</textarea>
<label><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->is_active ?? true))> Active</label>
<div style="margin-top:1rem;"><button class="btn btn-primary" type="submit">Save</button></div>
