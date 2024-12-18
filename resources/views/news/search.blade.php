@extends('layouts.newsLayout')
@section('content')
    <div class="container">
        @foreach ($results as $result)
            <div class="row">
                <div class="col-12 col-md-8">
                    <img class="rounded mt-5" src="{{asset('images/' . $result->image_name)}}" width="100%" height="30%" alt="">
                    <h3 class="pt-5 border-2 text-uppercase">{{$result->title}}</h3>
                    <p class="text-muted">{{$result->text}}</p>
                    <h4>Author: {{$result->author}}</h4>
                    <h5 class="mb-5">Date and Time posted: {{$result->created_at}}</h5>
                    <hr>
                </div>
            </div>
        @endforeach
    </div>
    <div class="side__bar col-12 col-md-4 position-fixed d-none d-md-block">
        <div class="bg-light news__bg text-dark p-3 rounded">
            <div class="">
                <h3 class="display-6">Heading</h3>
                <p class="mb-5">Lorem, dicta accusamus, facilis repudiandae vero, accusantium suscipit aliquam dolores perspiciatis expedita labore deleniti velit. Voluptatum quia nihil consequatur soluta omnis reiciendis id illo dignissimos maiores commodi aliquam, iusto dolorem officiis? Obcaecati debitis mollitia sit at error id sequi placeat temporibus autem itaque sint molestiae odio est, pariatur quam rem quaerat,  nihil?</p>
            </div>

            <h3 class="mt-5 display-6">Heading</h3>
            <p>consectetur adipisicing elit. Aperiam cumque nemo necessitatibus qui. Vitae laudantium quisquam veniam quis! Saepe, distinctio culpa cupiditate autem quis ad repudiandae amet officiis quas. Vel, eligendi quos nostrum sit dolore quo laudantium ipsum? Placeat nisi quidem minus voluptatibus natus, officiis possimus ab magnam repellendus minima?.</p>
        </div>
    </div>
@endsection
