@extends('app');

@section('container')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Second Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone Number</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach ($customers as $customer)
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td>{{$customer->first_name}}</td>
      <td>{{$customer->second_name}}</td>
      <td>{{$customer->last_name}}</td>
      <td>{{$customer->address}}</td>
      <td>{{$customer->phone_number}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection