<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center pt-6">
                <h1>Update Blog </h1>
                <form method="POST" action={{ route('blog.update', [$blog->id]) }} enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="mb-3 mt-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Titile" name="title"
                            value="{{ $blog->title }}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="title" class="form-label">Tags:</label>
                        <input type="text" class="form-control" id="tags"
                            placeholder="Enter tags with comma seperation" name="tag" value="{{ $blog->tagList }}">
                    </div>
                    <div class=" md-3 mt-3">
                        <label for="title" class="form-label">Author:</label>
                        <select class="form-select" name="author_id">
                            <option value={{ $blog->author->id }}>{{ $blog->author->fullname }}</option>
                            @foreach ($author as $auth)
                                <option value={{ $auth->id }}>{{ $auth->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="md-3 mt-3">
                        <label for="title" class="form-label">Categories:</label>
                        <select class="form-select" name="categories_id">
                            <option>Select</option>
                            @foreach ($categories as $cat)
                                <option value={{ $cat->id }}>{{ $cat->title }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <label for="comment">Content:</label>
                    <textarea class="form-control editor1" rows="5" id="body" name="content">{{ $blog->content }}</textarea>


                    {{-- <input type="file" name="image" class="form-control mt-5"> --}}
                    <button type="submit" class="btn btn-primary mt-5">Update</button>

                </form>
            </div>
        </div>
    </div>


</x-app-layout>
