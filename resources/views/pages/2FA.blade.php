@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status') == "two-factor-authentication-disabled")
                            <div class="alert alert-success" role="alert">
                                Two factor Authentication has been disabled.
                            </div>
                        @endif

                        @if (session('status') == "two-factor-authentication-enabled")
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

                                <div>
                                    <h3>Recovery Codes:</h3>

                                    <ul>
                                        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                            <li>{{ $code }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <button class="sign-btn">Disable</button>
                            @else
                                <button class="sign-btn">Enable</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>



@endsection