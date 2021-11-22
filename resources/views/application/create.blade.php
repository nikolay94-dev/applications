@extends('layouts.master')

@section('title')
    Создание завки
@endsection

@section('content')
    @if (!empty(session('errors')))
        @if(is_object(session('errors')))
            <div class="alert alert-danger">{{ session('errors')->all()[0] }}</div>
        @else
            <div class="alert alert-danger">{{ session('errors') }}</div>
        @endif
    @endif
    <div>
        <form enctype="multipart/form-data" method="POST" action="{{ route('application.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <div>
                    <label for="name" class="control-label">
                        Название
                    </label>
                    <input class="form-control" name="name" type="text" id="name" required>
                </div>
                <div>
                    <label for="photo" class="control-label">
                        Фото
                    </label>
                    <input type="file" name="photo" id="photo" multiple accept="image/*,image/jpeg">
                </div>

                <div>
                    <label for="description" class="control-label">
                        Полнотекстовое описание
                    </label>
                    <input class="form-control" name="description" type="text" id="description">
                </div>
                <div>
                    <label for="finished_at" class="control-label">
                        Дата завершения
                    </label>
                    <input class="form-control" name="finished_at" type="date" id="finished_at">
                </div>
                <div>
                    <label for="status" class="control-label">
                        Статус
                    </label>
                    <select name="status" id="status" class="form-control" required>
                        @foreach($statuses as $key => $status)
                            <option value="{{ $key }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Создать</button>
        </form>

    </div>
@endsection
