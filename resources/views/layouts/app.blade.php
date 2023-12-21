<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>laravel crud</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="">
  

    

<nav class="navbar navbar-expand-sm bg-dark">

  

  <!-- Links -->
  <ul class="navbar-nav px-5">
    <li class="nav-item">
      <a class="nav-link text-light" href="/">Employees</a>
    </li>
    
  </ul>

</nav>
@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <strong>{{$message}}</strong>
</div>
@endif

    @yield('main')    
    
</body>
</html>