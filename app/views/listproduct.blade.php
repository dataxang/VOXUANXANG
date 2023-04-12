@extends('layout')
@section('content')
    <section>
    </section>

    <section class="header section-padding">

    </section>


    <div class="container">
        <h1>List of product</h1>


        @if ($products->count())
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
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td><input name='quantity_input' id='quantity_input' placeholder='Quatity'><a href="{{ action('ProductController@edit',   $product->id) }}" class="btn">Add To Cart</a></td>
                        <!-- <td><input name='quantity_input' id='quantity_input' placeholder='Quatity'> {{ link_to_route('employee.edit', 'Add to Cart', array($product->id), array('class' => 'btn btn-info')) }}</td> -->
                    </tr>
                @endforeach

                </tbody>

            </table>
            <input class="w-button" type="submit" value="Checkout" data-wait="Please wait..." style="background-color:#428bca">
            <a href="{{ URL('cartdetail') }}" class="btn btn-default">Checkout</a>

            <div class="pagination">
                {{ $products->links() }}
            </div>

        @else
            There are no products
        @endif

    </div>

    </section>
    </div>

@stop



