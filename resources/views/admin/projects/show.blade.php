@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-12 my-3">
                <div class="d-flex">
                    <h2>
                        {{ $project->name }}
                    </h2>
                    @if(isset($project->type_id))
                        <span class="badge text-bg-info align-self-center ms-3">{{ $project->type->name }}</span>
                    @endif
                </div>
                <p>
                    {{ $project->description }}
                </p>
                @if(isset($project->technologies))
                    <div class="my-3">
                        @foreach ($project->technologies as $item)    
                            <span class="badge text-bg-success align-self-center me-2">{{ $item->name }}</span>
                        @endforeach
                    </div>
                @endif
                @if (isset($project->cover_image))
                    <img src="{{ asset('storage/'.$project->cover_image) }}" alt="Cover {{ $project->name }}">
                @endif
            </div>
            <div class="col-12">
                <div class="btns justify-content-end">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                        Torna alla lista
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection