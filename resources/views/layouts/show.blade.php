@extends('layouts.template')

@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('covers/' . $tradition->cover_image) }}"
                    class="img-fluid rounded-start"
                    alt="{{ $tradition->title ?? 'Cover Image' }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">{{ $tradition->title }}</h3>
                    <p class="card-text">{{ $tradition->synopsis }}</p>

                    {{-- Jika kamu ingin tampilkan kategori --}}
                    @if ($tradition->category)
                        <p><strong>Category:</strong> {{ $tradition->category->name }}</p>
                    @endif

                    <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
