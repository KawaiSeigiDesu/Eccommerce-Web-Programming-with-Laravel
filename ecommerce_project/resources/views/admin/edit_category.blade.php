<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .div_deg{
            display: flex;
            justify-content: center;
            align-item: center;
            margin: 60px;
        }

        input[type='text']{
            width: 400px;
            height: 50px;
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
          <h1 style="color: white">Update Category</h1>
            <div class="div_deg">

                <form action="{{url('udpate_category',$data->id)}}" method="post">
                  @csrf
                    <input type="text" name="category" value="{{$data->category_name}}">
                    <input class="btn btn-primary" type="submit" value="Update Category" value="{{$data->category_name}}">

                </form>
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