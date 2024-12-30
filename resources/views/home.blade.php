@extends('layouts.app')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Two Factor Authentication') }}</div>

                <div class="card-body">
                    @if (session('status') == 'two-factor-authentication-disabled')
                        <div class="alert alert-success" role="alert">
                            Two factor Authentication has been disabled.
                        </div>
                    @endif

                    @if (session('status') == 'two-factor-authentication-enabled')
                        <div class="alert alert-success" role="alert">
                            Two factor Authentication has been enabled.
                        </div>
                    @endif


                    <form method="POST" action="/user/two-factor-authentication">
                        @csrf

                        @if (auth()->user()->two_factor_secret)
                            @method('DElETE')

                            <div class="pb-5">
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            </div>

                            {{-- <div>
                                <h3>Recovery Codes:</h3>

                                <ul>
                                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                        <li>{{ $code }}</li>
                                    @endforeach
                                </ul>
                            </div> --}}

{{-- <button class="btn btn-danger">Disable</button>
                        @else
                            <button class="btn btn-primary">Enable</button>
                        @endif
                    </form>
                </div>
            </div>
        </div> --}}
{{-- </div>
</div>
@endsection  --}}



@section('content')
    <div class="container">
        {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Two Factor Authentication') }}</div>

                <div class="card-body">
                    @if (session('status') == 'two-factor-authentication-disabled')
                        <div class="alert alert-success" role="alert">
                            Two factor Authentication has been disabled.
                        </div>
                    @endif

                    @if (session('status') == 'two-factor-authentication-enabled')
                        <div class="alert alert-success" role="alert">
                            Two factor Authentication has been enabled.
                        </div>
                    @endif


                    <form method="POST" action="/user/two-factor-authentication">
                        @csrf

                        @if (auth()->user()->two_factor_secret)
                            @method('DELETE')

                            <div class="pb-5">
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            </div>

                            {{-- <div>
                                <h3>Recovery Codes:</h3>

                                <ul>
                                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                        <li>{{ $code }}</li>
                                    @endforeach
                                </ul>
                            </div> --}}

        {{-- <button class="btn btn-danger">Disable</button>
                        @else
                            <button class="btn btn-primary">Enable</button>
                        @endif
                    </form>
                </div>
            </div>
        </div> --}}
        {{-- </div>  --}}


        <div class="container">
            <!-- Toggle Button -->
            <button id="toggleBtn" class="btn btn-info mb-3">Toggle Two-Factor Authentication</button>

            <div class="row justify-content-center" id="twoFactorSection" style="display: none;">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Two Factor Authentication') }}</div>

                        <div class="card-body">
                            @if (session('status') == 'two-factor-authentication-disabled')
                                <div class="alert alert-success" role="alert">
                                    Two factor Authentication has been disabled.
                                </div>
                            @endif

                            @if (session('status') == 'two-factor-authentication-enabled')
                                <div class="alert alert-success" role="alert">
                                    Two factor Authentication has been enabled.
                                </div>
                            @endif


                            <form method="POST" action="/user/two-factor-authentication">
                                @csrf

                                @if (auth()->user()->two_factor_secret)
                                    @method('DELETE')

                                    <div class="pb-5">
                                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                    </div>

                                    {{-- <div>
                                    <h3>Recovery Codes:</h3>

                                    <ul>
                                        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                            <li>{{ $code }}</li>
                                        @endforeach
                                    </ul>
                                </div> --}}

                                    <button class="btn btn-danger">Disable</button>
                                @else
                                    <button class="btn btn-primary">Enable</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript to toggle visibility -->
        <script>
            document.getElementById('toggleBtn').addEventListener('click', function() {
                var section = document.getElementById('twoFactorSection');
                if (section.style.display === 'none') {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        </script>

   
        <div class="container">
            <!-- Toggle Button -->
            <button id="toggleFormBtn" class="btn btn-info mb-3">Register University</button>

            <div id="universityFormSection" style="display: none;">
                <h2>Register Your University</h2>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('universities.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">University Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control"
                            value="{{ old('address') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" class="form-control" value="{{ old('state') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="state">Country</label>
                        <input type="text" id="country" name="country" class="form-control" value="{{ old('state') }}"
                            required>
                    </div>



                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>

        <!-- JavaScript to toggle visibility -->
        <script>
            document.getElementById('toggleFormBtn').addEventListener('click', function() {
                var formSection = document.getElementById('universityFormSection');
                if (formSection.style.display === 'none') {
                    formSection.style.display = 'block';
                } else {
                    formSection.style.display = 'none';
                }
            });
        </script>
    @endsection
