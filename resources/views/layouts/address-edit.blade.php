@extends('layout.main')

@section('main-content')
    <div class="main">
        <div class="shop_top">
            <div class="container">
                <h1 style="text-align: center;padding: 50px;">Enter your Address Details</h1>
                {!! Form::model($addresses,['route'=>['checkout.address.edit',$addresses->id],'method'=>'PUT']) !!}
                {!! Form::label('label-name','Area Address') !!}
                {!! Form::text('area',null,['class'=>'form-control']) !!}
                {!! Form::label('label-zipcode','Zip Code') !!}
                {!! Form::text('zipcode',null,['class'=>'form-control']) !!}
                {!! Form::label('label-name','Zip Code') !!}
                {!! Form::select('country_id',[1=>'Pakistan',2=>'USA',3=>'UK',4=>'UAE'],null,['placeholder'=>'Select a country','class'=>'form-control']) !!}
                {!! Form::submit('Proceed',['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    </div>


@endsection