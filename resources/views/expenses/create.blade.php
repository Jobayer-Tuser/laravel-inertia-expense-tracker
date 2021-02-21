@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Create Expense
        </div>
        <div class="card-body">
            <form method="post" action="{{route('expense.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Add Description</label>
                    <textarea name="description" type="text" class="form-control">{{old('description', 'description')}}</textarea>
                    <span class="text-danger error">{{$errors->first('description')}}<span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input name="date" type="date" class="form-control" />
                    <span class="text-danger error">{{$errors->first('date')}}<span>

                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input name="amount" type="text" class="form-control" value="{{old('amount', '1')}}"/>
                    <span class="text-danger error">{{$errors->first('amount')}}<span>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select name="category" class="form-control" >
                        @foreach($expenses as $expense)
                             <option active value="{{$expense}}">{{$expense}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger error">{{$errors->first('category')}}<span>
                </div>
                <div class="form-group">
                    <label>Payement Type</label>
                    <select name="payment_method" class="form-control" >
                        @foreach($payment as $payment)
                            <option active value="{{$payment}}">{{$payment}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger error">{{$errors->first('payment_method')}}<span>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>


@endsection
