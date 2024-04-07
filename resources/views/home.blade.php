@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <form action="{{ route('upload.avatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="avatar">Choose Avatar:</label>
                            <input type="file" class="form-control-file @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Загрузить</button>
                    </form>

                    {{-- @if (Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Админка</a>
                    @endif --}}

                    @if (Auth::check())
                         @if (@auth ()->user()->avatar_path)
                         <img src="{{ Storage::disk('public')->url('avatars/' . Auth::user()->avatar_path) }}" alt="User Avatar">
                         @endif
                         {{-- <a href="{{ route('sites.index') }}" class="btn btn-primary">Список сайтов</a> --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
