<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center pt-6">
                <h1>Assing Categories to Blog </h1>
                <form method="POST" action={{ route('blog.assingBlogCategory') }} enctype="multipart/form-data">
                    @csrf
                    <div class="md-3 mt-3">
                        <label for="title" class="form-label">Blogs:</label>
                        <select class="form-select" name="blog_id">
                            <option>Select</option>
                            @foreach ($blog as $blog)
                                <option value={{ $blog->id }}>{{ $blog->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-3 mt-3">
                        <label for="title" class="form-label">Categories:</label>
                        <select class="form-select" name="categories_id">
                            <option>Select</option>
                            @foreach ($categories as $cat)
                                <option value={{ $cat->id }}>{{ $cat->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Submit</button>

                </form>
            </div>
        </div>
    </div>


</x-app-layout>
