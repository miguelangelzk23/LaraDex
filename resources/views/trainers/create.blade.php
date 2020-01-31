@extends('layouts.app')

@section('title', 'trainers create')

@section('content')
     
<form  class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
    @csrf
   @include('common.error')
    <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" name="name_trainer" class"form-control" value="">
        </div>
        <div class="form-group">
            <label for="">Descripcion del entrenador </label>
            <textarea type="text" name="description_trainer" class"form-control" value=""></textarea>
            </div>
    
        <div class="form-group">
            <label for="">Avatar</label>
            <input type="file" name="avatar_trainer" class"form-control">
            </div>

    <button type="submit" class="btn-primary">Guardar</button>
</form>
@endsection

