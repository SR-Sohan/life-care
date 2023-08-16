   {{-- form modal  --}}
   <div class="modal fade" id="branchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Branch</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form">
            <input type="hidden" name="branch_id" id="branch_id">
            <div id="userForm" class="mb-3">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <div>
                        <label for="username">User Name</label>
                        <input type="text" name="name" id="username" class="form-control" required >
                    </div>
                    <div>
                        <label for="useremail">User Email</label>
                        <input type="email" name="useremail" id="useremail" class="form-control" required >
                    </div>
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <div>
                        <label for="password">User Password</label>
                        <input type="password" name="password" id="password" class="form-control" required >
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="name">Branch Name</label>
                <input type="text" name="name" id="name" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control" >
            </div>
            <div class="mb-3">
                <input type="file" name="image" id="image" class="form-control" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="handleSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Branch</button>
        </div>
      </div>
    </div>
  </div>

  <script>

    async function handleSubmit(){
          let username = $("#username").val();
          let useremail = $("#useremail").val();
          let password = $("#password").val();
          let name = $("#name").val();
          let address = $("#address").val();
          let phone = $("#phone").val();
          let image = $('#image')[0].files[0];
  

          if(username && useremail && password && name && address && phone && image){
            try {
              var formData = new FormData();
              formData.append('username', username);
              formData.append('useremail', useremail);
              formData.append('password', password);
              formData.append('name', name);
              formData.append('address', address);
              formData.append('phone', phone);
              formData.append('image', image);
              let res = await axios.post("/dashboard/upload-branch",formData);
            
              if(res.data.error){
                Swal.fire(
                      'Message!',
                      res.data.msg,
                      res.data.success
                 )
              }else{
                $('#branchModal').modal('hide');
                $("#form")[0].reset();
                loadData()
                Swal.fire(
                      'Message!',
                      res.data.msg,
                      res.data.success
                 )
              }
           
              
            } catch (error) {
              
            }
          }else{
            alert("Please Fill Up Filed")
          }
    }
   
  </script>
{{-- form modal  --}}