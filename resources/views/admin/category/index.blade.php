<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Categories') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success fade show" role="alert">
                            <h4 class="alert-heading">Well done!</h4>
                            <p>Aww yeah, you successfully added the category</p>
                            <hr>
                            <p class="mb-0">Whenever you need to, be sure to come back and add some more</p>
                        </div>
                    @endif
                    <div class="card-header">
                        All Categories
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">SL no</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->user->name}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>
                                    <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ url('category/delete/'.$category->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add Categories
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.category') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <input type="text" class="form-control" name="category_name" id="category_name"
                                       placeholder="Enter category">
                                @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
