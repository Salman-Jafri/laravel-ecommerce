@extends('layout.admin')

@section('styles')

#header
{

    text-align: center

}

#items
{

font-size: 30px;
padding: 15px

}
@endsection

@section('content')

    <h1 id="header"> Admin Dashboard</h1>

<ul>

    <li id="items">

        Products


    </li>

    <li id="items">

        Category


    </li>

    <li id="items">

        Users


    </li>


</ul>

@endsection