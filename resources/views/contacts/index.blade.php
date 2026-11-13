@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold mb-0">Contact List</h2>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary">+ Add Contact</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('contacts.index') }}" method="GET" class="input-group mb-3">
            <input type="text" name="search" value="{{ $search }}"
                   class="form-control" placeholder="Search name, email, or phone">
            <button class="btn btn-primary" type="submit">Search</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Reset</a>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                            <td><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></td>
                            <td>{{ $contact->address }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('contacts.edit', $contact) }}"
                                   class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('contacts.destroy', $contact) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this contact?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No contacts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $contacts->links() }}
    </div>
</div>
@endsection
