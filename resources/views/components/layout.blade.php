<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{isset($title)?$title:'Presto.it'}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body >

           <x-navbar />


{{$slot}}

<x-footer />

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('js/app.js')}}"></script>

</body>
</html>