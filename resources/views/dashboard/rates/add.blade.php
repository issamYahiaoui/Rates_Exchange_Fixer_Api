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
                <div class="row ">
                    <div class="col-md-3">
                        <a href="{{url('rates/')}}"  class="btn btn-outline-info waves-effect waves-light"><i class="fa fa-arrow-circle-left"></i> Back to Rate Request List</a>
                    </div>
                </div>
                <div class="row col-md-11 justify-content-center">
                    <h3 class="box-title m-b-0">Add New Rate Request</h3>
                    <br><br><br> <br>
                </div>

                <div class="row justify-content-center">
                    <form id="rateForm" style="width: 100%" class="form-horizontal" method="POST" action="{{ url('rates') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-right control-label col-form-label">Birthday</label>
                            <div class="col-md-5">
                                <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"   placeholder="" name="date" value="{{ old('date') }}" required> </div>
                            @if ($errors->has('date'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                            @endif
                          <div class="col-md-3">
                              <button type="button" id="getRates" class="btn btn-outline-info btn-rounded"><i class="fa fa-search"></i>Get Rates</button>
                          </div>
                          </div>
                        <div class="form-group row">
                            <label for="dzd_rate" class="col-sm-3 text-right control-label col-form-label">DZD Rate</label>
                            <div class="col-md-5">
                                <input name="dzd_rate" id="dzd_rate" type="text" class="form-control"    required> </div>

                        </div>
                        <div class="form-group row">
                            <label for="gbp_rate" class="col-sm-3 text-right control-label col-form-label">GBP Rate</label>
                            <div class="col-md-5">
                                <input name="gbp_rate" id="gbp_rate" type="text" class="form-control"   required> </div>
                        </div>




                        <div class="form-group row">
                            <div class="col-md-4">

                            </div>
                            <div class="row col-md-4 " style="display: flex ; justify-content: space-between">

                                <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">Save</button>
                                <button type="reset" class="btn btn-outline-danger waves-effect waves-light m-t-10">Cancel</button>

                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

        $("#getRates").on('click',function (e) {
            e.preventDefault()
            getRates()
        })
        function getRates(){
            console.log('js is on !')
            var date = $("#date").val();
            if (date){
                var base_url = "http://data.fixer.io/api/"+date+"?access_key=2d3b5b696603cab63d2965dd8e77be60&base=EUR&symbols=DZD,GBP"

                console.log('url',base_url)
                $.get(base_url, function(data, status){
                    console.log(data);
                    $("#dzd_rate").val(data.rates.DZD)
                    $("#gbp_rate").val(data.rates.GBP)
                    console.log(data.rates.DZD)
                    console.log(data.rates.GBP)


                });
            }



        }
    </script>
@endsection