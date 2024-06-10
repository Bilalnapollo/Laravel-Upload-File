<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>File Upload</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-2">Update File Upload</h2>
                <img id="output" src="{{asset('/storage'.'/'.$user['file-name'])}}" alt="" width="300px" height="300px">
            </div>
        </div>
        <form action="{{url('user-update'.'/'.$user['id'])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-4">
                <div class="col-12">
                    <input onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" type="file" name="photo" accept=".jpg,.png,.jpeg">
                    @error('photo')
                        <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-12 mt-2">
                    <input type="submit" class="btn btn-sm btn-primary" value="Update">
                </div>
            </div>
        </form>
    </div>
</body>
</html>