@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Two Factor Verification</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('2fa.post') }}">
                            @csrf

                            <p class="text-success">We have sent you code to your phone : {{ substr(auth()->user()->phone, 0, 5) . '******' . substr(auth()->user()->phone,  -2) }}</p>

                            @if ($message = Session::get('success'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($message = Session::get('error'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group ">
                                        <label for="code">Verification Code</label>
                                        <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" placeholder="Please enter your verification code" required autocomplete="code" autofocus>

                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <a class="btn btn-link" href="{{ route('2fa.resend') }}">Resend Code?</a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>

                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
