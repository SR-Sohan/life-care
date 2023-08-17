 {{-- form modal  --}}
 <div class="modal fade" id="doctorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Doctor</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form">
            <div class="mb-3">
                <label for="branch">Branch Name</label>
              <select name="branch_id" id="branch_id" class="form-select">
                <option value="-1">Select Branch</option>
                @forelse ($branches as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                <option >No Branch Yet</option>
                @endforelse

              </select>
            </div>
            <div class="mb-3">
                <label for="department">Department Name</label>
              <select name="department_id" id="department_id" class="form-select">
                <option value="-1">Select Department</option>
                @forelse ($departments as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                <option >No Department Yet</option>
                @endforelse
              </select>
            </div>
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="position">Position</label>
                <input type="text" name="position" id="position" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" >
            </div>
            <div class="mb-3">
                <input type="file" name="image" id="image" class="form-control" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="submit_btn" type="button" class="btn btn-primary">Add Doctor</button>
        </div>
      </div>
    </div>
  </div>
{{-- form modal  --}}
<script>
    
      // Add
      $("#submit_btn").click(function(){
         let branch_id = $("#branch_id").val();
         let department_id = $("#department_id").val();
         let name = $("#name").val();
         let position = $("#position").val();
         let phone = $("#phone").val();
         let address = $("#address").val();
         let image = $('#image')[0].files[0];

         if (name && branch_id  && department_id) {

                    var formData = new FormData();
                    formData.append('branch_id', branch_id);
                    formData.append('department_id', department_id);
                    formData.append('name', name);
                    formData.append('position', position);
                    formData.append('phone', phone);
                    formData.append('address', address);
                    formData.append('image', image);

                    $.ajax({
                        url: '{{url('dashboard/upload-doctor')}}', 
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                        if(!response.error){
                            $('#exampleModal').modal('hide');
                            $("#form")[0].reset();
                            // loadData(1);
                            Swal.fire(
                            'Message!',
                            response.msg,
                            response.success
                            )
                        }
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    })
                }else{
                    alert("Please Fill Up All Field")
                }
        })
</script>