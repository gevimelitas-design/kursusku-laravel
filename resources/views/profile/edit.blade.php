@extends('layouts.app')

@section('content')
<div>
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <small class="text-uppercase text-muted fw-bold">My Profile</small>
            <h2 class="fw-bold">Profil Saya</h2>
            <p class="text-muted">Perbarui identitas, kontak, email login, dan password Anda.</p>
        </div>
        <a href="{{ url('/') }}" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        {{-- Identitas & Kontak --}}
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-1">Identitas & Kontak</h5>
                    <p class="text-muted small">Role tidak dapat diubah dari halaman profil pribadi.</p>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Login *</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                       class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Setelah disimpan, email baru digunakan pada login berikutnya.</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                       class="form-control" placeholder="Contoh: 081234567890">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Jabatan</label>
                                <input type="text" name="position" value="{{ old('position', $user->position) }}" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Instansi / Unit</label>
                                <input type="text" name="institution" value="{{ old('institution', $user->institution) }}" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat</label>
                                <textarea name="address" rows="3" class="form-control">{{ old('address', $user->address) }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Kolom kanan --}}
        <div class="col-lg-5">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <small class="text-uppercase text-muted fw-bold">Account Access</small>
                    <h5 class="fw-bold mb-3">Informasi akses</h5>
                    <dl class="row mb-0">
                        <dt class="col-5">Role</dt>
                        <dd class="col-7"><span class="badge text-bg-success">{{ ucfirst($user->role) }}</span></dd>
                        <dt class="col-5">Status</dt>
                        <dd class="col-7">
                            <span class="badge {{ $user->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                                {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </dd>
                        <dt class="col-5">Login terakhir</dt>
                        <dd class="col-7">{{ $user->last_login_at?->format('d/m/Y H:i') ?? '-' }}</dd>
                    </dl>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <small class="text-uppercase text-muted fw-bold">Security</small>
                    <h5 class="fw-bold">Ganti Password</h5>
                    <p class="text-muted small">Password baru minimal 8 karakter serta mengandung huruf besar-kecil, angka, dan simbol.</p>

                    <form method="POST" action="{{ route('profile.password') }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Password Saat Ini</label>
                            <input type="password" name="current_password"
                                   class="form-control @error('current_password') is-invalid @enderror" required>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection