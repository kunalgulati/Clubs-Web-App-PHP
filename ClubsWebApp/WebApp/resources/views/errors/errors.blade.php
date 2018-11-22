<div class="row">
    <div class="col-6 offset-3">
        <div class="alert alert-danger">
            <p><strong>{{$title}}</strong></p>
                @foreach($errors->all() as $error)
                    @include('partials.error', ['error' => $error])
                @endforeach
        </div>
    </div>
</div>