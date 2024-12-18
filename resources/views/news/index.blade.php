@extends('layouts.layout')
@section('content')
    @if(Session::has('publish'))
    <div class="alert alert-success">
        <h3>{{Session::get('publish')}}</h3>
    </div>
    @endif
    <div class="container mt-5 ">
        <div class="row py-3">
            <div class="col-12 col-md-8">
                <h1 class="text-uppercase text-danger"><strong><u>News</u></strong></h1>
                <p class="fs-3 fw-bolder lh-1 pt-5 pb-0">Hello and Welcome!</p><br>
                <p class="fs-5 lh-sm pt-3 text-top">Here we write everything that we want you to know from our new <span class="fw-bolder">specials</span>
                to the <span class="fw-bolder">business changes</span>.</p><br><br>
                <p class="lead lh-1 py-0 text-top">If you want to see more on what we have from our menu click here <a href="/orders/gallery">Menu</a></p>
            </div>
        </div>
        @foreach ($news as $list)
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div>
                        <img class="rounded mt-5" src="{{asset('images/' . $list->image_name)}}" width="100%" height="30%" alt="">
                        <h3 class="pt-5 fw-bold border-2 text-uppercase">{{$list->title}}</h3>
                        <div class="d-flex">
                            <p class="py-3 text-muted me-2">{{$list->created_at}}</p>
                            <a class="py-3 underline-none" href="#">{{$list->author}}</a>
                        </div>
                        <p class="fs-6 lh-sm fw-lighter pb-5">{{$list->text}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                {{$news->links()}}
            </div>
        </div>
    </div>

    <style>
        .w-5 {
            display: none;
        }
        .z-0 {
            display: none;
        }
    </style>

    <div class="side__bar d-none d-block-lg col-lg-4 position-fixed bottom-0 top-0 right-0 d-none d-lg-block">
        <div class="bg-light news__bg text-dark p-3">
            <div class="overlay"></div>
        </div>
    </div>
@endsection
