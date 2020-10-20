<form action="{{ url('/clients') }}" method="Post" enctype="multipart/form-data" id="form">
    {{ csrf_field()}}
    <div class='col-md-12'>
        @include("clients.form")


    </div>
</form>