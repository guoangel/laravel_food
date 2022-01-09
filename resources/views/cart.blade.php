@extends('layouts.main')

@section('content')

</div>
  <section class="cart container py-5">
    <div class="container">
      <h4>Your Order</h4>
    </div>

    <table class="pt-5">
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr>



      @if(Session::has('cart'))

         @foreach(Session::get('cart') as $id=>$product)
          <tr>
            <td>
              <div class="product-info">
                <img style="width: 75px; height: 75px" src="{{asset('images/'.$product['image'])}}">
                <div>
                  <p>{{ $product['name']}}</p>
                  <small><span>$</span>{{$product['price']}}</small>
                  <br>
                  <form method="post" action="{{ route('remove_from_cart')}}"> 
                    @csrf
                    <input type="hidden" name="id" value="{{ $product['id'] }}">
                    <input type="submit" name="remove_btn" class="remove-btn" value="remove">
                  </form>
                </div>
              </div>
            </td>
            <td>
              <form method="post" action="{{ route('edit_product_quantity')}}"> 
                @csrf
               
                 <input type="submit" value="-" class="edit-btn " name="decrease_product_quantity_btn">
                 <input type="hidden" name="id" value="{{ $product['id'] }}">
                
                <input type="number" name="quantity" value="{{$product['quantity']}}" readonly>

                <input type="submit" value="+" class="edit-btn" name="increase_product_quantity_btn">
              </form>
            </td>

            <td>
              <span class="product-price">${{$product['quantity'] * $product['price']}}</span>
            </td>
          </tr>

            @endforeach 

       @endif 
 
    </table>

    <div class="cart-total">
      <table>
           @if(Session::has('cart'))
              <tr>
                <td>Total</td>
                  @if(Session::has('total'))
                    <td>${{Session::get('total')}}</td>
                  @endif
               </tr>
            @endif   
      </table>
    </div>
    

    <div class="checkout-container">
     
     @if(Session::has('total'))
          @if(Session::get('total') != null)
          <form method="get" action="{{ route('checkout')}}"> 
            @csrf
            <input type="submit" class="btn checkout-btn" value="Checkout" name="">
          </form>
          @endif
      @endif
    
    
    
    </div>





  </section>


@endsection
