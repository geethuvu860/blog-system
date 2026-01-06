
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
                <th>Rollno</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Mark</th>
                </tr>
               
            </thead>
            <tbody>
              @forelse($records as $record)
                <tr>
                    <td>1</td>
                    <td>
                        {{ $record->name }} 
                    </td>
                    <td>maths</td>
                    <td>50</td>
                </tr>
               
            @empty
        <tr>
            <td colspan="4" class="text-center">There is no data found</td>
        </tr>
    @endforelse
</tbody>

        </table>
        </div>
