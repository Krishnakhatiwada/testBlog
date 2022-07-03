<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center pt-6">
                <h1>Add Author </h1>
                <form method="POST" action={{ route('author.store') }}>
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="title" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name"
                            name="fullname">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="title" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Full Name" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Submit</button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
