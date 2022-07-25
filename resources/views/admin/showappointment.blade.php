

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
                <table class="table table-stripped table-bordered">
                    <thead align="center">
                        <tr>
                            <th style="padding: 20px;">Name</th>
                            <th style="padding: 20px;">Email</th>
                            <th style="padding: 20px;">Phone</th>
                            <th style="padding: 20px;">Doctor</th>
                            <th style="padding: 20px;">Date</th>
                            <th style="padding: 20px;">Message</th>
                            <th style="padding: 20px;">Status</th>
                            <th style="padding: 20px;">Action</th>
                        </tr>
                    </thead>
                    @foreach($data as $appoint)
                    <tbody>
                        <tr>
                            <td>{{$appoint->name}}</td>
                            <td>{{$appoint->email}}</td>
                            <td>{{$appoint->phone}}</td>
                            <td>{{$appoint->doctor}}</td>
                            <td>{{$appoint->date}}</td>
                            <td>{{$appoint->message}}</td>
                            <td>{{$appoint->status}}</td>

                            <td><a class="btn btn-outline-success" href="{{url('approve', $appoint->id)}}">Approve</a>
                                <a class="btn btn-outline-danger" href="{{url('cancel', $appoint->id)}}">Cancele</a>
                                <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" href="{{url('delete', $appoint->id)}}">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
