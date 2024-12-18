@extends('layouts.layout')
@section('content')
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
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" data-interval="100" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/gallery4.jpg" class="w-100" alt="">
                <div class="container">
                    <div class="carousel-caption text-center">
                    <h1>Pizza,</h1>
                    <h1>Magherita, Meaty and More</h1>
                    <p>Place your order now. You can fetch it from our store or we can deliver it for you.</p>
                    <p>Your Choice, Your Money</p>
                    <div class="d-flex justify-content-center">
                        <p><a class="btn btn-lg btn-danger me-2" data-bs-toggle="modal" data-bs-target="#modalSheet" href="#">Place your order</a></p>
                        <p><a class="btn btn-lg btn-danger" href="/orders/gallery">View Gallery</a></p>
                    </div>
                </div>
                </div>
            </div>
            <div class="carousel-item">
            <img src="/images/gallery29.jpg" class="w-100" alt="">
            <div class="container">
                <div class="carousel-caption text-center">
                    <h1>Burger,</h1>
                    <h1>Beef pasty, Classic royale and More</h1>
                    <p>Place your order now. You can fetch it from our store or we can deliver it for you.</p>
                    <p>Your Choice, Your Money</p>
                    <div class="d-flex justify-content-center">
                        <p><a class="btn btn-lg btn-danger me-2" data-bs-toggle="modal" data-bs-target="#modalSheet" href="#">Place your order</a></p>
                        <p><a class="btn btn-lg btn-danger" href="/orders/gallery">View Gallery</a></p>
                    </div>
                </div>
            </div>
            </div>
            <div class="carousel-item">
            <img src="/images/gallery38.jpg" class="w-100" alt="">
            <div class="container">
                <div class="carousel-caption text-center">
                    <h1>Drinks,</h1>
                    <h1>Fizzy, Juice and Wines</h1>
                    <p>Place your order now. You can fetch it from our store or we can deliver it for you.</p>
                    <p>Your Choice, Your Money</p>
                    <div class="d-flex justify-content-center">
                        <p><a class="btn btn-lg btn-danger me-2" data-bs-toggle="modal" data-bs-target="#modalSheet" href="#">Place your order</a></p>
                        <p><a class="btn btn-lg btn-danger" href="/orders/gallery">View Gallery</a></p>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid w-100">
        <div class="row">
            <div class="col-12">
                <div class="modal fade my-2 bg-" tabindex="-1" role="dialog" id="modalSheet">
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
                                <button type="submit" id="orderButton" class="btn btn-lg btn-danger w-100 mx-0 mb-2">Place Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
        </div>
    </div>

    <div class="container-fluid w-100">
        <div class="row">
            <div class="col-12">
                <div class="modal fade my-2" tabindex="-1" role="dialog" id="message">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content rounded-6 shadow">
                        <div class="modal-header border-bottom-0">
                            <h1 class="modal-title text-center fw-bold">Pizzerian Foods</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-success py-0">
                            <h3>{{session('stored')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h3 class="display-4 fw-bold">We make the Best Pizza in your town</h3>
                    <p class="fs-4 text-muted fw-light pt-3">Fusce fringilla tincidunt laoreet volutpat cras varius sit. metus vitae diam mauris.</p>
                    <p class="text-muted py-3">Sed in metus libero. Sed volutpat eget dui ut tempus. Fusce fringilla tincidunt laoreet Morbi ac metus vitae diam scelerisque malesuada eget eu mauris.
                        Cras varius lorem ac velit pharetra, non scelerisque mi vulputate. Phasellus bibendum.
                    </p>
                    <a href="#" class="btn btn-danger btn-lg">Know more about us</a>
                </div>

                <div class="col-6 col-lg-3 mt-5">
                    <div class="bg-light py-3 px-2 mb-4">
                        <p class="rounded-circle bg-dark text-light fs-3 d-inline p-2 mb-2"><i class="fas fa-pizza-slice"></i></p>
                        <p class="fw-bold fs-4 border-box">Right food baked with natural ingredient</p>
                    </div>

                    <div class="bg-light py-3 px-2">
                        <p class="rounded-circle bg-dark text-light fs-3 d-inline p-2 mb-2"><i class="fa fa-graduation-cap"></i></p>
                        <p class="fw-bold fs-4 border-box">World’s best Chef and Nutritionist!</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3 mt-5">
                    <div class="bg-light py-3 px-2 mb-4">
                        <p class="rounded-circle bg-dark text-light fs-3 d-inline p-2 mb-2"><i class="fas fa-hamburger"></i></p>
                        <p class="fw-bold fs-4 border-box">The use of natural best quality products by far</p>
                    </div>

                    <div class="bg-light py-3 px-2">
                        <p class="rounded-circle bg-dark text-light fs-3 d-inline p-2 mb-2"><i class="fas fa-motorcycle"></i></p>
                        <p class="fw-bold fs-4 border-box">Fastest delivery on your door step</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 bg-light">
        <div class="container pt-3">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <h3>Choose what you want, select a pick up time</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Assumenda perferendis in expedita hic sapiente! Aspernatur pariatur consequuntur suscipit placeat nemo!
                    </p>
                    <a href="#" class="btn btn-lg btn-danger mb-5" data-bs-toggle="modal" data-bs-target="#modalSheet">Order online</a>
                </div>
                <div class="col-12 col-lg-4">
                    <h3>Earn points every time you order online</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore reiciendis saepe enim odio laboriosam nostrum
                        illo nesciunt repellat totam. Molestias.
                    </p>
                    <a href="#" class="btn btn-lg btn-danger mb-5">Learn more</a>
                </div>
                <div class="col-12 col-lg-4">
                    <img src="/images/a1.jpg" alt="" class="w-100">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container pt-3">
            <div class="row text-center">
                <div class="col-12 col-md-6 offset-md-3">
                    <p class="fs-3">Special Combo</p>
                    <h1><strong>Our Delicious Pizza</strong></h1>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-12 col-md-6 col-lg-3 bg-light d-price">
                    <div class="text-center p-3">
                        <p class="fw-bold fs-3">Margherita</p>
                        <p class="fs-6 text-muted">Tomato souce, Mozzarella and oregano</p>
                        <p class="fw-bold">R309</p>
                        <a href="#" class="btn btn-lg btn-danger my-3" data-bs-toggle="modal" data-bs-target="#modalSheet">Order online</a>
                        <img src="/images/thumbs/gallery1.jpg" class="w-100 rounded" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 bg-light d-price">
                    <div class="text-center p-3">
                        <p class="fw-bold fs-3">Carbonara</p>
                        <p class="fs-6 text-muted">Tomato souce, eggs and bacon tomato</p>
                        <p class="fw-bold">R180</p>
                        <a href="#" class="btn btn-lg btn-danger my-3" data-bs-toggle="modal" data-bs-target="#modalSheet">Order online</a>
                        <img src="/images/thumbs/gallery2.jpg" class="w-100 rounded" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 bg-light d-price">
                    <div class="text-center p-3">
                        <p class="fw-bold fs-3">Creamy Chicken</p>
                        <p class="fs-6 text-muted">Onion rings, garlic, rosemary, and tomato</p>
                        <p class="fw-bold">R280</p>
                        <a href="#" class="btn btn-lg btn-danger my-3" data-bs-toggle="modal" data-bs-target="#modalSheet">Order online</a>
                        <img src="/images/thumbs/gallery6.jpg" class="w-100 rounded" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 bg-light d-price">
                    <div class="text-center p-3">
                        <p class="fw-bold fs-3">Creamy Veg</p>
                        <p class="fs-6 text-muted">Onion rings, garlic, rosemary, and tomato</p>
                        <p class="fw-bold">R160</p>
                        <a href="#" class="btn btn-lg btn-danger my-3" data-bs-toggle="modal" data-bs-target="#modalSheet">Order online</a>
                        <img src="/images/thumbs/gallery9.jpg" class="w-100 rounded" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
