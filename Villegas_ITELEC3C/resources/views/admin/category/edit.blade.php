<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Edit Category') }}</title>

 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">



</head>
<body>

    <x-app-layout>
        <x-slot name="header">
            <center>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit Category') }}
                </h2>
            </center>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-6 sm:rounded-lg shadow-md">
                    <form action="{{ url('category/update/'.$categories->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="category_name" class="form-label"><strong>Category Name</strong></label>
                            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $categories->category_name }}" />
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_img" class="form-label"><strong>Category Image</strong></label>
                            <input type="file" name="category_img" class="form-control" />
                            @error('category_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <center><button type="submit" id="submit" class="btn btn-primary">Submit</button></center>
                    </form>
                </div>
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
</style>

</body>
</html>