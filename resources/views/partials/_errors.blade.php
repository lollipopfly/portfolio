@if($errors->any())
    <div class="row">
        <div class="col-md-12">
    <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="alert alert-danger list-group" role="alert">{{ $error }}</li>
        @endforeach
    </ul>
        </div>
    </div>
@endif