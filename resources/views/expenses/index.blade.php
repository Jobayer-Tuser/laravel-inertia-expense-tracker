@extends('layouts.app')
@section('content')

<div class="container">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($expenses as $expense)
    <tr>
      <th scope="row">{{$expense->id}}</th>
      <td>{{$expense->description}}</td>
      <td>{{$expense->category}}</td>
      <td>{{$expense->payment_method}}</td>
      <td>{{$expense->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$expenses->render()}}
</div>

@endsection
