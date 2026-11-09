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

<h1>List Items  <a href="{{route('item.create')}}">+</a>  </h1>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>

    @forelse($data as $row)
    <tr>
        <td>{{$row->id}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->category->name}}</td>
        <td>
            <a href="{{route('item.show',['item'=>$row->id])}}">View</a>
            <a href="{{route('item.edit',['item'=>$row->id])}}">Edit</a>

            {{--            <a href="{{route('delete-category2',['id'=>$row->id])}}">delete</a>--}}
{{--            --}}
            <form action="{{route('item.destroy',['item'=>$row->id])}}" method="post">
                @method('delete')
                @csrf
                <input type="submit" value="delete" />
            </form>
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


