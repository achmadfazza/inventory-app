@extends('layouts.auth.master', ['title' => 'Register - E-Proc'])

@section('content')
    <form class="card card-md border-0 rounded-3" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="card-body">
            <h3 class="text-center mb-3 font-weight-medium">
                Register
            </h3>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="masukan nama anda"
                    name="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="masukan email anda" name="email">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <x-select title="Jenis Usaha" name="company">
                    <option value="" selected>--silahkan pilih jenis usaha--</option>
                    <option value="Person">Perseorangan</option>
                    <option value="PT">Perseroan Terbatas (PT)</option>
                </x-select>
            </div>
            <div class="mb-3" data-parent="PT">
                <label class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control @error('company') is-invalid @enderror"
                    placeholder="masukan nama perusahaan" name="company">
                @error('company')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Npwp</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="masukan nomor npwp" name="email">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Kata Sandi</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="masukan kata sandi anda" name="password" id="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="masukan konfirmasi kata sandi anda" name="password_confirmation">
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="flex gap-4">
                @guest
                    <p>Sudah punya akun ? <a href="{{ route('login') }}">Login</a></p>
                @endguest
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
        </div>
    </form>
@endsection
