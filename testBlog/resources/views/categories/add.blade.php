<x-app-layout>
    <div class="container">

        <div class="row">
            <div class="col-md-6 text-center pt-6">
                <h1>Add Categories </h1>
                <form method="POST" action={{ route('categories.store') }} enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Titile" name="title">
                    </div>
                    <label for="comment">Description:</label>
                    <textarea class="form-control" rows="5" id="desc" name="description"></textarea>
                    <input type="file" name="image" class="form-control mt-5">
                    <button type="submit" class="btn btn-primary mt-5">Submit</button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
