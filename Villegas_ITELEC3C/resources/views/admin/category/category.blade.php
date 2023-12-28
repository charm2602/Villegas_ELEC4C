<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

   

</head>
<body>

    <x-app-layout>
        <x-slot name="header">
            <center><h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Categories
            </h2></center>
           
        </x-slot>
 
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
         <br>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Categories List --}}
            <div>
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
                                    <a href="{{ url('category/edit/' . $category->id) }}" id="edit" class="btn btn-info btn-sm">Edit</a>
                                    <br><br>
                                    <form action="{{ url('category/delete/' . $category->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="delete" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $categories->links() }}
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

                    <center><button type="submit" id="submit" class="btn btn-primary">Submit</button></center>
                </form>
            </div>
        </div>
    </x-app-layout>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
#submit{
    padding-left: 2.5rem;
    padding-right: 2.5rem;
    background-color: #001a33;
    width: 150px;
    height: 35px;
    border-radius: 5px;
    color:aliceblue;
    border: 1px solid #001a33;
    text-align: center;
    align-content: center;
}

#submit:hover{
    color:#001a33;
   background-color: ghostwhite;
}

#edit{
    padding-left: 2.5rem;
    padding-right: 2.5rem;
    background-color: #001a33;
    width: 120px;
    height: 35px;
    border-radius: 5px;
    color:aliceblue;
    border: 1px solid #001a33;
    text-align: center;
    align-content: center;
}

#edit:hover{
    color:#001a33;
   background-color: ghostwhite;
}

#delete{
    padding-left: 2.5rem;
    padding-right: 2.5rem;
    background-color: #ed2939;
    width: 120px;
    height: 35px;
    border-radius: 5px;
    color:aliceblue;
    border: 1px solid #ed2939;
    text-align: center;
    align-content: center;
}

#delete:hover{
    color:#ed2939;
   background-color: ghostwhite;
}
</style>

</body>
</html>
