@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai SMS</div>

                <div class="card-body">

                    @if (session('alert-mesej-sukses'))
                    <div class="alert alert-success">
                        {{ session('alert-mesej-sukses') }}
                    </div>
                    @endif

                    <p>
                    <a href="{{ route('sms.create') }}" class="btn btn-primary">Hantar SMS</a>
                    </p>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PENERIMA</th>
                                <th>MESSAGE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($senarai_sms as $sms)

                            <tr>
                                <td scope="row">{{ $sms->id }}</td>
                                <td>{{ $sms->penerima }}</td>
                                <td>{{ $sms->message }}</td>
                                <td>{{ $sms->status }}</td>
                                <td>
                                    <a href="{{ route('sms.edit', $sms->id) }}" class="btn btn-info">EDIT</a>


                                    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $sms->id }}">
    DELETE
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modal-delete-{{ $sms->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <form method="POST" action="{{ route('sms.destroy', $sms->id) }}">
            @csrf
            @method('delete')

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Adakah anda bersetuju untuk delete rekod {{  $sms->id }} ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>

        </form>


    </div>
  </div>

                                    
                                        
                                    
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                    {{ $senarai_sms->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
