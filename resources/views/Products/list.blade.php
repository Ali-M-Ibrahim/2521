<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Responsive Table</title>
    <style>
        /* Responsive container wrapper */
        .table-container {
            width: 100%;
            overflow-x: auto;
            margin: 20px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Core Table Properties */
        .custom-table {
            width: 100%;
            border-collapse: collapse; /* Merges borders cleanly */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            text-align: left;
            background-color: #ffffff;
            table-layout: fixed; /* Forces predictable column sizing */
            min-width: 600px; /* Prevents squishing on small mobile viewports */
        }

        /* Header Layout styling */
        .custom-table thead tr {
            background-color: #009879;
            color: #ffffff;
            font-weight: bold;
        }

        /* Universal padding and spacing rules */
        .custom-table th,
        .custom-table td {
            padding: 12px 15px;
            word-wrap: break-word; /* Prevents overflow strings breaking layout */
        }

        /* Explicit Data Alignments */
        .text-center { text-align: center; }
        .text-right { text-align: right; }

        /* Zebra Striping & Visual Grid Hierarchy */
        .custom-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .custom-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        /* Final formatting and hover feedback */
        .custom-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .custom-table tbody tr:hover {
            background-color: #f1f7f6;
            transition: background-color 0.2s ease;
        }
    </style>
</head>
<body>

<div class="table-container">
    <a href="{{route('add-product')}}" >Create Product</a>
    <table class="custom-table">
        <thead>
        <tr>
            <th style="width: 15%;">ID</th>
            <th style="width: 45%;">Product Name</th>
            <th class="text-center" style="width: 20%;">Description</th>
            <th class="text-right" style="width: 20%;">Price</th>
        </tr>
        </thead>
        <tbody>
{{--            @foreach($data as $row)--}}
{{--                <tr>--}}
{{--                    <td>{{$row->id}}</td>--}}
{{--                    <td>{{$row->name}}</td>--}}
{{--                    <td>{{$row->description}}</td>--}}
{{--                    <td>{{$row->price}}</td>--}}

{{--                </tr>--}}
{{--            @endforeach--}}

        @forelse($data as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->description}}</td>
                <td>{{$row->price}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4"> no data found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
