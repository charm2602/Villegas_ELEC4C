<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{session('success')}}
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="bg-white col-md-12 overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-striped-columns">
                    <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">CATEGORY IMAGE</th>
                          <th scope="col">CATEGORY NAME</th>
                          <th scope="col">USER ID</th>
                          <th scope="col">CREATED AT</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $categories->firstItem()+$loop->index }}</td>
                            <td><img width="100" height="100" alt={{ $category->category_img }} src="{{ asset('storage/' . $category->category_img) }}" /></td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->user->name }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td class="grid gap-2">
                                <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-primary">Edit</button>
                                <a href="{{url('category/delete/'.$category->id)}}" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
            <h1>Add Category</h1>
            <div class="bg-white col-md-4 overflow-hidden shadow-xl sm:rounded-lg">  
                <form action="{{ route('Create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" />
                    <input type="file" name="category_img" />  
                    @error('category_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>