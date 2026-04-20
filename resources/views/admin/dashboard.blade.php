<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="container py-5">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h1 class="mb-4">Admin Dashboard</h1>
        <div class="mb-3">
          <h5 class="text-muted">Admin Name</h5>
          <p class="fs-5">{{ $user->name }}</p>
        </div>
        <div class="mb-3">
          <h5 class="text-muted">Email</h5>
          <p class="fs-5">{{ $user->email }}</p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>