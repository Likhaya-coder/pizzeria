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
                {{ __('Create News') }}
            </h2>
        </x-slot>

        <div class="px-1 px-sm-2 px-xl-5 rounded-3">
            <div class="container-fluid pt-5">
                <h1 class="display-1 fw-bold">HELLO!</h1>
                <h1 class="display-5 fw-bold">Are You Ready To Publish?</h1>
                <P class="pt-3 fs-6 lead muted">Let's attract those customers by writting something cool</P>
            </div>
        </div>

        <div class="container-fluid mb-5">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <form action="{{route('storeNews')}}" method="POST" enctype="multipart/form-data" class="shadow px-5 mt-5">
                        @csrf
                        <div class="form-group pt-5 pb-2">
                            <span class="text-danger">
                                @error('title') {{$message}} @enderror
                            </span>
                            <input type="text" name="title" class="form-control py-3" placeholder="Title" required="true">
                        </div>
                        <div class="form-group pb-2">
                            <span class="text-danger">
                                @error('text') {{$message}} @enderror
                            </span>
                            <textarea type="text" name="text" class="form-control pb-5" value="Publisher" placeholder="Text"></textarea>
                        </div>
                        <div class="form-group pb-2">
                            <span class="text-danger">
                                @error('author') {{$message}} @enderror
                            </span>
                            <input type="text" name="author" class="form-control py-3" placeholder="Author">
                        </div>
                        <div class="form-group pb-2">
                            <span class="text-danger">
                                @error('image') {{$message}} @enderror
                            </span>
                            <input type="file" name="image" class="form-control py-3 px-3 w-100 border border-1 border-secondary">
                        </div>
                        <button type="submit" class="btn w-100 btn-lg btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#message">Publish</button>
                    </form>
                </div>
            </div>
        </div>

        @if(session('message'))
        <div class="container-fluid w-100">
            <div class="row">
                <div class="col-12">
                    <div class="modal fade my-2" tabindex="-1" role="dialog" id="message">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content rounded-6 shadow">
                            <div class="modal-header border-bottom-0">
                                foreach ($pizzas as $pizza)
                                    <h5 class="modal-title">$pizza->name</h5>
                                endforeach
                                <h1 class="modal-title text-center fw-bold">Pizzerian Foods</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-success py-0">
                                <h3>{{session('message')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </x-app-layout>
</body>
</html>
