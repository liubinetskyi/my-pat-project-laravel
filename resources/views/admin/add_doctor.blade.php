

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <style type="text/css">
        label{
            display: inline-block;
            width: 1200px;
        }
    </style>

    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">

        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->

        <!-- form -->
    <div class="container-fluid page-body-wrapper">

        <div class="container" align="center" style="padding:100px;">
        @if(session()->has('message'))

        <div class="alert alert-success">
            {{session()->get('message')}}

        </div>

        @endif
            <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding:25px;">
                    <label>Doctor Name</label>
                    <input type="text" style="color:black" name="Name" placeholder="Enter the name..." required="">
                </div>
                <div style="padding:25px;">
                    <label>Phone Number</label>
                    <input type="number" style="color:black" name="Number" placeholder="Enter the number..." required="">
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
                    </label>
                </div>
                <div style="padding:25px;">
                    <label>Office No.</label>
                    <input type="text" style="color:black" name="Office" placeholder="Enter the office number..." required="">
                </div>
                <div style="padding:25px;">
                    <label>Doctor Image</label>
                    <input type="file" name="file" required="">
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
