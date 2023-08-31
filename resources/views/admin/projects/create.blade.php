@extends('layouts.admin');

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h2 class="my-3">
                    New Project
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
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="my-3">
                    @csrf
                    <div class="form-group mb-3">
                        <span class="form-group-text" id="name">Name</span>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Project name" aria-label="Username" aria-describedby="basic-addon1"
                        value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <span class="form-group-text">Description</span>
                        <textarea name="description" id="description" class="form-control" aria-label="With textarea">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group my-3">
                        <span class="form-group-text">Cover image</span>
                        <input name="cover_image" id="cover_image" type="file" class="form-control" id="inputGroupFile02">
                    </div>
                    <select name="type_id" id="type_id" class="form-select" aria-label="Default select example">
                        <option value='null' selected>Open this select menu</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <div class="form-group my-3">
                        <div class="form-group-text">Scegli le tecnologie utilizzate</div>
                        @foreach ($technologies as $technology)
                            <input class="form-check-input" type="checkbox" name="technologies[]" id="technologies" value='{{ $technology->id }}' {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}> {{ $technology->name }}
                        @endforeach
                    </div>
                    <div class="btns justify-content-end my-3">
                        <button type="submit" class="btn btn-primary mx-3">
                            Aggiungi
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