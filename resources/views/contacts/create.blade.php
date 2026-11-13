@extends('layout')

@section('content')
<h2 class="fw-bold mb-3">Add Contact</h2>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            @include('contacts._form')
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
