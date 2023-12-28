<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl row mx-auto sm:px-6 lg:px-8">
            <h1>Edit Category</h1>
            <div class="bg-white col-md-4 overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ url('category/update/'.$categories->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{$categories->category_name}}" /> 
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