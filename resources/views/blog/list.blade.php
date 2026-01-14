
 @include('layout.header')
  @include('layout.sidebar')

  <!-- Main Content -->
    <main>
    <div class="container-fluid">
      <h3 class="mb-4">BLOG LISTING</h3>
      <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#blogadd">
  Add Blog
</button>

<!-- Modal -->
<div class="modal fade" id="blogadd" tabindex="-1" aria-labelledby="blogaddLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="blogaddLabel">Add Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form id="blogForm">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          
          <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
          </div>
           <!-- <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
              </div> -->
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="blogForm" class="btn btn-primary">Save Blog</button>
      </div>
      
    </div>
  </div>
</div>

<body>
  <div class="container-fluid">
      <!-- <h3 class="mb-4">Dashboard Overview</h3> -->
      <div class="row g-3">

                <table>
                <thead>
                <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <!-- <th>User Name</th> -->
                        <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                   
                  @foreach($blogs as $blog)
                  <tr>  
                        <td>{{ $blog->blog_id }}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->content}}</td>  
                        
                       
                        <td>
                                <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#blogadd">
                                edit
                              </button> 

                               
                               
                                
                        </td>
                       </tr>
                       @endforeach  
          
                <tr>
                <td colspan="4" class="text-center">There is no data found</td>
                </tr>

                </tbody>

                </table>
        </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

<!-- <script>
$(document).ready(function () {

    $('#blogForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('blogs.store') }}",
            type: "POST",
            data: {
                title: $('#title').val(),
                content: $('#content').val(),
                _token: "{{ csrf_token() }}"
            },
            success: function () {
                console.log('inside success function');
            },
            error: function (xhr) {
                console.log('error status:', xhr.status);
            }
        });

    });

});
</script> -->
<script>
$(document).ready(function () {

    $('#blogForm').submit(function (e) {
        e.preventDefault();

        let jsonData = {
            title: $('#title').val(),
            content: $('#content').val()
        };

        $.ajax({
            url: "{{ route('blogs.store') }}",
            type: "POST",
            data: JSON.stringify(jsonData),   
            contentType: "application/json",  
            dataType: "json",                 
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (response) {
                console.log(response);
                alert(response.message);
                $('#blogForm')[0].reset();
                // $('#blogForm').remove(); // removes
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });

    });

});
</script>

