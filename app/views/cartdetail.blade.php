@extends('layout')
@section('content')
    <section>
    </section>

    <section class="header section-padding">

    </section>


    <div class="container">
        <h1>Checkout</h1>


        @if ($orderDetails->count())
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $orderDetail->id }}</td>
                        <td>{{ $orderDetail->product_id }}</td>
                        <td>ddd</td>
                        <td>{{ $orderDetail->quantity }}</td>
                    </tr>
                @endforeach

                </tbody>

            </table>

            <div class="pagination">
                {{ $orderDetails->links() }}
            </div>

        @else
            There are no products
        @endif

    </div>

    </section>
    </div>
@stop

