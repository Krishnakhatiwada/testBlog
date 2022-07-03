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
                <h1><b>Create Category</b></h2>
            </div>
            <div class="container pt-10 ">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Add</a>
                @if (request()->has('trashed'))
                    {{-- <a href="{{ route('categories.index') }}" class="btn btn-info">View All posts</a> --}}
                    <a href="{{ route('categories.restoreAll') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('categories.index', ['trashed' => 'post']) }}" class="btn btn-primary">View
                        Deleted
                        posts</a>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $cat->title }}</td>
                                <td>{{ $cat->description }}</td>
                                <td><img src="/thumbnail/{{ $cat->image }}" alt="Categroies Image" /></td>
                                <td>
                                    @if ($cat->deleted_at != null)
                                        <a href="{{ route('categories.restore', $cat->id) }}"
                                            class="btn btn-success">Restore</a>
                                    @else
                                        <form method="POST" action="{{ route('categories.destroy', [$cat->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endif
                                    {{-- <a href="{{ route('categories.edit', [$cat->id]) }}"
                                        class="btn btn-secondary">Edit</a> --}}

                                    {{-- <a href="{{ route('categories.destroy', [$cat->id]) }}"
                                        class="btn btn-danger">Delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
