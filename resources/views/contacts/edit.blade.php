@extends('layout')

@section('content')
<h2 class="fw-bold mb-3">Edit Contact</h2>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('contacts.update', $contact) }}" method="POST">
            @csrf
            @method('PUT')
            @include('contacts._form')
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
