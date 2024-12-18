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
<body >
    <x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pizza List') }}
        </h2>
    </x-slot>
    <div class="container bg-dark text-light">
        <div class="row text-center">
            <div class="col-12 col-md-4 col-xl-4">
                <div>
                    <h3 class="py-3">PIZZERIA FOODS</h3>
                    <p class="">0000 Westbourne RD</p>
                    <p class="">Port Elizabeth Central</p>
                    <p class="">Gqeberha</p>
                    <p class="">0000</p>
                </div>
            </div>
            <div class="col-12 col-md-4 col-xl-4">
                <div>
                    <h1 class="fw-bold d-flex text-light justify-center my-10 display-4">PIZZERIA FOODS</h1>
                </div>
            </div>
            <div class="col-12 col-md-4 col-xl-4">
                <div>
                    <h3 class="py-3">CONTACT NO</h3>
                    <p class="">Mobile No: <a href="#">081 000 0000</a></p>
                    <p class="">Whatsapp: <a href="#">081 000 0000</a></p>
                    <p class="">Facebook: <a href="#">Pizzerian Foods</a></p>
                    <p class="">Email: <a href="#">pizzeria.admin@accounts.com</a></p>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="container bg-light">
            <div class="col-12 d-flex justify-content-between">
                <div>
                    <p class="h2 fw-bold mb-3 uppercase pt-5">Order Summary</p>
                    <h4 class="font font-medium border border-1 d-inline bg-white p-2 uppercase shadow-md">
                        @foreach ($results as $result)
                        {{$result->full_names . "'s"}} Order
                        @endforeach
                    </h4>
                </div>
                <div>
                    <p class="text-dark pt-5">{{$results->street}}<p>
                    <p class="text-dark justify-end">{{$results->town}}<p>
                    <p class="text-dark justify-end">{{$results->city}}<p>
                    <p class="text-dark justify-end">{{$results->postalCode}}<p>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Food_type</th>
                        <th scope="col">Dish_name</th>
                        <th scope="col">Extra_toppings</th>
                        <th scope="col">Removed_toppings</th>
                        <th scope="col">Drink_type</th>
                        <th scope="col">Drink_name</th>
                        <th scope="col">Delivery</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            {{$results->id}}
                        </td>
                        <td>
                            @foreach ($results->food_type as $pizzaType)
                                {{$pizzaType}}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($results->dish_name as $dishName)
                                {{$dishName}}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($results->extra_toppings as $toppings)
                                {{$toppings}},
                            @endforeach
                        </td>
                        <td>
                            @foreach ($results->removed_toppings as $removed)
                                {{$removed}},
                            @endforeach
                        </td>
                        <td>
                            @foreach ($results->drink_type as $drinkType)
                                <li class="list-unstyled">{{$drinkType}}</li>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($results->drink_name as $drinkName)
                                <li class="list-unstyled">{{$drinkName}}</li>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($results->delivery as $delivery)
                                <li class="list-unstyled">{{$delivery}}</li>
                            @endforeach
                        </td>
                        </tr>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
    </x-app-layout>
</body>
</html>
