
<input type="hidden" name="id" value="{{$expenses->id}}" />

 {{csrf_field()}}
<div class="form-group">
    <label for="exampleInputEmail1">Add Description</label>
    <textarea name="description" type="text" class="form-control">{{old('description', $expenses->description)}}</textarea>
    <span class="text-danger error">{{$errors->first('description')}}<span>
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Date</label>
    <input name="date" type="date" class="form-control" value="{{old('date', Carbon\Carbon::parse($expenses->date)->format('Y-m-d'))}}"/>
    <span class="text-danger error">{{$errors->first('date')}}<span>

</div>

<div class="form-group">
    <label for="exampleInputEmail1">Amount</label>
    <input name="amount" type="text" class="form-control" value="{{old('amount', $expenses->amount)}}"/>
    <span class="text-danger error">{{$errors->first('amount')}}<span>

</div>
<div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select name="category" class="form-control" >
        @foreach($expenseCategories as $expenseCategory)
                <option value="{{$expenseCategory}}" {{ ($expenses->category === $expenseCategory ) ? 'selected' : '' }} > {{$expenseCategory}} </option>
        @endforeach
    </select>
    <span class="text-danger error">{{$errors->first('category')}}<span>
</div>
<div class="form-group">
    <label>Payement Type</label>
    <select name="payment_method" class="form-control" >
        @foreach($paymentMethods as $payment)
            <option  value="{{$payment}}" {{ ($expenses->payment_method === $payment) ? 'selected' : '' }}>{{$payment}}</option>
        @endforeach
    </select>
    <span class="text-danger error">{{$errors->first('payment_method')}}<span>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
