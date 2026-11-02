<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <style>
        h1{
            color:red;
        }
    </style>
{{--    <link rel="stylesheet" href="./css/custom.css" />--}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
</head>
<body>
<h1>Hello Web 2 Class</h1>
<p>Hello class, I am ali ibrahim</p>
<h2>To apply external css</h2>
<button onclick="myFct()">Click me !</button>

<button onclick="fct3()">Click me external !</button>

<script src="{{asset('js/custom.js')}}"></script>
{{--<script src="./js/custom.js"></script>--}}
<script>
    function myFct(){
        alert("Heloo Class from javascript");
    }
</script>
</body>
</html>
