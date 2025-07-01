@extends('layouts.template')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<h1>Latest Traditions</h1>

<div class="row">
    @foreach ($traditions as $item)
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('covers/' . $item->cover_image) }}" class="img-fluid rounded-start" alt="{{ $item->title }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::words($item->synopsis, 20, '...') }}</p>

                            <a href="{{ route('aa_traditions.show', $item->id) }}" class="btn btn-success">See More</a>

                            @auth
                                <a href="{{ route('aa_traditions.edit', $item->id) }}" class="btn btn-primary ms-2">Edit</a>

                                @can('delete')
                                    <form action="{{ route('aa_traditions.destroy', $item->id) }}" method="POST" class="d-inline ms-2"
                                            onsubmit="return confirm('Are you sure you want to delete this tradition?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endcan
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center">
    {{ $traditions->links() }}
</div>

@endsection
