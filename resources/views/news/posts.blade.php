<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!--Bootstrap Files-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Delete The Posts') }}
            </h2>
        </x-slot>
        @if(Session::has('deleted'))
            <div class="alert alert-success text-center">
                <h3>{{Session::get('deleted')}}</h3>
            </div>
        @endif
        <div class="container pt-5">
            <div class="row text-center">
                <div class="col-md-8 col-sm-12 offset-md-2">
                    <table class="table table-light shadow">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>News Title</th>
                                <th>Delete Post</th>
                            </tr>
                        </thead>
                        @forelse ($newsPosts as $newsPost)
                            <tbody>
                                <tr>
                                    <td>{{$newsPost->id}}</td>
                                    <td>{{$newsPost->title}}</td>
                                    <td><a class="btn btn-danger btn-sm" href="/news/delete/{{$newsPost->id}}">Delete Post</a></th>
                                </tr>
                            </tbody>
                            @empty
                            <p style="position: absolute; top: 290px; left: 50%; font-weight: 700; font-size: 20px; transform: translateX(-50%);">Sorry there are no posts in the database</p>
                            <p style="position: relative; border-bottom: 1px solid #999; top: 200px; width: 100%;"></p>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
