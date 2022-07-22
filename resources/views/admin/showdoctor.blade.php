

<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
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
        <div class="container-fluid page-body-wrapper">

            <div align="center" style="padding:70px">
                <table class="table table-bordered">
                    <thead align="center">
                        <tr>
                            <th style="padding: 20px;">Name</th>
                            <th style="padding: 20px;">Phone</th>
                            <th style="padding: 20px;">Specialty</th>
                            <th style="padding: 20px;">Office No.</th>
                            <th style="padding: 20px;">Photo</th>
                            <th style="padding: 20px;">Update</th>
                            <th style="padding: 20px;">Delete</th>
                        </tr>
                    </thead>
                    @foreach ($data as $doctor)
                    <tbody>
                        <tr>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->phone}}</td>
                            <td>{{$doctor->speciality}}</td>
                            <td>{{$doctor->office}}</td>
                            <td><img src="doctorimage/{{$doctor->image}}"></td>

                            <td><a onclick="return confirm('Are you sure you want to update?')" class="btn btn-success" href="{{url('updatedoctor', $doctor->id)}}">Update</a></td>
                            <td><a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" href="{{url('deletedoctor', $doctor->id)}}">Delete</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
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
