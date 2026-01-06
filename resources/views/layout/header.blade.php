<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  
  <link rel="stylesheet" href="{{ asset('myasset/style.css') }}" type="text/css">
</head>
<body>

  <!-- Header -->
  <header class="navbar navbar-dark fixed-top shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> My Dashboard</a>
      <div class="d-flex align-items-center">
        <span class="me-3">Hello, {{session('sess_name')}}</span>
        <a href="{{ route('auth.logout') }}" class="btn btn-outline-light btn-sm">Logout</a>
      </div>
    </div>
  </header>
