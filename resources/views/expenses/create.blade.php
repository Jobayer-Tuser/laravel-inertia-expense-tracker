@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Create Expense
        </div>
        <div class="card-body">
            <form method="post" action="{{route('expense.store')}}">

                @include('expenses._form');

            </form>
        </div>
    </div>

</div>


@endsection
