<!doctype html>
<html lang="en">

@include('layouts.admin.head')
<!-- owl.carousel css -->
<link rel="stylesheet" href="{{ asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css') }}">

<link rel="stylesheet" href="{{ asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css') }}">

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">

                                                <h4 class="mb-3"><i
                                                        class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span
                                                        class="text-primary">5k</span>+ Satisfied clients</h4>

                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel"
                                                        id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" Fantastic theme with a
                                                                    ton of options. If you just want the HTML to
                                                                    integrate with your project, then this is the
                                                                    package. You can find the files in the 'dist'
                                                                    folder...no need to install git and all the other
                                                                    stuff the documentation talks about. "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary">Abs1981</h4>
                                                                    <p class="font-size-14 mb-0">- Skote User</p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" If Every Vendor on Envato
                                                                    are as supportive as Themesbrand, Development with
                                                                    be a nice experience. You guys are Wonderful. Keep
                                                                    us the good work. "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary">nezerious</h4>
                                                                    <p class="font-size-14 mb-0">- Skote User</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5">
                                    <a href="index.html" class="d-block auth-logo">
                                        <img src="{{ asset('/assets/images/logos/gizmogul-logo.png') }}" alt="" height="18"
                                            class="auth-logo-dark">
                                        <img src="{{ asset('/assets/images/logos/gizmogul-logo-light.png') }}" alt="" height="18"
                                            class="auth-logo-light">
                                    </a>
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 class="text-primary">Register account</h5>
                                        <p class="text-muted">Get your free Skote account now.</p>
                                    </div>

                                    <div class="mt-4">
                                        <form class="needs-validation" method="POST" novalidate
                                            action="{{ route('register') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter name" required>
                                                <div class="invalid-feedback">
                                                    Please Enter name
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Enter email" required value="{{ old('email') }}">
                                                <div class="invalid-feedback">
                                                    Please Enter Email
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="password"
                                                    class="form-label">{{ __('Password') }}</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="Enter password" required
                                                    autocomplete="off">
                                                <div class="invalid-feedback">
                                                    Please Enter password
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="password-confirm"
                                                    class="form-label">{{ __('Confirm Password') }}</label>
                                                <input type="password" class="form-control" id="password-confirm"
                                                    name="password_confirmation" required autocomplete="off">
                                                <div class="invalid-feedback">
                                                    Please Confirm password
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Picture</label>
                                                <input class="form-control" id="formFile" type="file" name="avatar"
                                                    required>
                                                <div class="invalid-feedback">
                                                    Please Choose Picture
                                                </div>
                                            </div>

                                            <div>
                                                <p class="mb-0">By registering you agree to the Skote <a
                                                        href="#" class="text-primary">Terms of Use</a></p>
                                            </div>

                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">{{ __('Register') }}</button>
                                            </div>
                                        </form>
                                        <div class="mt-5 text-center">
                                            <p>Already have an account ? <a href="{{ route('login') }}"
                                                    class="fw-medium text-primary"> Login</a> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script> Skote. Crafted with <i
                                            class="mdi mdi-heart text-danger"></i> by Themesbrand
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    <!-- JAVASCRIPT -->
    @include('layouts.admin.scripts')

    <!-- owl.carousel js -->
    <script src="{{ asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>

    <!-- validation init -->
    <script src="{{ asset('/assets/js/pages/validation.init.js') }}"></script>

    <!-- auth-2-carousel init -->
    <script src="{{ asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>

</body>

</html>
