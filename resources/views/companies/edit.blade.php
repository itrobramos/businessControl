<form action="{{ url('/companies/' . $Company->id) }}" method="Post" enctype="multipart/form-data">
    {{ csrf_field()}}
    {{ method_field('PATCH')}}

    <div class='col-md-12'>
        @include("companies.form")


    </div>


</form>