@extends('layouts.business')

@section('content')

<div class="row justify-content-center">

<div class="col-md-10">
        <div class="card shadow">
            <div class="card  shadow">
                <div class="card-body">
                  
                    <div class="col-lg-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Nombre</label>
                                    <input type="text" id="input-name" name="first_name" class="form-control form-control-alternative" require value="{{ isset($company->name)?$company->name:""}}">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <label class="form-control-label" for="input-name">Imagen</label>

                                @if(isset($client->imageUrl))<br>

                                    <div class="card-profile-image">
                                        <label for="imageUrl">
                                            <img src="{{asset($client->imageUrl)}}" id="imgimageUrl" class="">
                                        </label>
                                    </div><br>

                                    <input type='file' name="imageUrl" id="imageUrl" class='form-control-file'
                                        style="display:none">
                                @else
                                    <div class="card-profile-image">
                                        <label for="imageUrl">
                                            <img id="imageUrl" class="rounded-circle">
                                        </label>
                                    </div>
                                    <input type='file' name="imageUrl" id="imageUrl" class='form-control-file'>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="{{ url('clients')}}" class='btn btn-primary btn-md'>Cancelar</a>
                        <input type="submit" id="btnSave" class='btn btn-success btn-md' value="Guardar">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection