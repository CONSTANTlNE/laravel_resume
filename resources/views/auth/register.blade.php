@extends('auth.layout')

@section('register')
    <div class="row">

        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
            <div class="card mt-3 mb-3">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 mb-3">

                            <h2>Sign Up</h2>
                            <p>Enter your email and password to register</p>

                        </div>
                        <form action="{{ route('register') }}" method="post" >
                            @csrf
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input value="{{old('name')}}" type="text" class="form-control add-billing-address-input @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control @error('name') is-invalid @enderror" name="email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Repeat Password</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="password_confirmation">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="form-check form-check-primary form-check-inline">
                                    <input class="form-check-input me-3" type="checkbox" id="form-check-default">
                                    <label class="form-check-label" for="form-check-default">
                                        I agree the <a href="javascript:void(0);" class="text-primary">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-4">
                                <button class="btn btn-secondary w-100">SIGN UP</button>
                            </div>
                        </div>
                        </form>
                        <div class="col-12 mb-4">
                            <div class="">
                                <div class="seperator">
                                    <hr>
                                    <div class="seperator-text"> <span>Or continue with</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-12">
                            <div class="mb-4">
                                <button class="btn  btn-social-login w-100 ">
                                    <img src="../src/assets/img/google-gmail.svg" alt="" class="img-fluid">
                                    <span class="btn-text-inner">Google</span>
                                </button>
                            </div>
                        </div>

                        <div class="col-sm-4 col-12">
                            <div class="mb-4">
                                <button class="btn  btn-social-login w-100">
                                    <img src="../src/assets/img/github-icon.svg" alt="" class="img-fluid">
                                    <span class="btn-text-inner">Github</span>
                                </button>
                            </div>
                        </div>

                        <div class="col-sm-4 col-12">
                            <div class="mb-4">
                                <button class="btn  btn-social-login w-100">
                                    <img src="../src/assets/img/twitter.svg" alt="" class="img-fluid">
                                    <span class="btn-text-inner">Twitter</span>
                                </button>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="text-center">
                                <p class="mb-0">Already have an account ? <a href="{{route('login')}}" class="text-warning">Sign in</a></p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection