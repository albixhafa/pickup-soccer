<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PickupSoccer.net</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('libsfront/styles.css?=v5')}}" />

  </head>

  <body>
  <div class="container">
    <br>
    <div class="row">
      <div class="col-md-12">
          <div class="btn-group pull-right">
            <a type="button" class="btn btn-lg btn-primary" href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
            <a type="button" class="btn btn-lg btn-primary" href="/post"><i class="fa fa-futbol-o" aria-hidden="true"></i></a>
            <a type="button" class="btn btn-lg btn-primary" href="/profile"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
            <a type="button" class="btn btn-lg btn-danger" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
          </div>
            <a href="/"><img class="img-circle" height="60px" width="60px" src="{{Auth::user()->photo ? Auth::user()->photo->path : 'https://pickupsoccer.net/images/user.png'}}" alt=""></a>
            <span><b>{{Auth::user()->username}}</b></span>
      </div>
    </div>
  </div>
  <br/>
    <!-- Page Content -->
  <div class="container">
		  @yield('content')
    </div>
  </body>

</html>
