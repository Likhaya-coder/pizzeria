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
                {{ __('Order List') }}
            </h2>
        </x-slot>
        @if(Session::has('deleted'))
            <div class="alert alert-success text-center">
                <h3>{{Session::get('deleted')}}</h3>
            </div>
        @endif

        @if(Session::has('message'))
            <div class="alert alert-success text-center">
                <h3>{{Session::get('message')}}</h3>
            </div>
        @endif

        @if(Session::has('stored'))
            <div class="alert alert-success text-center">
                <p>{{Session::get('stored')}}</p>
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger text-center">
                <p>{{Session::get('error')}}</p>
            </div>
        @endif

        <div class="px-1 px-sm-2 px-xl-5 rounded-3">
            <div class="container-fluid pt-5">
                <h1 class="display-1 fw-bold">HELLO!</h1>
                <h1 class="display-5 fw-bold">Ready To Manage Orders?</h1>
                <P class="pt-3 fs-6 lead muted">Let's process these orders because customers are hungry</P>
            </div>
        </div>
    <div id="add_product">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-12 py-3">
                    <a class="btn btn-secondary btn-lg" href="/orders/create/" data-bs-toggle="modal" data-bs-target="#modalSheet">Add Order</a>
                </div>
            </div>
        </div>
    </div>
    <div id="product__table" class="container">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Name</th>
                    <th>created_at</th>
                    <th>View</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            @forelse ($orders as $order)
                <tbody>
                    <tr class="text-center">
                        <th>{{$order['id']}}</th>
                        <th>{{$order['full_names']}}</th>
                        <th>{{$order['created_at']}}</th>
                        <th><a class="btn btn-info btn-sm" href="/orders/show/{{$order['id']}}">View Order</a></th>
                        <th><a class="btn btn-success btn-sm" href="/orders/delete/{{$order['id']}}">Complete Order</a></th>
                        <th><a class="btn btn-primary btn-sm" href="/orders/edit/{{$order['id']}}">Modify Order</a></th>
                    </tr>
                </tbody>
                @empty
                <p style="position: absolute; top: 250px; left: 40%; font-weight: 700; font-size: 20px;">Sorry there are no orders in the database</p>
                <p style="position: relative; border-bottom: 1px solid rgb(228, 218, 218); top: 200px; width: 100%;"></p>
            @endforelse
        </table>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                {{$orders->links()}}
            </div>
        </div>
    </div>

    <div class="modal fade my-2" tabindex="-1" role="dialog" id="modalSheet">
        <div class="modal-dialog" role="document">
        <div class="modal-content rounded-6 shadow bg__order">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">Place your order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
            <form action="{{route('storeOrder')}}" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card bg__order__card">
                                <div class="card-body text-light">
                                    <span class="text-danger">
                                        @error('names') {{$message}} @enderror
                                    </span>
                                    <input type="text" class="form-control" name="names" placeholder="Full Names" required="required" autocomplete="autofocus"><br>

                                    Choose the type of food you want
                                    <span class="text-danger">
                                        @error('foodType') {{$message}} @enderror
                                    </span>
                                    <select name="foodType[]" class="form-control" required="required" autocomplete="autofocus">
                                        <option>Select...</option>
                                        <option>Pizza</option>
                                        <option>Burger</option>
                                    </select><br>

                                    Choose the dish you want
                                    <select name="dishName[]" class="form-control" required="required" autocomplete="autofocus">
                                        <option>Select...</option>
                                        <option class="text-muted" disabled="true">PIZZAS</option>
                                        <option value="Magherita">Magherita</option>
                                        <option value="CreamyVeg">Creamy Veg</option>
                                        <option value="Meaty">Meaty</option>
                                        <option value="Creamy Chicken">Creamy Chicken</option>
                                        <option value="Sweet Chilli Checken">Sweet Chilli Checken</option>
                                        <option value="Meaty Tripple-decker">Meaty Tripple-decker</option>
                                        <option value="CreamyChickenTriple-decker">Creamy Chicken Triple-decker</option>
                                        <option value="Sweet Chilli Checken Triple-decker">Sweet Chilli Checken Triple-decker</option>
                                        <option value="Haweian">Hawian</option>
                                        <option class="text-muted" disabled="true">BURGERS</option>
                                        <option value="Cheese">Cheese burger</option>
                                        <option value="Creamy Veg">Creamy Veg burger</option>
                                        <option value="Classic Royale">Classic Royale</option>
                                        <option value="Baxter">Baxter</option>
                                        <option value="Beef Pasty">Beef Pasty</option>
                                        <option value="Caramelised">Caramelised burger</option>
                                        <option value="Soya Patty">Soya Patty</option>
                                        <option value="Vegan Cheese">Vegan Cheese burger</option>
                                    </select><br>
                                    <div class="Radio-button">
                                        Delivery
                                        <div class="container d-flex" required="required" autocomplete="autofocus">
                                            <input type="radio" class="form-check-input me-1" value="Yes" onclick="showLocation()" name="delivery[]"><br>
                                            <label class="form-check-label me-4">Yes</label>
                                            <input type="radio" class="form-check-input me-1" value="No" onclick="hideLocation()" name="delivery[]"><br>
                                            <label class="form-check-label">No</label>
                                        </div>
                                    </div><br>
                                    <div class="col-lg-12 d-flex justify-space-between w-100">
                                        <legend>
                                            <label class="form-label fw-normal">Extra Toppings:</label> <br>
                                            <input type="checkbox" id="extras" class="ml-4" onclick="ExtraTopBtnClick()"> <label class="toppings fs-6">Extras</label> <br>
                                            <div class="toggleExtras px-5">
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Cheese"> <label class="toppings fs-6">Cheese</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Bacon"> <label class="toppings fs-6">Bacon</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Tomato"> <label class="toppings fs-6">Tomato</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Onions"> <label class="toppings fs-6">Onions</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Green Peppers"> <label class="toppings fs-6">Green Pepper</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Ground Beef"> <label class="toppings fs-6">Ground beef</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Ham"> <label class="toppings fs-6">Ham</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Mexican Souce"> <label class="toppings fs-6">mexican Souce</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Mushroom"> <label class="toppings fs-6">Mushroom</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Olives"> <label class="toppings fs-6">Olives</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Pineapple"> <label class="toppings fs-6">Pineapple</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Pepperoni"> <label class="toppings fs-6">Pepperoni</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Spring Onion"> <label class="toppings fs-6">Spring Onion</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Sweet Bell Souce"> <label class="toppings fs-6">Sweet Bell Pepper</label> <br>
                                                <input type="checkbox" class="ml-4" name="toppings[]" value="Sweet Chilli Souce"> <label class="toppings fs-6">Sweet Chilli Souce</label> <br>
                                            </div>
                                        </legend>
                                    </div>
                                    <div class="col-lg-6 d-flex w-100">
                                        <legend>
                                            <label class="form-label fw-normal">Remove toppings:</label> <br>
                                            <input type="checkbox" class="ml-4" name="removeToppings[]" value="Cheese"> <label class="toppings fs-6">Cheese</label> <br>
                                            <input type="checkbox" class="ml-4" name="removeToppings[]" value="Green Pepper"> <label class="toppings fs-6">Green Pepper</label> <br>
                                            <input type="checkbox" class="ml-4" name="removeToppings[]" value="Mushroom"> <label class="toppings fs-6">Mushroom</label> <br>
                                            <input type="checkbox" class="ml-4" name="removeToppings[]" value="Olives"> <label class="toppings fs-6">Olives</label> <br>
                                            <input type="checkbox" class="ml-4" name="removeToppings[]" value="Bacon"> <label class="toppings fs-6">Bacon</label> <br>
                                            <input type="checkbox" class="ml-4" name="removeToppings[]" value="Pineapple"> <label class="toppings fs-6">Pineapple</label> <br>
                                            <input type="checkbox" class="ml-4" name="removeToppings[]" value="Pepperoni"> <label class="toppings fs-6">Pepperoni</label> <br>
                                            <input type="checkbox" class="ml-4" name="removeToppings[]" value="Tomato"> <label class="toppings fs-6">Tomato</label> <br>
                                        </legend>
                                    </div>
                                    <div class="col-lg-6 d-flex w-100">
                                        <legend>
                                            <label class="form-label fw-normal">Drink:</label>
                                            <!-- =================== FIZZY DRINKS ===================== -->
                                            <div class="d-flex">
                                                <input type="radio" id="fizzyRad" class="form-radio-input me-1 mt-2" onclick="FizzyBtnClick()" value="Fizzy" name="drinkType[]" required="required" autocomplete="autofocus">
                                                <label class="form-check-label fs-6 me-4 mt-2">Fizzy</label>
                                            </div>
                                            <div class="CollapseFizzyDrinks px-5">
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="FantaOrange" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Fanta Orange</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="FantaPine" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Fanta Pine</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Sprite" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Sprite</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Ginger" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Ginger</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Coke" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Coke</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="CokeZero" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Coke Zero</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="IronBrew" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Iron Brew</label>
                                                </div>
                                            </div>

                                            <!-- =================== JUICE DRINKS ===================== -->
                                            <div class="d-flex">
                                                <input type="radio" id="juiceRad" class="form-radio-input me-1 mt-2" onclick="JuiceBtnClick()" value="Juice" name="drinkType[]" required="required" autocomplete="autofocus">
                                                <label class="form-check-label fs-6 me-4 mt-2">Juice</label>
                                            </div>
                                            <div class="CollapseJuiceDrinks px-5">
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Orange" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Orange</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Strawberry" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Strawberry</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Cren Berry" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Cren Berry</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Pineapple" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Pineapple</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Apple" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Apple</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Lemon" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Lemon</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Guava" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Guava</label>
                                                </div>
                                            </div>

                                            <!-- =================== WINE DRINKS ===================== -->
                                            <div class="d-flex">
                                                <input type="radio" id="wineRad" class="form-radio-input me-1 mt-2" onclick="WineBtnClick()" value="Wine" name="drinkType[]" required="required" autocomplete="autofocus">
                                                <label class="form-check-label fs-6 me-4 mt-2">Wine</label>
                                            </div>
                                            <div class="CollapseWineDrinks px-5">
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Mayacamas" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Mayacamas Wine</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Hermann" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Hermann</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Vina Vik" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Vina Vik</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Ramnista" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Ramnista</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Delamotte" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Delamotte</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Damilano" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Damilano</label>
                                                </div>
                                                <div class="d-flex">
                                                    <input type="radio" class="form-radio-input me-1 mt-2" value="Poliziano" name="drinkName[]" required="required" autocomplete="autofocus">
                                                    <label class="form-check-label fs-6 me-4 mt-2">Poliziano</label>
                                                </div>
                                            </div>
                                        </legend>
                                    </div>
                                    <div class="container-fluid border border-solid address py-3">
                                        <div class="row">
                                            <div class="col-12">
                                                Address: <br>
                                                <span class="text-danger">
                                                    @error('street') {{$message}} @enderror
                                                </span>
                                                <input type="text" name="street" class="form-control mb-2" placeholder="Enter street address" autocomplete="autofocus">
                                                <span class="text-danger">
                                                    @error('town') {{$message}} @enderror
                                                </span>
                                                <input type="text" name="town" class="form-control mb-2" placeholder="Enter town that you live in" autocomplete="autofocus">
                                                <span class="text-danger">
                                                    @error('city') {{$message}} @enderror
                                                </span>
                                                <input type="text" name="city" class="form-control mb-2" placeholder="Enter city you live in" autocomplete="autofocus">
                                                <span class="text-danger">
                                                    @error('code') {{$message}} @enderror
                                                </span>
                                                <input type="text" name="code" class="form-control" placeholder="enter your postal code" autocomplete="autofocus">
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Column-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal-footer flex-column border-top-0">
                    <button type="submit" class="btn btn-lg btn-danger w-100 mx-0 mb-2">Place Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </x-app-layout>
</body>
</html>