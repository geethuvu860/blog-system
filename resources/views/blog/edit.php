
 @include('layout.header')
  @include('layout.sidebar')

  <!-- Main Content -->
    <main>
    <div class="container-fluid">
      <h3 class="mb-4">BLOG LISTING</h3>
      <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#blogedit">
  Add Blog
</button>

<!-- Modal -->
<div class="modal fade" id="blogedit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="blogaddLabel">View Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form id="blogForm">

          <input type="hidden" id="blog_id">

          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" id="title" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea class="form-control" id="content" rows="4" readonly></textarea>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

<body>
  

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>


<script>
$(document).on('click', '.editBtn', function () {
  alert("hello");

    let blogId = $(this).data('id');

    $.ajax({
        url: "/blogs/" + blogId,
        type: "GET",
        success: function (response) {

            // fill modal inputs
            $('#title').val(response.blog.title);
            $('#content').val(response.blog.content);

            // open modal
            let modal = new bootstrap.Modal(
                document.getElementById('blogedit')
            );
            modal.show();
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });

});
</script>
