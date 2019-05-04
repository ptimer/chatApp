@extends('../../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" align="center">
            <div class="card">
                <div class="card-header">Создать новое задание</div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Админка</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Список заданий</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Создать задание</li>
                  </ol>
                </nav>
                <h2 class="mx-auto">Создать</h2>
                <form method="post" action="{{route('tasks.store') }}">
                  {{ csrf_field() }}
                  <div class="form-row justify-content-center">
                    <div class="form-group col-md-10">
                      <label for="title">Заголовок</label>
                      <input type="input" class="form-control" placeholder="Заголовок" name="title">
                    </div>
                    <div class="form-group col-md-10">
                      <label for="exampleFormControlTextarea1">Описание</label>
                      <textarea class="form-control" rows="3" placeholder="Описание" name="description"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
