
 @include('layout.header')
  @include('layout.sidebar')

  <!-- Main Content -->
  <main>
    <div class="container-fluid">
      <h3 class="mb-4">Dashboard Overview</h3>
      <div class="row g-3">

                <table>
                <thead>
                <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Name</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->name }}</td>  
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>
                                <a href="{{ route('users.edit', $user->user_id) }}"class="btn btn-sm btn-primary">
                                Edit</a>
                                <form action="{{ route('users.delete', $user->user_id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure?')"
                                style="display:inline;">
                                @csrf
                                <button class="btn btn-sm btn-danger">
                                Delete
                                </button>
                                </form>
                                
                        </td>
                        

                        
                            
                       
                        
                </tr>

                @endforeach
                <tr>
                <td colspan="4" class="text-center">There is no data found</td>
                </tr>

                </tbody>

                </table>
        </div>
