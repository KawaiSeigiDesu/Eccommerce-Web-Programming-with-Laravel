<!DOCTYPE html>
<html>

<head>
@include('home.css')
<style type="text/css">
        .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
        }
        .table_deg{
        text-align: Center;
        margin: auto;
        border: 2px solid yellowgreen;
        margin-top: 50px;
        width: 600px;
    }
    th{
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: black;
    }
    td{
        color: black;
        padding: 10px;
        border: 1px solid skyblue
    }
    input[type='search']{
        width: 500px;
        height: 60px;
        margin-left: 50px;
    }
    .cart_value{
        text-align: center;
        margin-bottom: 70px;
        padding: 18px;
    }
    .order_deg{
        padding-right: 150px;
        margin-top:-50px;
    }
    label{
        display: inline-block;
        width: 150px;
    }

    </style>
</head>
<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <div class="div_deg">
        <div class="order_deg">
        <form action="{{url('confirm_order')}}" method="post">
            @csrf
            <div class="div_deg">
                <label>Receiver Name</label>

                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="div_deg">
                <label>Receiver Address</label>

                <textarea name="address" >{{Auth::user()->address}}</textarea>
            </div>
            <div class="div_deg">
                <label>Receiver Phone</label>

                <input type="text" name="phone" value="{{Auth::user()->phone}}">
            </div>
            <div class="div_deg">
                <input class="btn btn-primary" type="submit" value="Place Order">
            </div>
        </form>
        </div>
        <table>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Delete</th>
            </tr>
            <?php
            $value=0;
            ?>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}}</td>
                <td>
                    <img width="150" src="/products/{{$cart->product->image}}">
                </td>
                <td>
                    <a class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Remove</a>
                </td>
            </tr>
            <?php
            $value = $value+$cart->product->price;
            ?>
            @endforeach
        </table>
    </div>

    <div class="cart_value">
        <h3>Total Value of cart is: ${{$value}}</h3>
    </div>
    @include('home.footer')

</body>

</html>
