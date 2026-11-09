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

<h2>Add Category</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('save-category')}}" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{old('name')}}" placeholder="Category name.." >
    @error('name')
        <span>{{$message}}</span>
    @enderror

    <label for="description">Description</label>
    <textarea id="description" name="description" placeholder="Your description.."  >{{old('description')}}</textarea>
    @error('description')
    <span>{{$message}}</span>
    @enderror

    <input type="submit" value="Submit">
</form>

</body>
</html>


