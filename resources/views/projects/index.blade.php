@extends('layouts.projects')

@section('title', 'All projects')

@section('content')
  <div class="container py-3">
    <div class="d-flex justify-content-between align-items-center py-3">
      <h1 class="m-0">All projects</h1>
      <a href="{{ route('projects.create') }}" class="btn btn-outline-primary px-4">
        Add new project
      </a>
    </div>
    <div class="row">
      @foreach ($projects as $project)
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title fw-bold">{{ $project->name }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">
                {{ $project->client ?? 'Personal project' }}
              </h6>
              <p class="mt-3 mb-1">Start: {{ $project->start_year }}</p>
              <p class="mb-1">End: {{ $project->end_year ?? '—' }}</p>
              <p class="mb-1">Status:
                @if($project->completed)
                  <span class="badge bg-success">Completed</span>
                @else
                  <span class="badge bg-warning text-dark">In progress</span>
                @endif
              </p>
              <p class="mt-3 text-secondary">{{ $project->description }}</p>
              <div class="d-flex gap-2 mt-4">
                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-primary px-4">
                  Back to all projects
                </a>
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-warning px-4">
                  Edit
                </a>
                <button type="button" class="btn btn-outline-danger px-4" data-bs-toggle="modal"
                  data-bs-target="#deleteModal-{{ $project->id }}">
                  Delete
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="deleteModal-{{ $project->id }}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete the project?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Cancel
                </button>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline-block m-0 p-0">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">
                    Confirm Delete
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection