<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Library System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://fonts.googleapis.com/css2?family=UnifrakturCook:wght@700&family=EB+Garamond:wght@400;700&display=swap" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'EB Garamond', serif;
      background: radial-gradient(ellipse at top left, #f3e9d2 0%, #c9b99a 100%);
      color: #3e2c1c;
      min-height: 100vh;
      background-attachment: fixed;
      background-image: rgba(53, 45, 45, 0.85);;
    }

    .sidebar {
      background: rgba(205, 179, 128, 0.85);
      backdrop-filter: blur(6px) brightness(1.08);
      -webkit-backdrop-filter: blur(6px) brightness(1.08);
      border-right: 3px double #8b6f3f;
      border-radius: 18px;
      margin: 18px;
      height: calc(100vh - 36px);
      box-shadow: 0 8px 32px 0 rgba(80, 60, 20, 0.18);
      transition: background 0.3s;
      font-family: 'EB Garamond', serif;
    }

    .sidebar a {
      font-family: 'UnifrakturCook', cursive;
      font-size: 1.15rem;
      font-weight: 700;
      border-radius: 12px;
      padding: 10px 18px;
      transition: all 0.2s;
      color: #4e3a1e !important;
      background: rgba(255,255,255,0.10);
      margin-bottom: 8px;
      border: 2px solid transparent;
      letter-spacing: 1px;
      text-shadow: 0 1px 0 #fffbe9;
      box-shadow: 0 1px 4px rgba(139,111,63,0.08);
    }

    .sidebar a:hover {
      background: rgba(255,245,200,0.25);
      color: #a67c2c !important;
      border: 2px solid #a67c2c;
      box-shadow: 0 2px 8px rgba(139,111,63,0.18);
    }

    .sidebar .active {
      background: linear-gradient(90deg, #e9d8a6 0%, #bfa76a 100%) !important;
      color: #fff !important;
      border: 2.5px solid #a67c2c !important;
      box-shadow: 0 4px 16px rgba(139,111,63,0.18);
      text-shadow: 0 2px 8px #a67c2c44;
    }

    .main-content {
      padding: 36px;
      overflow-x: auto;
      color: #3e2c1c;
      font-family: 'EB Garamond', serif;
    }

    .card-ios, .card, .form-card {
      border-radius: 16px !important;
      border: 2px solid #bfa76a !important;
      background: rgba(255, 248, 220, 0.85) !important;
      box-shadow: 0 8px 32px 0 rgba(80, 60, 20, 0.13) !important;
      padding: 24px !important;
      margin-bottom: 28px;
      transition: background 0.3s;
      color: #3e2c1c !important;
      font-family: 'EB Garamond', serif;
    }

    .table {
      background: rgba(255,248,220,0.85) !important;
      border-radius: 10px !important;
      overflow: hidden;
      box-shadow: 0 2px 12px rgba(139,111,63,0.10);
      border: 2px solid #bfa76a;
      color: #3e2c1c !important;
      font-size: 1.03rem;
      font-family: 'EB Garamond', serif;
    }

    .table thead {
      background: linear-gradient(90deg, #bfa76a 0%, #e9d8a6 100%) !important;
      color: #4e3a1e !important;
      border-radius: 10px 10px 0 0;
      letter-spacing: 1px;
      text-transform: uppercase;
      font-weight: 700;
      font-size: 1.05rem;
      font-family: 'UnifrakturCook', cursive;
      text-shadow: 0 1px 0 #fffbe9;
    }

    .table th, .table td {
      padding: 12px 14px;
      vertical-align: middle;
      background: rgba(255,255,255,0.10) !important;
      border: none !important;
      color: #3e2c1c !important;
      font-size: 1.03rem;
      font-family: 'EB Garamond', serif;
      font-weight: 500;
      max-width: 260px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .table-striped > tbody > tr:nth-of-type(odd) {
      background-color: rgba(233,216,166,0.13) !important;
    }

    .table-hover > tbody > tr:hover {
      background-color: rgba(205,179,128,0.18) !important;
    }

    .btn, .btn-primary, .btn-success, .btn-warning, .btn-danger, .btn-secondary, .btn-outline-secondary {
      border-radius: 8px !important;
      font-family: 'EB Garamond', serif;
      font-weight: 600;
      box-shadow: 0 2px 8px rgba(139,111,63,0.08);
      border: 2px solid #bfa76a;
      padding: 6px 18px;
      transition: background 0.2s, color 0.2s, box-shadow 0.2s;
      background: rgba(255,248,220,0.85);
      color: #4e3a1e !important;
      letter-spacing: 0.5px;
      font-size: 1.01rem;
      line-height: 1.2;
      min-width: 70px;
      min-height: 36px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .btn-sm {
      padding: 3px 10px !important;
      font-size: 0.97rem !important;
      min-width: 56px;
      min-height: 30px;
    }

    .btn-primary {
      background: linear-gradient(90deg, #bfa76a 0%, #e9d8a6 100%) !important;
      color: #fff !important;
      border: 2px solid #a67c2c !important;
      box-shadow: 0 4px 18px rgba(139,111,63,0.18);
      font-family: 'UnifrakturCook', cursive;
      text-shadow: 0 1px 0 #fffbe9;
    }
    .btn-primary:hover {
      background: linear-gradient(90deg, #e9d8a6 0%, #bfa76a 100%) !important;
      color: #fff !important;
      box-shadow: 0 8px 32px rgba(139,111,63,0.22);
    }

    .btn-success {
      background: linear-gradient(90deg, #7c9a5c 0%, #bfa76a 100%) !important;
      color: #fff !important;
      border: 2px solid #7c9a5c !important;
    }
    .btn-success:hover {
      background: linear-gradient(90deg, #bfa76a 0%, #7c9a5c 100%) !important;
      color: #fff !important;
      box-shadow: 0 8px 32px rgba(124,154,92,0.18);
    }

    .btn-warning {
      background: linear-gradient(90deg, #e9d8a6 0%, #bfa76a 100%) !important;
      color: #4e3a1e !important;
      border: 2px solid #bfa76a !important;
    }
    .btn-warning:hover {
      background: linear-gradient(90deg, #bfa76a 0%, #e9d8a6 100%) !important;
      color: #4e3a1e !important;
      box-shadow: 0 8px 32px rgba(233,216,166,0.18);
    }

    .btn-danger {
      background: linear-gradient(90deg, #a67c2c 0%, #bfa76a 100%) !important;
      color: #fff !important;
      border: 2px solid #a67c2c !important;
    }
    .btn-danger:hover {
      background: linear-gradient(90deg, #bfa76a 0%, #a67c2c 100%) !important;
      color: #fff !important;
      box-shadow: 0 8px 32px rgba(166,124,44,0.18);
    }

    .btn-secondary, .btn-outline-secondary {
      background: rgba(233,216,166,0.18) !important;
      color: #4e3a1e !important;
      border: 2px solid #bfa76a !important;
      box-shadow: 0 4px 18px rgba(139,111,63,0.13);
    }
    .btn-secondary:hover, .btn-outline-secondary:hover {
      background: rgba(205,179,128,0.18) !important;
      color: #4e3a1e !important;
      box-shadow: 0 8px 32px rgba(139,111,63,0.18);
    }

    .form-control, .form-select {
      border-radius: 8px !important;
      border: 2px solid #bfa76a !important;
      padding: 10px 14px !important;
      font-size: 1.01rem;
      color: #3e2c1c !important;
      background: rgba(255,248,220,0.85) !important;
      transition: border-color 0.2s, background 0.2s;
      box-shadow: 0 2px 8px rgba(139,111,63,0.06);
      font-family: 'EB Garamond', serif;
    }

    .form-control:focus, .form-select:focus {
      border-color: #a67c2c !important;
      outline: none !important;
      background: #fffbe9 !important;
      color: #3e2c1c !important;
    }

    .badge {
      border-radius: 6px !important;
      padding: 7px 14px !important;
      font-size: 1.01rem !important;
      background: linear-gradient(90deg, #e9d8a6 0%, #bfa76a 100%) !important;
      color: #4e3a1e !important;
      box-shadow: 0 1px 4px rgba(139,111,63,0.08);
      margin-right: 4px;
      margin-bottom: 2px;
      letter-spacing: 0.5px;
      font-family: 'EB Garamond', serif;
      font-weight: 600;
      text-shadow: 0 1px 0 #fffbe9;
    }

    .alert-success {
      background: rgba(205,179,128,0.18) !important;
      color: #4e3a1e !important;
      border-radius: 10px !important;
      padding: 12px 20px !important;
      margin-bottom: 18px !important;
      border: 2px solid #bfa76a !important;
      box-shadow: 0 4px 18px rgba(139,111,63,0.13);
      font-weight: 600;
      letter-spacing: 0.5px;
      font-family: 'EB Garamond', serif;
    }

    a, .nav-link, .navbar-brand {
      color: #4e3a1e !important;
      transition: color 0.2s;
      font-family: 'UnifrakturCook', cursive;
    }
    a:hover, .nav-link:hover, .navbar-brand:hover {
      color: #a67c2c !important;
    }

    .text-muted, .text-secondary, .form-label, label, .fw-semibold, .fw-bold, .fw-medium, .fw-500, .fw-600, .fw-700 {
      color: #7c6b4a !important;
    }

    h1, h2, h3, h4, h5, h6, .fw-bold, .fw-semibold {
      color: #4e3a1e !important;
      font-family: 'UnifrakturCook', cursive;
      letter-spacing: 1px;
      text-shadow: 0 1px 0 #fffbe9;
    }

    @media (max-width: 900px) {
      .sidebar {
        width: 100% !important;
        margin: 0 0 16px 0;
        border-radius: 14px;
        height: auto;
      }
      .main-content {
        padding: 12px;
      }
      .card-ios, .card, .form-card {
        padding: 10px !important;
      }
      .table th, .table td {
        max-width: 120px;
        font-size: 0.97rem;
      }
    }
  </style>
</head>
<body class="d-flex">

  <div class="d-flex flex-column flex-shrink-0 p-3 sidebar" style="width: 240px;">
    <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none fs-5 fw-semibold">
      <span class="fs-4">📚</span>&nbsp; Library
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ route('sections.index') }}" 
           class="nav-link {{ request()->is('sections*') ? 'active' : '' }}">
          <i class="bi bi-diagram-3"></i> Sections
        </a>
      </li>
      <li>
        <a href="{{ route('books.index') }}" 
           class="nav-link {{ request()->is('books*') ? 'active' : '' }}">
          <i class="bi bi-book"></i> Books
        </a>
      </li>
      <li>
        <a href="{{ route('authors.index') }}" 
           class="nav-link {{ request()->is('authors*') ? 'active' : '' }}">
          <i class="bi bi-person"></i> Authors
        </a>
      </li>
      <li>
        <a href="{{ route('borrowers.index') }}" 
           class="nav-link {{ request()->is('borrowers*') ? 'active' : '' }}">
          <i class="bi bi-people"></i> Borrowers
        </a>
      </li>
    </ul>
  </div>

  <div class="flex-grow-1 main-content">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="card-ios">
      @yield('content')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
