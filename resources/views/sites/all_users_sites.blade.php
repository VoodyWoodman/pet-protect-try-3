@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <p>Список всех сайтов:</p>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">URL сайта</th>
                                            <th scope="col">Дата добавления</th>
                                            <th scope="col">Действие</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sites as $site)
                                            <tr>
                                                <td><img src="{{ $site->avatar }}" alt="Avatar" width="50"></td>
                                                <td>{{ $site->url }}</td>
                                                <td>{{ $site->created_at }}</td>
                                                <td>
                                                    {{-- <form action="{{ route('upload.avatar', ['id' => $site->id]) }}" method="post" enctype="multipart/form-data"> --}}
                                                        @csrf
                                                        <input type="file" name="avatar" accept="image/*">
                                                        <button type="submit">Загрузить аватарку</button>
                                                    </form>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">У вас пока нет сайтов.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
