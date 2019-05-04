@extends('../../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" align="center">
            <div class="card">
                <div class="card-header">Управление заданиями</div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Админка</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Список заданий</li>
                  </ol>
                </nav>
                <a class="btn btn-outline-primary" href="{{ route('tasks.create') }}" role="button">Создать новое</a>
                <h2 class="mx-auto">Список заданий</h2>
                @foreach($tasks as $task)

                  <div class="card bg-light mb-3">
                    <div class="card-header"># {{ $task->id }}</div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $task->title }}</h5>
                      <p class="card-text">{{ $task-> description }}</p>
                    </div>
                    <a class="btn btn-outline-secondary col-md-3" href="{{ route('tasks.edit', $task->id) }}" role="button">Редактировать</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-danger">Удалить</button>
                    </form>
                  </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
