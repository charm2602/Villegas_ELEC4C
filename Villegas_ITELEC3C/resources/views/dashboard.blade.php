<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello {{Auth::user()->name}}!
        </h2>
        <br><br>
       <div class ="head"> <h4>Total Users: </h4> {{count($users)}} </div>
       <br><br>
        <table class="custom-table" padding ="90" style ="table-layout:fixed">
                    <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">NAME</th>
                          <th scope="col">EMAIL</th>
                          <th scope="col">CREATED AT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td> 
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </x-slot>

</x-app-layout>

<style>
    .head{
        display: flex;
    }
    .head h4{
        font-weight: bold;
    }

    .custom-table{
        white-space: nowrap;
    }
</style>