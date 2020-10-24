<form action="{{ url('/products/' . $product->id) }}" method="Post" enctype="multipart/form-data">
    {{ csrf_field()}}
    {{ method_field('PATCH')}}

    <div class='col-md-12'>
        @include("products.form")


    </div>


</form>