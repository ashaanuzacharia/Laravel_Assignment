<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="ninodezign.com, ninodezign@gmail.com">
	<meta name="copyright" content="ninodezign.com"> 
	<title>Mogo | OnePage Responsive Theme</title>
	
	<!-- favicon -->
    <link rel="shortcut icon" href="images/ico/favicon.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/materialdesignicons.min.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.min.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/prettyPhoto.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/unslider.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/template.css" />
	
</head>
<body data-target="#nino-navbar" data-spy="scroll">
    
       <!-- javascript -->
        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>	
        <script type="text/javascript" src="../assets/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.hoverdir.js"></script>
        <script type="text/javascript" src="../assets/js/modernizr.custom.97074.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="../assets/js/unslider-min.js"></script>
        <script type="text/javascript" src="../assets/js/template.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <main class="py-4">
            @yield('content')
        </main>
        @stack('js')
    
</body>
</html>
