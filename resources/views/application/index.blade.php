@extends('layouts.master')

@section('title')
    Список заявок
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const getSort = ({ target }) => {
                const order = (target.dataset.order = -(target.dataset.order || -1));
                const index = [...target.parentNode.cells].indexOf(target);
                const collator = new Intl.Collator(['en', 'ru'], { numeric: true });
                const comparator = (index, order) => (a, b) => order * collator.compare(
                    a.children[index].innerHTML,
                    b.children[index].innerHTML
                );

                for(const tBody of target.closest('table').tBodies)
                    tBody.append(...[...tBody.rows].sort(comparator(index, order)));

                for(const cell of target.parentNode.cells)
                    cell.classList.toggle('sorted', cell === target);
            };

            document.querySelectorAll('.table_sort thead').forEach(tableTH => tableTH.addEventListener('click', () => getSort(event)));

        });
    </script>
@endsection

@section('content')
    <div>
        <table class="table table-bordered table_sort">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Дата завершения</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td>
                            <a href="{{ route('application.show', [$application['id']]) }}">{{ $application['name'] }}</a>
                        </td>
                        <td>{{ $application['created_at'] }}</td>
                        <td>{{ $application['finished_at'] }}</td>
                        <td>{{ $application['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('application.create') }}" class="btn" style="background-color: blue">Создать</a>
    </div>

    <div style="margin-top: 10px;">
        {{ $applications->links('layouts.paginator') }}
    </div>

@endsection
