<form action="{{ url('/consultants') }}" method="Post" enctype="multipart/form-data" id="form">
    {{ csrf_field()}}
    <div class='col-md-12'>
        @include("consultants.form")


    </div>
</form>