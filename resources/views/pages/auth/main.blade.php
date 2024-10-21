<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{config('app.name') . ': Masuk'}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{config('app.name') . ': Masuk'}}" />
    <meta property="og:url" content="https://upi.dev" />
    <meta property="og:site_name" content="{{config('app.name')}}" />
    <link rel="canonical" href="{{ url('https://upi.dev') }}" />
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" />
    <link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700') }}" />
    <link href="{{asset('keenthemes/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('keenthemes/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(keenthemes/media/illustrations/sketchy-1/14.png)">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <div id="page_login">
                    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        <form class="form w-100" novalidate="novalidate" id="form_login">
                            <div class="text-center mb-10">
                                    <h1 class="text-dark mb-3">{{config('app.name')}}</h1> 
                                <div class="text-gray-400 fw-bold fs-4">Don't have an account yet?
                                <a href="javascript:;" onclick="auth_content('page_register');" class="link-primary fw-bolder">Register</a></div>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Username</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" />
                            </div>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                </div>
                                <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                            </div>
                            <div class="text-center">
                                <button type="submit" id="tombol_login" onclick="handle_login('#tombol_login','#form_login','{{route('auth.login')}}');" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Login</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="page_register">
                    <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        <form class="form w-100" novalidate="novalidate" id="form_register">
                            <div class="mb-10 text-center">
                                <h1 class="text-dark mb-3">Register</h1>
                                <div class="text-gray-400 fw-bold fs-4">Already have an account?
                                <a href="javascript:;" onclick="auth_content('page_login');" class="link-primary fw-bolder">Log in here</a></div>
                            </div>
                            
                            <div class="row fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Username</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="username" autocomplete="off" />
                            </div>
                            <div class="row fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Daftar Sebagai</label>
                                <i class="fa fa-question-circle text-primary" data-toggle="tooltip" data-placement="top" title="Pilih Role yang sesuai dengan akun anda."></i>
                                <select class="form-control form-control-lg form-control-solid" name="role_id">
                                    <option selected disabled>Pilih Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                            </div>
                            <div class="text-center">
                                <button type="button" id="tombol_register" onclick="handle_post('#tombol_register','#form_register','{{route('auth.register')}}');" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">Register</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('keenthemes/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('keenthemes/js/scripts.bundle.js')}}"></script>
<script src="{{asset('js/auth.js')}}"></script>
<script>
    auth_content('page_login');
    function handle_login(tombol,form,url){
        $(tombol).prop("disabled", true);
        $(tombol).attr("data-kt-indicator", "on");
        $.ajax({
            url: url,
            method: 'POST',
            data: $(form).serialize(),
            success: function(response){
                if(response.alert == 'success'){
                    Swal.fire({ text: response.message, icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } }).then(function() {
                        window.location.href = response.redirect;
                    });
                }else{
                    $(tombol).prop("disabled", false);
                    $(tombol).removeAttr("data-kt-indicator");
                    Swal.fire({ text: response.message, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } });
                }
            },
        });
    }
</script>
</body>
</html>