<div class="px-5 rounded-3">
    <div class="container-fluid pt-5">
    <h1 class="display-5 fw-bold">HELLO MANAGER</h1>
    <P>Manage all your restaurant from here</P>
    </div>
</div>
<table class="table striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
        </tr>
    </thead>
    @forelse ($newsPosts as $newsPost)
        <tbody>
            <tr>
                <th>{{$newsPost->id}}</th>
                <th>{{$newsPost->name}}</th>
                <th><a class="btn btn-success btn-sm" href="/pizzas/delete/{{$newsPost->id}}">Complete Order</a></th>
                <th><a class="btn btn-primary btn-sm" href="/pizzas/edit/{{$newsPost->id}}">Modify Order</a></th>
            </tr>
        </tbody>
        @empty
        <p style="position: absolute; top: 180px; left: 40%; font-weight: 700; font-size: 20px;">Sorry there are no orders in the database</p>
        <p style="position: relative; border-bottom: 1px solid #999; top: 200px; width: 100%;"></p>
    @endforelse
</table>
