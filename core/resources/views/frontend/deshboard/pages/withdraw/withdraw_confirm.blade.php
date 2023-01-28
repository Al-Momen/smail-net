@extends('frontend.deshboard.master')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center mt-4 py-5">
            <div class="col-md-8">
                <div class="card custom--card h-100">
                    <div class="card-header p-4">
                        <div class="card-title text-white"><h4 class="text-white">Confirm Withdraw</h4></div>
                    </div>
                    <div class="card-body  ">
                        <form class="step__form" action="{{route('user.withdraw.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{-- <p class="text-center mt-2">@lang('You have requested') <b class="text--base">{{ showAmount($bookTransaction['recharge_amount'])  }} {{__($general->cur_text)}}</b> , @lang('Please pay')
                                        <b class="text--base">{{showAmount($bookTransaction['final_amo']) .' '.$bookTransaction['method_currency'] }} </b> @lang('for successful payment')
                                    </p> --}}
                                    <h4 class="text-center mb-4 text-white">@lang('Please follow the instruction below')</h4>
                                    <span class="my-4 text-center text-white">{!! $data->gateway->description !!} </span>
                                    <br>
                                </div>

                                @if($data->gateway->user_data)
                                    @foreach(json_decode($data->gateway->user_data) as $k => $v)
                                        @if($v->field_type == "input")
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group step__form__group">
                                                    <label class="form--label text-white"><strong>{{__(inputTitle($v->field_level))}} @if($v->field_validation == 'required') <span class="text-danger">*</span>  @endif</strong></label>
                                                    <input type="text" class="form-control" name="{{$k}}" value="{{old($k)}}">
                                                </div>
                                            </div>
                                        @elseif($v->field_type == "textarea")
                                                <div class="col-md-12 mb-4">
                                                    <div class="form-group step__form__group">
                                                        <label class="form--label text-white"><strong>{{__(inputTitle($v->field_level))}} @if($v->field_validation == 'required') <span class="text-danger">*</span>  @endif</strong></label>
                                                        <textarea name="{{$k}}" class="form-control" rows="3">{{old($k)}}</textarea>
                                                    </div>
                                                </div>
                                        @elseif($v->field_type == "file")
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group step__form__group">
                                                    <label class="form--label text-white text-capitalize"><strong>{{__($v->field_level)}} @if($v->field_validation == 'required') <span class="text-danger">*</span>  @endif</strong></label>
                                                    <br>
                                                    <input type="file" name="{{$k}}" class="form-control" accept="image/*" >
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100 justify-content-center">@lang('Withdraw Now')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
<style>
    .fileinput .thumbnail {
        width: 100%;
        max-width: 300px;
    }
    .fileinput .thumbnail img {
        width: 100%;
    }
</style>
@endpush

@push('script-lib')
<script src="{{asset($activeTemplateTrue.'/js/bootstrap-fileinput.js')}}"></script>
@endpush

@push('style-lib')
<link rel="stylesheet" href="{{asset($activeTemplateTrue.'/css/bootstrap-fileinput.css')}}">
@endpush

@push('js')
<script>

    (function($){

        "use strict";

            $('.withdraw-thumbnail').hide();

            $('.clickBtn').on('click', function() {

                var classNmae = $('.fileinput').attr('class');

                if(classNmae != 'fileinput fileinput-exists'){
                    $('.withdraw-thumbnail').hide();
                }else{
                    $('.withdraw-thumbnail').show();
                }

            });

    })(jQuery);

</script>
@endpush