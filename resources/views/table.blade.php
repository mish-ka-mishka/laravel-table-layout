<?php
/** @var \Illuminate\Http\Resources\Json\JsonResource $data */

$title = $title ?? '';
$columnNames = $columnNames ?? [];
$htmlColumns = $htmlColumns ?? [];

$table = $data->toArray(request());

$columns = empty($table) ? [] : array_keys($table[0]);

foreach ($columns as $column) {
    $columnNames[$column] = $columnNames[$column] ?? $column;
}
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <script src="https://tofsjonas.github.io/sortable/sortable.js"></script>

        <style>
            body {
                font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue, sans-serif;
                padding: 0 8px 60px;
                margin: 0;
            }

            table {
                text-align: left;
                border-collapse: separate;
                border-spacing: 0
            }

            th, td {
                padding: 4px;
            }

            th {
                border-bottom: 1px solid #ccc
            }

            thead {
                position: sticky;
                top: 0;
                background: white;
                vertical-align: baseline;
            }

            tbody {
                vertical-align: top;
            }

            .sortable th {
                cursor: pointer;
            }

            .sortable .dir-u::after, .sortable .dir-d::after {
                content: '▲';
                font-size: .8em;
            }
            .sortable .dir-d::after {
                content: '▼';
            }

            .pagination {
                list-style: none;
                padding: 0;
            }
            .pagination .page-item {
                display: inline;
            }

            tr:hover {
                background: #f8f8f8;
            }
        </style>
    </head>
    <body>
        @if ($data->resource instanceof \Illuminate\Contracts\Pagination\Paginator)
            {{ $data->links() }}
        @endif

        @if (empty($table))
            <table>
                <tr>
                    <td>Нет данных</td>
                </tr>
            </table>
        @endif

        <table class="sortable">

            <thead>
                <tr>
                    @foreach($columns as $column)
                        <th>
                            {{ $columnNames[$column] }}
                        </th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @foreach($table as $i => $row)
                    <tr>
                        @foreach($row as $column => $colData)
                            @if (in_array($column, $htmlColumns))
                                <td>{!! $colData !!}</td>
                            @else
                                <td>{{ $colData }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>

        </table>
    </body>
</html>
