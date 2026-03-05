@csrf
<div class="form-row">
  <label class="form-label">Project Title</label>
  <input type="text" name="title" placeholder="Project Title" value="{{ old('title', $project->title ?? '') }}" required>
  <label class="form-label">Slug</label>
  <input type="text" name="slug" placeholder="Slug (optional)" value="{{ old('slug', $project->slug ?? '') }}">
</div>
<div class="form-row">
  <label class="form-label">Category</label>
  <input type="text" name="category" placeholder="Category" value="{{ old('category', $project->category ?? '') }}" required>
  <label class="form-label">Client Name</label>
  <input type="text" name="client_name" placeholder="Client Name" value="{{ old('client_name', $project->client_name ?? '') }}">
</div>
<div class="form-row">
  <label class="form-label">Location</label>
  <input type="text" name="location" placeholder="Location" value="{{ old('location', $project->location ?? '') }}">
  <label class="form-label">Completed Date</label>
  <input type="date" name="completed_at" value="{{ old('completed_at', isset($project) && $project->completed_at ? $project->completed_at->format('Y-m-d') : '') }}">
</div>
<label class="form-label">Project Cover Image</label>
<input type="file" name="cover_image" accept="image/*">
<label class="form-label">Project Summary</label>
<input type="text" name="summary" placeholder="Summary" value="{{ old('summary', $project->summary ?? '') }}" required>
<label class="form-label">Full Description</label>
<textarea name="description" placeholder="Description">{{ old('description', $project->description ?? '') }}</textarea>
<label class="form-label">Project Gallery Links (one URL per line)</label>
<textarea name="gallery_links" placeholder="One image URL per line">{{ old('gallery_links', isset($project) ? implode("\n", $project->gallery ?? []) : '') }}</textarea>
<label><input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $project->is_featured ?? false))> Featured</label>
<label><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $project->is_published ?? true))> Published</label>
<div style="margin-top:1rem;"><button class="btn btn-primary" type="submit">Save</button></div>
