@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mb-3">My Projects</a>
        <h1 class="mb-3">Create a new project</h1>
        <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Project name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                        <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            {{-- version  --}}
            <div class="form-group">
                <div class="input-group mb-3">
                    <span class="input-group-text">Type</span>
                    <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                        <option value="">Select type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <span class="input-group-text">Version</span>
                    <input type="number" class="form-control @error('major_version') is-invalid @enderror" id="major_version" name="major_version" value="{{ old('major_version') }}">
                    <input type="number" class="form-control @error('minor_version') is-invalid @enderror" id="minor_version" name="minor_version" value="{{ old('minor_version') }}">
                    <input type="number" class="form-control @error('patch_version') is-invalid @enderror" id="patch_version" name="patch_version" value="{{ old('patch_version') }}">
                </div>
                
                    @error('major_version')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                    @error('minor_version')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                    @error('patch_version')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                    @error('type_id')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                {{-- technologies --}}
                <div class="form-group">
                    <span class="me-3">Technologies</span>
                    @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline form-switch">
                        <input class="form-check-input @error('patch_version') is-invalid @enderror" type="checkbox" id="technologies" name="technologies[]" value="{{$technology->id}}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineCheckbox1">{{$technology->name}}</label>
                    </div>
                    @error('technologies[]')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror    
                    @endforeach                     
                </div>

                {{-- upload image --}}
                <div class="mb-3">
                    {{-- preview loaded image--}}
                    <div class="preview">
                        <img id="file-image-preview">
                    </div>
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                </div>
                @error('image')
                        <div class="alert alert-danger">{{ $message }} </div>
                @enderror


                {{-- description --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Project description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                </div>

            </div> 
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>  
@endsection