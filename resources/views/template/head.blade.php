
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico" />

      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="assets/css/core/libs.min.css" />

      <!-- Aos Animation Css -->
      <link rel="stylesheet" href="assets/vendor/aos/dist/aos.css" />

      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="assets/css/hope-ui.min.css?v=2.0.0" />

      <!-- Custom Css -->
      <link rel="stylesheet" href="assets/css/custom.css?v=1.0.0" />
      <link rel="stylesheet" href="assets/css/custom.min.css?v=2.0.0" />

      <!-- Dark Css -->
      <link rel="stylesheet" href="assets/css/dark.min.css"/>

      <!-- Customizer Css -->
      <link rel="stylesheet" href="assets/css/customizer.min.css" />

      <!-- RTL Css -->
      <link rel="stylesheet" href="assets/css/rtl.min.css"/>

			<!-- underscrore -->
			<script type="text/javascript" src= "/assetsadmin/js/underscore.js"></script>
			<!-- jquery -->
			<script src="/assetsadmin/js/jquery.min.js"></script>
			<script src="/assetsadmin/js/jquery_v3.6.0.min.js"></script>
			<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" ></script> -->
			<script src="/assetsadmin/js/jquery.serializejson.js"></script>

			<!-- knockout -->
			<!-- https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js -->
			<!-- <script src="/assetsadmin/knockout/knockout_3.4.2.js"></script> -->
			<script src="https://ajax.aspnetcdn.com/ajax/knockout/knockout-3.5.0.js"></script>
			<script src="/assetsadmin/knockout/knockout.mapping-latest.js"></script>
			<script src="/assetsadmin/knockout/knockout-file-bindings.js"></script>
			<link href="/assetsadmin/knockout/knockout-file-bindings.css">

			<!-- token input -->
			<link href="/assetsadmin/token_input/token-input.css" rel="stylesheet">
			<link href="/assetsadmin/token_input/token-input-facebook.css" rel="stylesheet">
			<script src="/assetsadmin/token_input/jquery.tokeninput.js"></script>

      <!-- alert -->
      <link href="/assetsadmin/alert/sweetalert.css" rel="stylesheet" type="text/css">
      <script src="/assetsadmin/alert/sweetalert.min.js"></script>

			<script>
				var model = {
					Processing: ko.observable(true),
					ProcessingContent: ko.observable(false),
					checkPass: ko.observable(false),
					CheckId: ko.observable(false),
					changeRupiah: ko.observable(''),
					URI_PAGE: 4, // setup uri access on pages.
					CheckValue: ko.observable(false),
					errorMessage: ko.observable('This field is required!'),
					notAllowedMessage: ko.observable('Email Not Allowed!'),
					acceptMessage: ko.observable('Email is allowed.'),
					giftWrap: ko.observable(true),
				}

				model.changeRupiah = function(value) {
					var	number_string = value.toString(),
					sisa 		= number_string.length % 3,
					rupiah 	= number_string.substr(0, sisa),
					ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
					if (ribuan) {
						separator = sisa ? '.' : '';
						rupiah += separator + ribuan.join('.');
						rupiah = 'Rp '+rupiah;
					} return rupiah;
				// Cetak hasil
				// document.write(rupiah); // Hasil: r23.456.789
			}
		</script>


  </head>
  <body class="light theme-default theme-with-animation card-default theme-color-default">
	<!-- loader Start -->
	<div data-bind="visible: model.Processing() == true">
		<div class="loader simple-loader animate__animated animate__fadeOut d-block">
		<div class="loader-body">
			<img src="assets/images/loader.webp" alt="loader" class="light-loader img-fluid w-25" width="200" height="200">
		</div>
		</div>
	</div>
 


	<!-- <div class="preloader" style="background-color: white; opacity: 0.9;" data-bind='visible: model.Processing()==true' >
		<div class="loading text-center" >
			<span class="spinner-border spinner-border-lg" role="status" aria-hidden="true"></span>
		</div>
	</div> -->

    <!-- loader END -->

	<script>
		model.Resource = {
			logout: 'url-logout', /* isikan value dari rootingnya  (url dengan uri = 1)*/
			notif: 'Anda yakin? Anda Akan ',
		}
	</script>
