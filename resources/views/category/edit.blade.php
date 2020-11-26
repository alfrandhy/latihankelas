@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>

                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="small mb-1" for="name">Category Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $category->name }}" required autocomplete="name"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="parent_id" class="small mb-1">Parrent Category</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">None</option>
                                @foreach($parent as $val)
                                    <option value="{{ $val->id }}" {{ $val->id == $category->parent_id ? 'selected':'' }}>{{ $val->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">SAVE</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
