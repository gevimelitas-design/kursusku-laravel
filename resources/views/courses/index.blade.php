@extends('layouts.app')

@section('content')
    <style>
        .rep-wrap { max-width: 900px; margin: 40px auto; }
        .rep-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; gap: 12px; flex-wrap: wrap; }
        .rep-head h1 { font-size: 28px; font-weight: 400; color: #1f2d2a; margin: 0; }
        .btn-add { background: #0d756b; color: #fff; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-size: 15px; border: 0; cursor: pointer; }
        .btn-add:hover { background: #0a5f57; }
        .btn-reset { background: #fff; color: #1f2d2a; border: 1px solid #d9dfdc; padding: 9px 14px; border-radius: 8px; text-decoration: none; font-size: 14px; display: inline-flex; align-items: center; }
        .filter-bar { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 16px; }
        .filter-input, .filter-select { padding: 9px 12px; border: 1px solid #cfd8d4; border-radius: 8px; background: #fff; color: #1f2d2a; font-size: 14px; }
        .filter-input { flex: 1; min-width: 220px; }
        .alert-ok { background: #e3f6ee; border: 1px solid #a8dcc5; color: #0a5f57; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; }
        .rep-card { background: #fff; border: 1px solid #d9dfdc; border-radius: 8px; overflow-x: auto; }
        .rep-card table { width: 100%; border-collapse: collapse; }
        .rep-card th { background: #0d756b; color: #fff; text-align: left; padding: 12px 16px; font-weight: 600; }
        .rep-card td { padding: 12px 16px; border-top: 1px solid #e6ebe9; color: #1f2d2a; }
        .rep-card tbody tr:hover { background: #f3f8f6; }
        .badge { display: inline-block; padding: 3px 10px; border-radius: 999px; background: #e3f6ee; color: #0a5f57; font-size: 13px; }
        .empty { text-align: center; color: #6b7a76; padding: 24px; }
        .page-wrap { margin-top: 16px; }
    </style>

    <div class="rep-wrap">
        <div class="rep-head">
            <h1>Daftar Course KursusKu</h1>
            @if (\Illuminate\Support\Facades\Route::has('courses.create'))
                <a class="btn-add" href="{{ route('courses.create') }}">+ Tambah Course</a>
            @endif
        </div>

        @if (session('success'))
            <div class="alert-ok">{{ session('success') }}</div>
        @endif

        {{-- Form GET Search + Filter Status --}}
        <form method="GET" action="{{ route('courses.index') }}" class="filter-bar">
            <input
                type="search"
                name="q"
                value="{{ $search ?? '' }}"
                class="filter-input"
                placeholder="Cari kode atau nama kursus..."
            >
            <select name="status" class="filter-select">
                <option value="">Semua status</option>
                <option value="open" @selected(($status ?? '') === 'open')>Open</option>
                <option value="closed" @selected(($status ?? '') === 'closed')>Closed</option>
                <option value="draft" @selected(($status ?? '') === 'draft')>Draft</option>
            </select>
            <button type="submit" class="btn-add">Cari</button>
            <a href="{{ route('courses.index') }}" class="btn-reset">Reset</a>
        </form>

        <div class="rep-card">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Course</th>
                        <th>Start Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>{{ $course->code }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->start_date ? \Illuminate\Support\Carbon::parse($course->start_date)->format('d/m/Y') : '-' }}</td>
                            <td><span class="badge">{{ $course->status }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty">Tidak ada kursus yang sesuai pencarian/filter.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="page-wrap">
            {{ $courses->links() }}
        </div>
    </div>
@endsection