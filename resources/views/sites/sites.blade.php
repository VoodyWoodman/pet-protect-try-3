@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="card">

               <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-link" id="showSitesButton" onclick="window.location.href = '{{ route('sites.all') }}';">Список сайтов</button>
                        </div>
                        <div class="col-md-6 text-right">
                            Статистика
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
                        <div class="col-md-6">
                            <h3>Список сайтов:</h3>

                            @if ($sites && $sites->count() > 0)
                                <ul>
                                    @foreach ($sites->sortByDesc('created_at')->take(3) as $site)
                                        <li>{{ $site->url }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>У вас пока нет сайтов.</p>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <h3>Клики:</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Сегодня: Нет кликов</p>
                                </div>
                                <div class="col-md-6">
                                    <p>Вчера: Нет кликов</p>
                                </div>
                            </div>
                        </div>
                    </div>



                    @if (Auth::check())
                        <form action="{{ route('sites.store') }}" method="POST" class="mt-4 col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="url">URL сайта:</label>
                                <input type="text" name="url" id="url" class="form-control" required>
                                <span class="error-msg" style="color: red; display: none;">Недопустимые символы в URL - адресе</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить сайт</button>
                        </form>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger mt-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
