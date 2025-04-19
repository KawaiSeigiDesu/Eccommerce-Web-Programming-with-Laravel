<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
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
        color: white;
    }
    td{
        color: white;
        padding: 10px;
        border: 1px solid skyblue
    }
    input[type='search']{
        width: 500px;
        height: 60px;
        margin-left: 50px;
    }

    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Address</th>
                    <th>Customer Phone</th>
                    {{-- <th>Product Title</th>
                    <th>price</th>
                    <th>image</th> --}}
                    <th>Status</th>
                    <th>Change Status</th>

                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->rec_address}}</td>
                    <td>{{$data->phone}}</td>
                    {{-- <td>{{$data->product->title}}</td>
                    <td>{{$data->product->price}}</td>
                    <td>
                        <img width="150" src="products/{{$data->product->image}}">
                    </td> --}}

                    <td>
                        @if ($data -> status == 'in progress')
                        <span style="color::red">{{$data->status}}</span>

                        @elseif ($data -> status == 'On the way')
                        <span style="color::skyblue">{{$data->status}}</span>

                        @else
                        <span style="color::yellow">{{$data->status}}</span>

                        @endif
                    </td>

                    <td>
                        <a class="btn btn-primary" href="
                        {{url('on_the_way', $data->id)}}">On the way</a>
                        <a class="btn btn-success" href="
                        {{url('delivered', $data->id)}}">Delivered</a>
                    </td>

                </tr>
                @endforeach
            </table>

        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/Admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/Admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/Admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/Admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/Admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/Admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/Admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/Admincss/js/front.js')}}"></script>
  </body>
</html>
