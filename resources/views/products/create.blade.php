<form action="{{ url('/products') }}" method="Post" enctype="multipart/form-data" id="form">
    {{ csrf_field()}}
    <div class='col-md-12'>
        @include("products.form")


    </div>
</form>