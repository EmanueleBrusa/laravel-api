@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5">AGGINGI NUOVO POST</h1>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-primary">Ritorna alla lista completa</a>
            </div>
            <div class="col-12">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-4">
                        <label class="contol-lable">Titolo</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" placeholder="Titolo" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label class="contol-lable">Immagine</label>
                        <input class="form-control @error('image')is-invalid @enderror" type="file" name="image" id="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label class="contol-lable">Tipologia</label>
                        <select name="type_id" id="type" class="form-control">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <label class="contol-lable">Tag</label>
                        <select name="tags[]" id="tags" class="form-control" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <label class="contol-lable">Contenuto</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Contenuto">{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-sm btn-success" type="submit">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection