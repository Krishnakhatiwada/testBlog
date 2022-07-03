<x-app-layout>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container" id="author-main">
        <div class="row">
            <div class="col-md-6 text-center pt-5">
                <h1><b>Create Author</b></h2>
            </div>

            <div class="container pt-10 ">
                <a href="{{ route('author.create') }}" class="btn btn-primary">Add</a>
                {{-- @if (request()->has('trashed'))
                    <a href="{{ route('categories.restoreAll') }}" class="btn btn-success">Restore All</a>
                @else
                    <a href="{{ route('categories.index', ['trashed' => 'post']) }}" class="btn btn-primary">View
                        Deleted
                        posts</a>
                @endif --}}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Full Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($author as $auth)
                            {{-- {{ dd($auth) }} --}}
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $auth->fullname }}</td>
                                <td>{{ $auth->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
