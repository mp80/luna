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
                    <div class="card-header">
                        Edit Category
                    </div>
                    <div class="card-body">
                        <form action="{{ url('category/update/'.$category->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Update category name</label>
                                <input type="text" class="form-control" name="category_name" id="category_name"
                                       placeholder="Enter category" value="{{$category->category_name}}">
                                @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
