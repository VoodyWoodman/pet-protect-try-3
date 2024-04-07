@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить новый сайт</div>

                <div class="card-body">
                    <form action="{{ route('sites.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="url">URL сайта:</label>
                            <input type="text" name="url" id="url" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
