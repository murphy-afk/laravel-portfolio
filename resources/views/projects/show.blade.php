@extends('layouts.projects')

@section('title', $project->name)

@section('content')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card border-0 shadow-lg p-4" style="border-radius: 20px;">
                    <div class="card-body">
                        <h1 class="fw-bold mb-2">{{ $project->name }}</h1>
                        <p class="text-muted fs-5">{{ $project->client ?? 'Personal Project' }}</p>
                        <hr class="my-4">
                        <div class="fs-6">
                            <p>Start year: {{ $project->start_year }}</p>
                            <p>End year: {{ $project->end_year ?? '—' }}</p>
                            <p>
                                <strong>Status:</strong>
                                @if($project->completed)
                                    <span class="badge bg-success px-3 py-2">Completed</span>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-2">In progress</span>
                                @endif
                            </p>
                        </div>
                        <p class="mt-4 text-secondary fs-6">{{ $project->description }}</p>
                        <a href="{{ route('projects.index') }}" class="btn btn-outline-primary mt-4 px-4">
                            Back to all projects
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection