{{-- {{ dd('here') }} --}}
<x-app-layout>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container" id="category-main">
        <div class="row">
            <div class="col-md-6 text-center pt-5">
                <h1><b>Create Blog</b></h2>
            </div>
            <div class="container pt-10 ">
                <a href="{{ route('blog.create') }}" class="btn btn-primary">Add</a>
                <a href="{{ route('blog.assignView') }}" class="btn btn-primary">Assign Categories</a>
                {{-- @if (request()->has('trashed'))
                    <a href="{{ route('blog.restoreAll') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('blog.index', ['trashed' => 'post']) }}" class="btn btn-primary">View
                        Deleted
                        posts</a>
                @endif --}}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Tags</th>
                            <th>Author Name </th>
                            <th>Categories</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ dd($blogs) }} --}}
                        @foreach ($blogs as $blog)
                            {{-- {{ dd($blog) }} --}}
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->content }}</td>
                                <td>{{ $blog->tagList }}</td>
                                <td>{{ $blog->author->fullname }}</td>
                                @if ($blog->category != null)
                                    <td>
                                        @foreach ($blog->category as $cat)
                                            {{ $cat->title }} <br />
                                        @endforeach
                                    </td>
                                @else
                                    <td>No Values</td>
                                @endif

                                <td>
                                    <a href="{{ route('blog.edit', [$blog->id]) }}" class="btn btn-secondary">Edit</a>
                                    {{-- @if ($cat->deleted_at != null) --}}
                                    {{-- <a href="{{ route('categories.restore', $cat->id) }}"
                                            class="btn btn-success">Restore</a> --}}
                                    {{-- @else --}}
                                    <form method="POST" action="{{ route('blog.destroy', [$blog->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    {{-- @endif --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
