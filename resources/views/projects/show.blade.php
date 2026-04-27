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
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('projects.index') }}" class="btn btn-outline-primary px-4">
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
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                            class="d-inline-block m-0 p-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Confirm Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
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