<!DOCTYPE html>
<html>
<style>
    form {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    label {display: block;}

    input[type=text], select,textarea {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
<body>

<h2>Edit Item</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('item.update',['item'=>$data->id])}}" method="post">
    @csrf
    @method('put')

    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{$data->name}}" placeholder="Item name.." >
    @error('name')
    <span>{{$message}}</span>
    @enderror


    <label for="price">Price</label>
    <input type="text" id="price" name="price" value="{{$data->price}}" placeholder="Item price.." >
    @error('price')
    <span>{{$message}}</span>
    @enderror

    <label for="category_id">Category</label>
    <select id="category_id" name="category_id">
        @foreach($categories as $obj)
            <option @if($data->category_id == $obj->id) selected @endif value="{{$obj->id}}">{{$obj->name}}</option>
        @endforeach
    </select>


    <input type="submit" value="Submit">
</form>

</body>
</html>


