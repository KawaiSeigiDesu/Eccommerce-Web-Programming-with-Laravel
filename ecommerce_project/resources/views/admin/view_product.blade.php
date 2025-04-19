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

          <form action="{{url('product_search')}}" method="get">
            <input type="search" name="search">
            <input type="submit" class="btn btn-secondary"value="Search">
          </form>

            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>

                    </tr>
                    @foreach($data as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{!!Str::limit($product->Description,50)!!}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->Quantity}}</td>
                        <td>
                            <img height="120" width="120" src="products/{{$product->image}}">
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tabel>

                <div class="div_deg">
                    {{$data->onEachSide(1)->links()}}
                </div>

            </div>
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
