@extends('../../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" align="center">
            <div class="card">
                <div class="card-header">Редактировать задание</div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Админка</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Список заданий</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Редактировать задание</li>
                  </ol>
                </nav>
                <h2 class="mx-auto">Редактировать</h2>
                <form method="post" action="{{route('tasks.update', $task->id) }}">
                  {{ csrf_field() }}

                  {{ method_field('PATCH') }}
                  <div class="form-row justify-content-center">
                    <div class="form-group col-md-10">
                      <label for="title">Заголовок</label>
                      <input type="input" class="form-control" placeholder="Заголовок" name="title" value="{{ $task->title }}">
                    </div>
                    <div class="form-group col-md-10">
                      <label for="exampleFormControlTextarea1">Описание</label>
                      <textarea class="form-control" rows="3" placeholder="Описание" name="description">{{ $task->description }}</textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Редактировать</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
