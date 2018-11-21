@if($errors->any())
    <div class="row">
        <div class="col-6 offset-3">
            <ul class="alert alert-danger">
            @foreach ($errors as $error)
                @include('partials.error', ['error' => $error])
            @endforeach
            </ul>
        </div>
    </div>
@endif