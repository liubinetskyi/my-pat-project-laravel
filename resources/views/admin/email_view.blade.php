

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
            <form action="{{url('sendemail', $data->id)}}" method="POST">
                @csrf
                <div style="padding:25px;">
                    <label>Greeting</label>
                    <input type="text" style="color:black" name="greeting" placeholder="From..." required="">
                </div>
                <div style="padding:25px;">
                    <label>Main text</label>
                    <textarea id="main text" name="maintext" rows="5" cols="50" style="color: black" placeholder="Enter the text..." required=""></textarea>
                </div>

                <div style="padding:25px;">
                    <label>Link Text</label>
                    <input type="text" style="color:black" name="linktext" placeholder="Enter the link text...">
                </div>

                <div style="padding:25px;">
                    <label>Link</label>
                    <input type="text" style="color:black" name="link" placeholder="Enter the link...">
                </div>
                <div>
                    <label>End</label>
                    <input type="text" style="color: black" name="end" placeholder="Enter the text...">
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
