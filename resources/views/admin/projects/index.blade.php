@extends('layouts.admin');

@section('content')
    <div class="container index">
        <div class="row my-3">
            <div class="col-12">
                <h2 class="my-3">
                    Projects
                </h2>
                <table class="table">
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Descrizione
                        </th>
                        <th>
                            Gestisci
                        </th>
                    </tr>
                    @foreach ($projects as $project)
                        <tr>
                            <td>
                                {{ $project->name }}
                            </td>
                            <td>
                                {{ $project->description }}
                            </td>
                            {{-- BTN CRUD --}}
                            <td>
                                <div class="btns">
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-secondary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-info">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-12">
                <div class="btns justify-content-end my-3">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                        Aggiungi un elemento alla lista
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection