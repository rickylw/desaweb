
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('assets/css/login.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Login Page</title>
</head>
<body>
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row bg-success mx-auto main-content">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
				<h4 class="company_title">Your Company Logo</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row text-center">
						<h2 class="mb-3 mt-2">Register</h2>
					</div>
					<div class="row">
						<form class="form-group" action="{{route('register.simpan')}}" method="POST">
							@csrf
							@method('POST')
							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="Username">
							</div>
							<div class="row">
								<input type="password" name="password" id="password" class="form__input" placeholder="Password">
							</div>
							<div class="row">
								<input type="password" name="passwordConfirmation" id="passwordConfirmation" class="form__input" placeholder="Konfirmasi Password">
							</div>
							<div class="row">
								<input type="text" name="nik" id="nik" class="form__input" placeholder="NIK">
							</div>
							<div class="row">
								<input type="text" name="nama" id="nama" class="form__input" placeholder="Nama">
							</div>
							<div class="row">
								<input type="text" name="alamat" id="alamat" class="form__input" placeholder="Alamat">
							</div>
							<div class="row">
								<input type="text" name="nohp" id="nohp" class="form__input" placeholder="No hp">
							</div>
							<div class="row">
								<input type="email" name="email" id="email" class="form__input" placeholder="Email">
							</div>
							<div class="row">
								<button class="btnLogin" type="submit">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    
</body>