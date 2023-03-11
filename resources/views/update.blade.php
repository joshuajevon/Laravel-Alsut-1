<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="m-5">
        <h1>Update Book {{ $book->Name }}</h1>
        <form action="/update/{{ $book->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $book->Name }}"
                    name="Name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Publication Date</label>
                <input value="{{ $book->PublicationDate }}" type="date" class="form-control" id="exampleInputEmail1"
                    name="PublicationDate">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input value="{{ $book->Stock }}" type="number" class="form-control" id="exampleInputEmail1"
                    name="Stock">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Author</label>
                <input value="{{ $book->Author }}" type="text" class="form-control" id="exampleInputEmail1"
                    name="Author">
            </div>
            <div class="card">
                <img src="{{ asset('storage/'.$book->BookImg) }}" width="225" height="225" class="card-img-top"
                    alt="...">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">BookImg</label>
                <input value="" type="file" class="form-control" id="exampleInputEmail1"
                    name="BookImg">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
