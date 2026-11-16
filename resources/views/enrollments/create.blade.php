@extends('layouts.app')

@section('content')
    <style>
        .enroll-wrap { max-width: 713px; margin: 40px auto; }
        .enroll-wrap h1 { font-size: 28px; font-weight: 400; color: #1f2d2a; margin-bottom: 16px; }
        .enroll-card { background: #fff; border: 1px solid #d9dfdc; border-radius: 8px; padding: 16px; }
        .enroll-card label { display: block; font-weight: 700; color: #1f2d2a; margin-bottom: 8px; }
        .enroll-card select {
            width: 100%; padding: 10px 12px; margin-bottom: 16px;
            border: 1px solid #ced4da; border-radius: 8px;
            background: #fff; font-size: 16px; color: #333;
        }
        .enroll-card select:focus { outline: none; border-color: #86b7fe; box-shadow: 0 0 0 3px rgba(13,110,253,.2); }
        .enroll-card .error { color: #c0392b; font-size: 14px; margin: -8px 0 16px; }
        .enroll-card button {
            width: 100%; padding: 14px; border: 0; border-radius: 8px;
            background: #0d756b; color: #fff; font-size: 16px; cursor: pointer;
        }
        .enroll-card button:hover { background: #0a5f57; }
    </style>

    <div class="enroll-wrap">
        <h1>Tambah Enrollment (Admin)</h1>

        <div class="enroll-card">
            <form method="POST" action="{{ route('enrollments.store') }}">
                @csrf

                <label for="participant_id">Participant</label>
                <select name="participant_id" id="participant_id" required>
                    <option value="">-- Pilih Participant --</option>
                    @foreach ($participants as $participant)
                        <option value="{{ $participant->id }}"
                            @selected(old('participant_id') == $participant->id)>
                            {{ $participant->name }} - {{ $participant->email }}
                        </option>
                    @endforeach
                </select>
                @error('participant_id')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="course_id">Course</label>
                <select name="course_id" id="course_id" required>
                    <option value="">-- Pilih Course --</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}"
                            @selected(old('course_id') == $course->id)>
                            {{ $course->code }} - {{ $course->name }}
                        </option>
                    @endforeach
                </select>
                @error('course_id')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit">Simpan Enrollment</button>
            </form>
        </div>
    </div>
@endsection