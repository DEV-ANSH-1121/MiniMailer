
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="MiniMalier is a simple mailing app.">
        <meta name="author" content="">
        <link rel="icon" href="{{ url('/images/favicon.png') }}">

        <title>MiniMailer Login</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-signin" method="post" action="{{ route('auth.login') }}">
            @csrf
            <img class="mb-4" src="{{ url('/images/logo.png') }}" alt="MiniMailer Logo" width="150" height="150">
            <h1 class="h3 mb-3 font-weight-normal">Welcome To Mini Mailer</h1>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Enter your email to continue" required autofocus>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Continue</button>
            <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
        </form>
    </body>
</html>
