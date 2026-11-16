<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2;}

        tr:hover {background-color: #ddd;}

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<h1>Add Document  <a href="{{route('create-document')}}">+</a>  </h1>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>

    @forelse($data as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td><img src="{{asset($row->path)}}" /></td>
            <td>
        <a href="{{asset($row->path)}}" download> download</a>
            </td>
        </tr>

    @empty
        <tr>
            <td style="text-align:center" colspan="4">No data found</td>
        </tr>

    @endforelse

</table>

</body>
</html>


