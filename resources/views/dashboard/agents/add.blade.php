@extends('layouts.dashboard_layout')


@section('content')
    <div class="row justify-content-center">
        @if(Session::has('success'))
            <div id="alert" class="alert alert-success text-center col-md-12">

                {{Session::get('success')}}
                <span class="pull-right" data-dismiss="alert" aria-label="Close" aria-hidden="true"><i
                            class="fa fa-minus"></i></span>
            </div>
        @endif
        <div class="col-md-12">
            <div class="card card-body">
                <div class="row col-md-11 justify-content-center">
                    <h3 class="box-title m-b-0">Add New Agent</h3>
                    <br><br><br> <br>
                </div>

               <div class="row justify-content-center">
                   <form style="width: 100%" class="form-horizontal" method="POST" action="{{ url('agents') }}">
                       <div class="form-group row">
                           <label for="" class="col-sm-3 text-right control-label col-form-label">Country</label>

                           <div class="col-md-5">
                               <input  type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"   placeholder="" name="country" value="{{ old('country') }}" required> </div>
                           @if ($errors->has('country'))
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                           @endif
                       </div>
                       <div class="form-group row">
                           <label for="" class="col-sm-3 text-right control-label col-form-label">Name</label>
                           <div class="col-md-5">
                               <input  type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"   placeholder="" name="name" value="{{ old('name') }}" required> </div>
                           @if ($errors->has('name'))
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                           @endif
                       </div>
                       <div class="form-group row">
                           <label for="" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                           <div class="col-md-5">
                               <input  type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"   placeholder="" name="phone" value="{{ old('phone') }}" required> </div>
                           @if ($errors->has('phone'))
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                           @endif
                       </div>
                       <div class="form-group row">
                           <label for="" class="col-sm-3 text-right control-label col-form-label">Email</label>
                           <div class="col-md-5">
                               <input  type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"   placeholder="" name="name" value="{{ old('email') }}" required> </div>
                           @if ($errors->has('email'))
                               <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                           @endif
                       </div>


                       <div class="form-group row">
                           <div class="col-md-4">

                           </div>
                           <div class="row col-md-4 " style="display: flex ; justify-content: space-between">

                                   <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Save</button>
                                   <button type="reset" class="btn btn-outline-danger waves-effect waves-light m-t-10">Cancel</button>

                           </div>

                       </div>
                   </form>
               </div>

            </div>
        </div>
    </div>
    @endsection