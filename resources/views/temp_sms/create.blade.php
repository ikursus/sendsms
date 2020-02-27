@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Send SMS') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sms.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="penerima" class="col-md-4 col-form-label text-md-right">No. Penerima</label>

                            <div class="col-md-6">
                                <input id="penerima" type="text" class="form-control @error('penerima') is-invalid @enderror" name="penerima" value="{{ old('penerima') }}" required autocomplete="penerima" autofocus>
                                <span>Format nombor telefon beserta country code: 60123456789</span>
                                @error('penerima')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message SMS') }}</label>

                            <div class="col-md-6">
                                <input id="message" type="text" class="form-control @error('name') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="message" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Hantar SMS') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
