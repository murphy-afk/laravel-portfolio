@extends('layouts.projects')

@section('title', $project->name)

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 p-4" style="border-radius: 20px;">
                    <div class="card-body">
                        <h1 class="fw-bold mb-1">{{ $project->name }}</h1>
                        <p class="text-muted fs-5 mb-2">{{ $project->client ?? 'Personal Project' }}</p>
                        <span class="badge bg-primary px-3 py-2 mb-3">{{ $project->type->name }}</span>
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            @foreach ($project->technologies as $technology)
                                <span class="badge px-3 py-2"
                                    style="background-color: {{ $technology->color }}; color: #fff; border-radius: 8px;">{{ $technology->name }}</span>
                            @endforeach
                        </div>
                        <hr class="my-4">
                        <div class="fs-6 mb-4">
                            <p><strong>Start year:</strong> {{ $project->start_year }}</p>
                            <p><strong>End year:</strong> {{ $project->end_year ?? '—' }}</p>
                            <p>
                                <strong>Status:</strong>
                                @if($project->completed)
                                    <span class="badge bg-success px-3 py-2">Completed</span>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-2">In progress</span>
                                @endif
                            </p>
                        </div>
                        <p class="mt-3 text-secondary fs-6">{{ $project->description }}</p>
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('projects.index') }}" class="btn btn-outline-primary px-4">Back to all
                                projects</a>
                            <a href="{{ route('projects.edit', $project->id) }}"
                                class="btn btn-outline-warning px-4">Edit</a>
                            <button type="button" class="btn btn-outline-danger px-4" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $project->id }}">Delete</button>
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
                                <p>Are you sure you want to delete this project?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                    class="d-inline-block m-0 p-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection