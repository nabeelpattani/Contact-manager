<!DOCTYPE html>
<html>
<head>
    <title>Contact Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h1>Contact Manager</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('contacts.store') }}" method="POST" class="mb-4">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" required maxlength="255">
    </div>
    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input type="text" name="phone_number" id="phone_number" class="form-control" required maxlength="15">
    </div>
    <button type="submit" class="btn btn-primary">Add Contact</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
        </tr>
    </thead>
    <tbody>
        @forelse($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone_number }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="text-center">No contacts found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
