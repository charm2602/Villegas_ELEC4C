<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>


</head>
<body>

    <x-app-layout>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-center">Edit Category</h1>
                <div class="card bg-white overflow-hidden shadow-xl sm:rounded-lg mx-auto">
                    <form action="{{ url('category/update/'.$categories->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <br><br>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" value="{{$categories->category_name}}" />
                                <input type="file" name="category_img" class="mt-2 form-control"/>
                                @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" id ="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>

   <style>

    

    </style>

</body>
</html>
