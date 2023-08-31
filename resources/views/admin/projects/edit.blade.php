@extends('layouts.admin');

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-12">
            <h2 class="my-3">
                Update Project
            </h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data" class="my-3">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">Name</span>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Project name" aria-label="Username" aria-describedby="basic-addon1"
                    value="{{old('name') ?? $project->name}}">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Description</span>
                    <textarea name="description" id="description" class="form-control" aria-label="With textarea">{{old('description') ?? $project->description }}</textarea>
                </div>
                <div class="input-group my-3">
                    <span class="input-group-text">Cover image</span>
                    <input name="cover_image" id="cover_image" type="file" class="form-control" id="inputGroupFile02">
                </div>
                <select name="type_id" id="type_id" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{ $type->name }}</option>
                    @endforeach
                </select>
                <div class="form-group my-3">
                    <div class="form-group-text">Scegli le tecnologie utilizzate</div>
                    @foreach ($technologies as $technology)
                        <input class="form-check-input" type="checkbox" name="technologies[]" id="technologies" value='{{ $technology->id }}' {{$errors->any() ? (in_array($technology->id, old('technologies', [])) ? 'checked' : '') : ($project->technologies->contains($technology) ? 'checked' : '') }}> {{ $technology->name }}
                    @endforeach
                </div>
                <div class="btns justify-content-end my-3">
                    <button type="submit" class="btn btn-primary mx-3">
                        Aggiorna
                    </button>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                        Torna alla lista
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection