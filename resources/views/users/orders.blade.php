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

    <!--Javascript files-->
    <script src="/js/FoodOrder.js"></script>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
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
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--This forEach statement is an array to get all the column inside the orders table-->
                        @forelse ($userOrders as $userOrder)
                        <tr>
                            <td>{{$userOrder->id}}</td>

                            <td>
                            <!--This inner forEach statements is an array as well
                         but its only grabbing the each column inside the order table-->
                                @foreach ($userOrder->food_type as $order)
                                    {{$order}}
                                @endforeach
                            </td>

                            <td>
                                @foreach ($userOrder->dish_name as $order)
                                    {{$order}}
                                @endforeach
                            </td>

                            <td>
                                @foreach ($userOrder->extra_toppings as $order)
                                    {{$order}}
                                @endforeach
                            </td>

                            <td>
                                @foreach ($userOrder->removed_toppings as $order)
                                    {{$order}}
                                @endforeach
                            </td>

                            <td>
                                @foreach ($userOrder->drink_type as $order)
                                    {{$order}}
                                @endforeach
                            </td>

                            <td>
                                @foreach ($userOrder->drink_name as $order)
                                    {{$order}}
                                @endforeach
                            </td>

                            <td>
                                @foreach ($userOrder->delivery as $order)
                                    {{$order}}
                                @endforeach
                            </td>

                            <td>{{$userOrder->status}}</td>
                            <th scope="col"><a href="/user/order/action/{{$userOrder->id}}" class="btn btn-danger">Cancel</a></th>
                        </tr>
                        @empty
                            <p style="position: absolute; top: 260px; left: 38%; font-weight: 700; font-size: 20px;">You have not made any order yet</p>
                            <p style="position: relative; border-bottom: 1px solid #999; top: 200px; width: 100%;"></p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </x-app-layout>
</body>
</html>
