@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form method="POST" action="/productSubmit">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product name</label>
                                <input type="text" class="form-control" name="productName" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantity in stock</label>
                                <input type="text" class="form-control" name="quantity" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price per item</label>
                                <input type="text" class="form-control" name="price" >
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>
                <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity in Stock</th>
                        <th>Price Per Item</th>
                        <th>Date Submitted</th>
                        <th>Total Value Number</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php ($total = 0)
                    @endphp
                    @php ($value = 0)
                    @endphp
                    @foreach ($prods as $product)
                        @php
                            $value = $product['quantity'] * $product['price'];
                            $total = $value + $total
                        @endphp
                        <tr>
                            <td> {{ $product['productName'] }}</td>
                            <td> {{ $product['quantity'] }}</td>
                            <td> {{ $product['price'] }}</td>
                            <td> {{ $product['datetime_submitted'] }}</td>
                            <td> {{ $value }}</td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>
                <h1>Total : {{ $total}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
