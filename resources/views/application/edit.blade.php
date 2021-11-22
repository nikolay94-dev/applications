@extends('layouts.master')

@section('title')
    Редактирование {{ $application['name'] }}
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
        <form enctype="multipart/form-data" method="POST" action="{{ route('application.update', [$application['id']]) }}">
            {{ csrf_field() }}
            <div class="form-group">
                <div>
                    <label for="name" class="control-label">
                        Название
                    </label>
                    <input class="form-control" name="name" type="text" id="name" required value="{{ $application['name'] }}">
                </div>
                <div>
                    <img style="width: 150px; height: 150px;" src="{{'http://' .  $_SERVER['HTTP_HOST'] . '/images/' . $application['photo_name'] }}" alt="">
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
                    <input class="form-control" name="description" type="text" id="description" value="{{ $application['description'] }}">
                </div>
                <div>
                    <label class="control-label">
                        Дата создания: {{ $application['created_at'] }}
                    </label>
                </div>
                <div>
                    <label for="finished_at" class="control-label">
                        Дата завершения
                    </label>
                    <input class="form-control" name="finished_at" type="date" id="finished_at" value="{{ $application['finished_at'] }}">
                </div>
                <div>
                    <label for="status" class="control-label">
                        Статус
                    </label>
                    <select name="status" id="status" class="form-control" required>
                        @foreach($application['statuses'] as $key => $value)
                            <option value="{{ $key }}"
                                    @if($application['status'] == $key)
                                        selected="selected"
                                    @endif
                            >{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Обновить</button>
        </form>
    </div>
@endsection
