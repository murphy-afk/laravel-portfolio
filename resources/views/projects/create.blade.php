@extends('layouts.projects')

@section('title', 'create')

@section('content')
  <div class="container py-4">
    <h1 class="text-center mb-4">Create a New Project</h1>
    <form action="{{ route('projects.store') }}" method="POST" class="card shadow-sm p-4">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label fw-bold">Project Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="client" class="form-label fw-bold">Client</label>
        <input type="text" name="client" id="client" class="form-control" placeholder="Optional">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea name="description" id="description" rows="4" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label for="start_year" class="form-label fw-bold">Start Year</label>
        <input type="number" name="start_year" id="start_year" class="form-control" min="1900" max="2100" required>
      </div>
      <div class="mb-3">
        <label for="end_year" class="form-label fw-bold">End Year</label>
        <input type="number" name="end_year" id="end_year" class="form-control" min="1900" max="2100">
      </div>
      <div class="form-check mb-4">
        <input type="checkbox" name="completed" id="completed" class="form-check-input">
        <label for="completed" class="form-check-label fw-bold">Completed</label>
      </div>
      <button type="submit" class="btn btn-primary px-4">Save</button>
    </form>
  </div>

@endsection