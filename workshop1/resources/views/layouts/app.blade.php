<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Training Institute')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary:      #6366f1;
            --primary-dark: #4f46e5;
            --primary-light:#e0e7ff;
            --success:      #22c55e;
            --danger:       #ef4444;
            --danger-light: #fee2e2;
            --warning:      #f59e0b;
            --bg:           #f8fafc;
            --card:         #ffffff;
            --border:       #e2e8f0;
            --text:         #1e293b;
            --muted:        #64748b;
            --radius:       10px;
            --shadow:       0 2px 12px rgba(0,0,0,.08);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        /* ── Navbar ── */
        nav {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            height: 60px;
            box-shadow: 0 2px 8px rgba(99,102,241,.3);
        }
        nav .brand {
            font-weight: 700;
            font-size: 1.1rem;
            color: #fff;
            text-decoration: none;
            margin-right: auto;
            letter-spacing: .5px;
        }
        nav a {
            color: rgba(255,255,255,.85);
            text-decoration: none;
            padding: 0.45rem 1rem;
            border-radius: 6px;
            font-size: .9rem;
            font-weight: 500;
            transition: background .2s, color .2s;
        }
        nav a:hover {
            background: rgba(255,255,255,.18);
            color: #fff;
        }

        /* ── Page wrapper ── */
        .page-wrapper {
            max-width: 1100px;
            margin: 2.5rem auto;
            padding: 0 1.5rem;
        }

        /* ── Card ── */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 2rem;
        }

        /* ── Flash message ── */
        .flash-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            border-radius: var(--radius);
            padding: .85rem 1.25rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: .5rem;
        }
        .flash-success::before { content: '✓'; font-weight: 700; }

        /* ── Headings ── */
        h1 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 1.25rem;
        }

        /* ── Buttons ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .5rem 1.15rem;
            border-radius: 6px;
            font-size: .875rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: opacity .15s, transform .1s;
        }
        .btn:hover { opacity: .88; transform: translateY(-1px); }
        .btn:active { transform: translateY(0); }

        .btn-primary   { background: var(--primary);  color: #fff; }
        .btn-secondary { background: var(--border);    color: var(--text); }
        .btn-info      { background: #0ea5e9;          color: #fff; }
        .btn-warning   { background: var(--warning);   color: #fff; }
        .btn-danger    { background: var(--danger);    color: #fff; }

        /* ── Table ── */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: .9rem;
            margin-top: 1rem;
        }
        thead tr {
            background: var(--primary);
            color: #fff;
        }
        thead th {
            padding: .75rem 1rem;
            text-align: left;
            font-weight: 600;
            font-size: .82rem;
            letter-spacing: .5px;
            text-transform: uppercase;
        }
        tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background .15s;
        }
        tbody tr:hover { background: #f1f5f9; }
        tbody td {
            padding: .75rem 1rem;
            vertical-align: middle;
        }
        .badge {
            display: inline-block;
            padding: .2rem .6rem;
            border-radius: 999px;
            font-size: .75rem;
            font-weight: 600;
        }
        .badge-yes { background: #dcfce7; color: #166534; }
        .badge-no  { background: #fee2e2; color: #991b1b; }

        /* ── Forms ── */
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-group label {
            display: block;
            font-size: .875rem;
            font-weight: 600;
            color: var(--muted);
            margin-bottom: .4rem;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: .6rem .9rem;
            border: 1.5px solid var(--border);
            border-radius: 7px;
            font-family: inherit;
            font-size: .9rem;
            color: var(--text);
            background: #fff;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
        }
        .form-group textarea { min-height: 90px; resize: vertical; }
        .form-check { display: flex; align-items: center; gap: .5rem; }
        .form-check input[type="checkbox"] {
            width: 18px; height: 18px; cursor: pointer;
            accent-color: var(--primary);
        }

        /* ── Error box ── */
        .error-box {
            background: var(--danger-light);
            border: 1px solid #fca5a5;
            border-radius: var(--radius);
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
        }
        .error-box h3 {
            color: #991b1b;
            font-size: .9rem;
            font-weight: 700;
            margin-bottom: .5rem;
        }
        .error-box ul { padding-left: 1.25rem; }
        .error-box ul li { color: #b91c1c; font-size: .875rem; line-height: 1.7; }

        /* ── Action buttons in table ── */
        .actions { display: flex; gap: .4rem; align-items: center; flex-wrap: wrap; }
        .actions form { margin: 0; }

        /* ── Back link ── */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            color: var(--primary);
            font-size: .875rem;
            font-weight: 500;
            text-decoration: none;
            margin-top: 1.25rem;
        }
        .back-link:hover { text-decoration: underline; }

        /* ── Detail list ── */
        .detail-list { list-style: none; }
        .detail-list li {
            display: grid;
            grid-template-columns: 160px 1fr;
            padding: .65rem 0;
            border-bottom: 1px solid var(--border);
            font-size: .9rem;
        }
        .detail-list li:last-child { border-bottom: none; }
        .detail-list .key { font-weight: 600; color: var(--muted); }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('students.index') }}" class="brand">🎓 Training Institute</a>
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('courses.index') }}">Courses</a>
    </nav>

    <div class="page-wrapper">
        @if(session('success'))
            <div class="flash-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
