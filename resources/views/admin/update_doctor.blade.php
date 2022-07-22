

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
                @if(session()->has('message'))

                <div class="alert alert-success">
                    {{session()->get('message')}}

                </div>

                @endif

            <div class="container" align="center" style="padding:100px;">
                <form action="{{url('editdoctor', $data->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div style="padding:25px;">
                        <label>Doctor Name</label>
                        <input type="text" style="color:black" name="name" value="{{$data->name}}">
                    </div>
                    <div style="padding:25px;">
                        <label>Phone</label>
                        <input type="number" style="color:black" name="phone" value="{{$data->phone}}">
                    </div>
                    <div style="padding:25px;">
                        <label>Specialty</label>
                            <select name="specialty" style="color:black">
                                <option value="select">None</option>
                                <option value="dermatologist">Dermatologist</option>
                                <option value="cardiologist">Cardiologist</option>
                                <option value="oculist">Oculist</option>
                                <option value="otorhinolaryngologist">Otorhinolaryngologist</option>
                            </select>
                    </div>
                    <div style="padding:25px;">
                        <label>Office No.</label>
                        <input type="text" style="color:black" name="office" value="{{$data->office}}">
                    </div>
                    <div style="padding:25px;">
                        <label>Old Image</label>
                        <img height="150" width="150" src="/storage/doctorimage/{{$data->image}}">
                    </div>
                    <div style="padding:25px;">
                        <label>Change Image</label>
                        <input type="file" name="file">
                    </div>
                    <div style="padding:25px;">
                        <input type="submit" class="btn btn-outline-success">
                    </div>
                </form>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
