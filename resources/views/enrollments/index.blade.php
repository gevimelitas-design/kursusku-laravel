@extends('layouts.app')

@section('content')
    <style>
        .rep-wrap { max-width: 900px; margin: 40px auto; }
        .rep-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; gap: 12px; flex-wrap: wrap; }
        .rep-head h1 { font-size: 28px; font-weight: 400; color: #1f2d2a; margin: 0; }
        .btn-add { background: #0d756b; color: #fff; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-size: 15px; }
        .btn-add:hover { background: #0a5f57; }
        .alert-ok { background: #e3f6ee; border: 1px solid #a8dcc5; color: #0a5f57; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; }
        .rep-card { background: #fff; border: 1px solid #d9dfdc; border-radius: 8px; overflow-x: auto; }
        .rep-card table { width: 100%; border-collapse: collapse; }
        .rep-card th { background: #0d756b; color: #fff; text-align: left; padding: 12px 16px; font-weight: 600; }
        .rep-card td { padding: 12px 16px; border-top: 1px solid #e6ebe9; color: #1f2d2a; }
        .rep-card tbody tr:hover { background: #f3f8f6; }
        .badge { display: inline-block; padding: 3px 10px; border-radius: 999px; background: #e3f6ee; color: #0a5f57; font-size: 13px; }
        .empty { text-align: center; color: #6b7a76; padding: 24px; }
    </style>

    <div class="rep-wrap">
        <div class="rep-head">
            <h1>Laporan Enrollment KursusKu</h1>
            <a class="btn-add" href="{{ route('enrollments.create') }}">+ Tambah Enrollment</a>
        </div>

        @if (session('success'))
            <div class="alert-ok">{{ session('success') }}</div>
        @endif

        <div class="rep-card">
            <table>
                <thead>
                    <tr>
                        <th>Participant</th>
                        <th>Course</th>
                        <th>Start Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->participant->name }}</td>
                            <td>{{ $enrollment->course->name }}</td>
                            <td>{{ $enrollment->course->start_date?->format('d/m/Y') }}</td>
                            <td><span class="badge">{{ $enrollment->status }}</span></td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="empty">Belum ada enrollment.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection