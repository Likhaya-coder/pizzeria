<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!--Bootstrap Files-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--CSS Styling-->
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/gallery.css">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('User List') }}
          </h2>
      </x-slot>

      @if(Session::has('deleted'))
            <div class="alert alert-success text-center">
                <p>{{Session::get('deleted')}}</p>
            </div>
        @endif

      <div class="px-1 px-sm-2 px-xl-5 rounded-3">
          <div class="container-fluid pt-5">
              <h1 class="display-1 fw-bold">HELLO!</h1>
              <h1 class="display-5 fw-bold">The growth of the business depends on you!</h1>
              <P class="pt-3 fs-6 lead muted">You can start by checking the growth of the site</P>
          </div>
      </div>

      <div id="product__table" class="container">
        <table class="table table-striped">
            <thead>
                <tr class="text-left">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>created_at</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @forelse ($users as $user)
                <tbody>
                    <tr class="text-left">
                        <th>{{$user['id']}}</th>
                        <th>{{$user['name']}}</th>
                        <th>{{$user['email']}}</th>
                        <th>{{$user['created_at']}}</th>
                        <th><a class="btn btn-success btn-sm" href="/users/delete/{{$user['id']}}">remove user</a></th>
                    </tr>
                </tbody>
                @empty
                <p style="position: absolute; top: 250px; left: 40%; font-weight: 700; font-size: 20px;">Sorry there are no orders in the database</p>
                <p style="position: relative; border-bottom: 1px solid rgb(228, 218, 218); top: 200px; width: 100%;"></p>
            @endforelse
        </table>
    </div>
    </x-app-layout>
</body>
</html>
