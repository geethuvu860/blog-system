
 @include('layout.header')
  @include('layout.sidebar')

  <!-- Main Content -->
  <main>
    <div class="container-fluid">
      <h3 class="mb-4">Dashboard Overview</h3>
      <div class="row g-3">
        <div class="col-md-3">
              @if(session('message'))
                  <div class="alert alert-success alert-dismissible">
                      {{ session('message') }}
                  </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
              @endif
          <form action="{{ route('users.store') }}" method="POST">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror 

</div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                  @error('email')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror 

    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
