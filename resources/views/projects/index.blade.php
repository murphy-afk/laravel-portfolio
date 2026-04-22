@extends('layouts.projects')

@section('title', 'All Projects')

@section('content')
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
          </div>
        </div>
      </div>
    @endforeach
  </div>

@endsection