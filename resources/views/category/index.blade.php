@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-success" href="{{ url('category/create') }}">Create Category</a>
                </div>
                <div class="card-body">
                    <table class="table table-stripped">
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Parrent</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @php $no=1 @endphp
                        @foreach ($category as $item) 
                        <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->parent  ?  $item->parent->name:'-' }}</td>
                                <td>{{ $item->created_at->format('Y M d') }}</td>
                                <td>
                                    <form action="{{ Route('category.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('category.edit',$item->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
