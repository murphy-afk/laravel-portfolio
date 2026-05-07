@extends('layouts.projects')

@section('title', 'Edit Project')

@section('content')

  <div class="container py-4">
    <h1 class="text-center mb-4">Edit Project</h1>

    <form action="{{ route('projects.update', $project->id) }}" method="POST" class="card shadow-sm p-4">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label fw-bold">Project Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}" required>
      </div>
      <div class="mb-3">
        <label for="client" class="form-label fw-bold">Client</label>
        <input type="text" name="client" id="client" class="form-control" value="{{ $project->client }}"
          placeholder="Optional">
      </div>
      <div class="mb-3">
        <label for="type_id" class="form-label fw-bold">Type</label>
        <select name="type_id" id="type_id" class="form-select" required>
          <option value="">Select a type</option>
          @foreach ($types as $type)
            <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
              {{ $type->name }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea name="description" id="description" rows="4" class="form-control"
          required>{{ $project->description }}</textarea>
      </div>
      <div class="mb-3">
        <label for="start_year" class="form-label fw-bold">Start Year</label>
        <input type="number" name="start_year" id="start_year" class="form-control" min="1900" max="2100" required
          value="{{ $project->start_year }}">
      </div>
      <div class="mb-3">
        <label for="end_year" class="form-label fw-bold">End Year</label>
        <input type="number" name="end_year" id="end_year" class="form-control" min="1900" max="2100"
          value="{{ $project->end_year }}">
      </div>
      <div class="mb-3">
        <label class="form-label fw-bold">Technologies</label>
        <div class="d-flex flex-wrap gap-3">
          @foreach ($technologies as $technology)
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="technologies[]" id="tech-{{ $technology->id }}"
                value="{{ $technology->id }}" {{$project->technologies->contains($technology->id) ? 'checked' : ''}}>
              <label class="form-check-label" for="tech-{{ $technology->id }}">
                {{ $technology->name }}
              </label>
            </div>
          @endforeach
        </div>
      </div>
      <div class="form-check mb-4">
        <input type="hidden" name="completed" value="0">
        <input type="checkbox" name="completed" id="completed" class="form-check-input" value="1" {{ $project->completed ? 'checked' : '' }}>
        <label for="completed" class="form-check-label fw-bold">Completed</label>
      </div>
      <button type="submit" class="btn btn-primary px-4">Save Changes</button>
    </form>
  </div>

@endsection