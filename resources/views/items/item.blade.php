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
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Item') }}
            </h2>
        </x-slot>

        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible text-center fade show" role="alert">
                <p>{{Session::get('message')}}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
                <p>{{Session::get('error')}}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <span class="text-danger">
                        @error('name') {{$message}} @enderror
                    </span> <br>
                    <span class="text-danger">
                        @error('description') {{$message}} @enderror
                    </span> <br>
                    <span class="text-danger">
                        @error('price') {{$message}} @enderror
                    </span> <br>
                    <span class="text-danger">
                        @error('file') {{$message}} @enderror
                    </span>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Add Product</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('storeItem')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Choose the type of food you want:</label>
                                <select name="foodType[]" class="form-control" required="required" autocomplete="autofocus">
                                    <option>Select...</option>
                                    <option>Pizza</option>
                                    <option>Burger</option>
                                </select>
                                <label for="" class="form-label">Enter name:</label>
                                <input type="text" class="form-control mb-3" name="name">
                                <label for="" class="form-label">Enter description:</label>
                                <textarea name="description" class="form-control mb-3" rows="5"></textarea>
                                <label for="" class="form-label">Enter price:</label>
                                <input type="text" class="form-control mb-3" name="price">
                                <label for="" class="form-label">Select an image:</label>
                                <input type="file" class="form-control mb-3" name="file">
                                <button type="submit" class="btn btn-lg btn-block btn-dark">Save item</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
