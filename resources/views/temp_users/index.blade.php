@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Users</div>

                <div class="card-body">

                    @if (session('alert-mesej-sukses'))
                    <div class="alert alert-success">
                        {{ session('alert-mesej-sukses') }}
                    </div>
                    @endif

                    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>PHONE</th>
                                <th>STATUS</th>
                                <th>ROLE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($senarai_users as $person)

                            <tr>
                                <td scope="row">{{ $person->id }}</td>
                                <td>{{ $person->name }}</td>
                                <td>{{ $person->phone }}</td>
                                <td>{{ $person->status }}</td>
                                <td>{{ $person->role }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $person->id) }}" class="btn btn-info">EDIT</a>
                                    <button type="button" class="btn btn-danger">DELETE</button>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                    {{ $senarai_users->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
