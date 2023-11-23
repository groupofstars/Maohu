<html lang="en"><!--begin::Head--><head><base href="../../../">
		<title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel by Keenthemes</title>
		<meta charset="utf-8">
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free.">
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:locale" content="en_US">
		<meta property="og:type" content="article">
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme">
		<meta property="og:url" content="https://keenthemes.com/metronic">
		<meta property="og:site_name" content="Keenthemes | Metronic">
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8">
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css">
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css">
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="/" class="mb-12">
						<img alt="Logo" src="assets/media/logos/maohu.svg" class="h-100px">
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo1/dist/index.html" action="#">
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Sign In</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">New Here?
								<a href="/signup" class="link-primary fw-bolder">Create an Account</a></div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10 fv-plugins-icon-container">
								<!--begin::Label-->
								<label class="form-label fs-6 fw-bolder text-dark">Email</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off">
								<!--end::Input-->
							<div class="fv-plugins-message-container invalid-feedback"></div></div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10 fv-plugins-icon-container">
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack mb-2">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
									<!--end::Label-->
									<!--begin::Link-->
									<a href="../../demo1/dist/authentication/layouts/basic/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off">
								<!--end::Input-->
							<div class="fv-plugins-message-container invalid-feedback"></div></div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<!--begin::Submit button-->
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
									<span class="indicator-label">Continue</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Submit button-->
								
							</div>
							<!--end::Actions-->
						<div></div></form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<div class="d-flex flex-center flex-column-auto p-10">
					<!--begin::Links-->
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="/" class="text-muted text-hover-primary px-2">About</a>
						<a href="/" class="text-muted text-hover-primary px-2">Contact</a>
						<a href="/" class="text-muted text-hover-primary px-2">Contact Us</a>
					</div>
					<!--end::Links-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script type="text/javascript">
			var KTSigninGeneral=function(){
                var t,e,i;
                return{
                    init:function(){
                        t=document.querySelector("#kt_sign_in_form"),
                        e=document.querySelector("#kt_sign_in_submit"),
                        i=FormValidation.formValidation(t,{
                            fields:{
                                email:{
                                    validators:{
                                        notEmpty:{
                                            message:"Email address is required"
                                        },emailAddress:{
                                            message:"The value is not a valid email address"
                                        }
                                    }
                                },
                                password:{
                                    validators:{
                                        notEmpty:{
                                            message:"The password is required"
                                        }
                                    }
                                }
                            },
                            plugins:{
                                trigger:new FormValidation.plugins.Trigger,
                                bootstrap:new FormValidation.plugins.Bootstrap5({
                                    rowSelector:".fv-row"}
                                    )
                            }
                        }),
                        e.addEventListener("click",(function(n){
                            n.preventDefault(),
                            i.validate().then((function(i){
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                            });
                                $.ajax({
                                            url: "/signin_check",
                                            method: "POST",
                                            data: {
                                                    email: $('#kt_sign_in_form input[name="email"]').val(),
                                                    password: $('#kt_sign_in_form input[name="password"]').val()
                                            },
                                            success: function (res) {
                                                if (res=='success'){
                                                        toastr.success("successed");
                                                        "Valid"==i ? (
                                                                e.setAttribute("data-kt-indicator","on"),
                                                                e.disabled=!0,
                                                                setTimeout((function(){
                                                                    e.removeAttribute("data-kt-indicator"),
                                                                    e.disabled=!1,
                                                                    // Swal.fire({
                                                                    //     text:"You have successfully logged in!",
                                                                    //     icon:"success",
                                                                    //     buttonsStyling:!1,
                                                                    //     confirmButtonText:"Ok, got it!",
                                                                    //     customClass:{confirmButton:"btn btn-primary"}
                                                                    // }).then((function(e){
                                                                    //     if(e.isConfirmed){
                                                                    //         t.querySelector('[name="email"]').value="",
                                                                    //         t.querySelector('[name="password"]').value="";
                                                                    //         var i=t.getAttribute("data-kt-redirect-url");
                                                                    //         i&&(location.href=i)
                                                                    //     }
                                                                    // }))
                                                                    location.href="/";
                                                                }),2e3)
                                                        ) : Swal.fire({
                                                                text:"Sorry, looks like there are some errors detected, please try again.",
                                                                icon:"error",
                                                                buttonsStyling:!1,
                                                                confirmButtonText:"Ok, got it!",
                                                                customClass:{confirmButton:"btn btn-primary"}
                                                            })
                                                }else if (res=='failed') toastr.error("Incorrect id , password");
                            },
                                                error: function (res) {
                                                        toastr.error("error");
                                                },
                        });

                                
                            }))
                        }))
                    }
                }
            }();
            KTUtil.onDOMContentLoaded((function(){
                KTSigninGeneral.init()
            }));
		</script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	
	
<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg></body><!--end::Body--></html>