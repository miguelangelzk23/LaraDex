@extends('layouts.app')

@section('title', ' Trainer')

@section('content')
   @include('common.succes')


<img style="height: 300px;width: 300px;background-color: #EFEFEF;margin: 20px" class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}">

<div class="text-center">
    <h4>{{$trainer->slug}}</h4>
<p>{{$trainer->descripcion}}</p>
<p></p>
<a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar </a>
<form action="/trainers/{{$trainer->slug}}" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger" type="submit" >Eliminar</button>
</form>
</div>
@endsection