@extends('layouts.business')

@section('content')

<div class="row">
<div class="col-md-1"></div>

<div class="col-md-10">
        <div class="card shadow">
            <div class="card  shadow">
                <div class="card-body">
                  
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Número</label>
                                    <input type="text" id="input-name" name="number" class="form-control form-control-alternative" require value="{{ isset($consultant->number)?$consultant->number:""}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Nombre</label>
                                    <input type="text" id="input-name" name="first_name" class="form-control form-control-alternative" require value="{{ isset($consultant->first_name)?$consultant->first_name:""}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Apellido</label>
                                    <input type="text" id="input-name" name="last_name" class="form-control form-control-alternative" require value="{{ isset($consultant->last_name)?$consultant->last_name:""}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Telefono</label>
                                    <input type="text" id="input-name" name="phone" class="form-control form-control-alternative" require value="{{ isset($consultant->phone)?$consultant->phone:""}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Email</label>
                                    <input type="email" id="input-name" name="email" class="form-control form-control-alternative" require value="{{ isset($consultant->email)?$consultant->email:""}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Dirección</label>
                                <textarea class="form-control" name="address">{{ isset($consultant->address)?$consultant->address:""}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-name">Comentarios</label>
                                    <textarea class="form-control" name="comments">{{ isset($consultant->comments)?$consultant->comments:""}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-control-label" for="input-name">Imagen</label>

                                @if(isset($consultant->imageUrl))<br>

                                    <div class="card-profile-image">
                                        <label for="imageUrl">
                                            <img src="{{asset($consultant->imageUrl)}}" id="imgimageUrl" class="">
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
                        <a href="{{ url('consultants')}}" class='btn btn-primary btn-md'>Cancelar</a>
                        <input type="submit" id="btnSave" class='btn btn-success btn-md' value="Guardar">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection