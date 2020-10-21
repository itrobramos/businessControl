<form action="{{ url('/consultants/' . $consultant->id) }}" method="Post" enctype="multipart/form-data">
    {{ csrf_field()}}
    {{ method_field('PATCH')}}

    <div class='col-md-12'>
        @include("consultants.form")


    </div>


</form>