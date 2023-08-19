 {{-- form modal  --}}
 <div class="modal fade" id="doctorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Doctor</h1>
          <button onclick="formClose()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm">
           
            <input type="hidden" class="form-control" name="branch_id" id="branch_id" value="{{$branch_Id}}">

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
                <input type="number" name="phone" id="phone" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" >
            </div>
            <div class="mb-3">
              <img id="imgPreview" class="w-25" src="{{asset("assets/admin/img/default.jpg")}}" alt="">
          </div>
            <div class="mb-3">
                <input oninput="imgPreview.src = window.URL.createObjectURL(this.files[0])" type="file" name="image" id="image" class="form-control" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button onclick="formClose()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="handleSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Doctor</button>
        </div>
      </div>
    </div>
  </div>
{{-- form modal  --}}
<script>

       //  Form close
  function formClose(){
      $("#imgPreview").attr("src","{{asset("assets/admin/img/default.jpg")}}")
      $("#createForm")[0].reset();

  }
 
    async function handleSubmit(){
          let username = $("#username").val();
          let useremail = $("#useremail").val();
          let password = $("#password").val();
          let branch_id = $("#branch_id").val();
          let department_id = $("#department_id").val();
          let name = $("#name").val();
          let position = $("#position").val();
          let address = $("#address").val();
          let phone = $("#phone").val();
          let image = $('#image')[0].files[0];


          if(username == ""){
            alert("Please enter user name")
          }else if(useremail == ""){
            alert("Please enter user email")
          }else if(password <= 7){
            alert("Please enter password at least 8 charcter")
          }else if(branch_id == ""){
            alert("Please insert branch id")
          }else if(department_id == ""){
            alert("Please Select Department")
          }else if(name == ""){
            alert("Please enter Doctor Name")
          }else if(position == ""){
            alert("Please enter Doctor Position")
          }else if(address == ""){
            alert("Please enter Doctor Address")
          }else if(phone == ""){
            alert("Please enter Doctor Phone")
          }else if(!image){
            alert("Please select Doctor image")
          }else{


              try {
                  var formData = new FormData();
                  formData.append('username', username);
                  formData.append('useremail', useremail);
                  formData.append('password', password);
                  formData.append('branch_id', branch_id);
                  formData.append('department_id', department_id);
                  formData.append('name', name);
                  formData.append('position', position);
                  formData.append('address', address);
                  formData.append('phone', phone);
                  formData.append('image', image);
                  let res = await axios.post("/dashboard/upload-doctor",formData);

                  if(res.data.error){
                      Swal.fire(
                            'Message!',
                            res.data.msg,
                            res.data.success
                      )
                    }else{
                      $('#doctorModal').modal('hide');
                      formClose()
                      loadData()
                      Swal.fire(
                            'Message!',
                            res.data.msg,
                            res.data.success
                      )
                    }

                
              } catch (error) {
                
              }

          }
      }
  

    
</script>