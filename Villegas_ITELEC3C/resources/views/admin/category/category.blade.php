<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories
        </h2>
    </x-slot>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Categories List --}}
                    <div>
                  
                            <h2 class="text-2xl font-semibold mb-4">All Categories</h2>

                            <table class="min-w-full table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">ID</th>
                                        <th class="px-4 py-2">Category Name</th>
                                        <th class="px-4 py-2">User ID</th>
                                        <th class="px-4 py-2">Image</th>
                                        <th class="px-4 py-2">Created At</th>
                                        <th class="px-4 py-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->user->id }}</td>
                                            <td>
                                                <img style="height: 100px; width: 100px;" src="{{ asset('storage/' . $category->category_img) }}" alt="Category Image">
                                            </td>
                                            
                                            <td>{{ $category->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ url('category/edit/' . $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ url('category/delete/' . $category->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            {{ $categories->links() }}
                        </div>
                    </div>

                    {{-- Add Category Form --}}
                    <div>
                    
                            <h2 class="text-2xl font-semibold mb-4">Add Categories</h2>
                            <form action="{{ route('Create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="categoryName" class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="categoryName" aria-describedby="categoryHelp">
                                    @error('category_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="category_img" class="form-control @error('category_img') is-invalid @enderror" id="image">
                                    @error('category_img')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
