@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row text-uppercase pt-5 text-danger">
                <div class="col-12">
                    <h1><strong><u>Contact Us</u></strong></h1>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12">
                    <h1 class="text-center"><strong>Get in touch</strong></h1>
                    <p class="lead fw-normal fs-6 lh-sm pt-3"><strong class="fs-3">You want to here more from us?</strong><br>
                        Please do get in touch we would love to here from you. <br><br> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reprehenderit autem nemo itaque culpa veniam dolore temporibus sed quia quibusdam ad? Tempora sed totam sequi id autem
                        nam voluptatem velit unde facilis tempore? Pariatur omnis, obcaecati quibusdam distinctio ipsam illum delectus assumenda
                        numquam quasi ipsum error vel adipisci voluptates similique alias rerum possimus. Amet odio accusantium possimus
                        architecto corrupti aperiam at.
                    </p>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-12 col-lg-6">
                    <h3 class="py-3"><strong>We are here for you</strong></h3>
                    <p class="text-muted">Sequi doloribus distinctio, possimus ut corrupti facilis odit, ducimus aut aliquid dicta beatae
                    numquam sed odio impedit quas, deleniti neque veritatis sunt.</p>
                    <h5><strong>Email:</strong></h5>
                    <p class="text-muted">pizzeria.admin@accounts.com</p>
                    <h5><strong>Address:</strong></h5>
                    <p class="text-muted">0000 Westbourne RD, Port Elizabeth Central, Gqeberha, 0000</p>
                    <h5><strong>Contact:</strong></h5>
                    <a href="#" class="mb-5 text-muted d-block text-decoration-none text-dark">+27 81 000 0000</a>
                </div>
                <div class="col-12 col-lg-6">
                    <form action="" method="GET">
                        <input type="text" class="form-control py-3 my-3" placeholder="Your Name*" required>
                        <input type="email" class="form-control py-3 my-3" placeholder="Your Email*" required>
                        <input type="text" class="form-control py-3 my-3" placeholder="Subject*" required=>
                        <textarea type="text" class="form-control py-3 my-3" placeholder="Type your message here*" required></textarea>
                        <button type="submit" class="btn btn-lg btn-danger py-3">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
