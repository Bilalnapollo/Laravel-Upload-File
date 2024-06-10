<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.all.min.js
    "></script>
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.min.css
" rel="stylesheet">
    <title>File Upload</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-2">File Upload</h2>
            </div>
        </div>
        <form action="{{ url('user-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <input type="file" name="photo" accept=".jpg,.png,.jpeg">
                    @error('photo')
                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mt-2">
                    <input type="submit" class="btn btn-sm btn-primary" value="Upload">
                </div>
            </div>
        </form>
        {{-- <div class="row">
            <div class="col-6">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
            </div>
        </div> --}}
        <div class="row mt-5">

            @foreach ($users as $user)
                <div style="margin-right: 100px" class="col-2 mt-5">
                    <img src="{{ asset('/storage' . '/' . $user['file-name']) }}" width="300px" height="300px">
                    <div>
                        {{-- <form action="{{url('user-delete'.'/'.$user['id'])}}" method="POST"> --}}
                        {{-- @csrf --}}
                        <button onclick="confirmDelete('{{ url('user-delete' . '/' . $user['id']) }}')" type="submit"
                            class="btn btn-sm btn-danger mt-2">Delete</button>
                        {{-- </form> --}}
                        <a href="/user-edit{{ '/' . $user['id'] }}" class="btn btn-warning mt-2">Update</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, redirect to delete URL
                    window.location.href = url;
                }
            });
        }
        // Display JavaScript alert for session status
        document.addEventListener('DOMContentLoaded', function() {
            var status = "{{ session('status') }}";
            if (status) {
                alert(status);
            }
        });
    </script>
</body>

</html>
