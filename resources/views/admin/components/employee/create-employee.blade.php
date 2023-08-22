
    {{-- form modal  --}}
    <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 id="pageTitle" class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
              <button onclick="resetForm()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="form">
                <div id="userForm" class="mb-3">
                    <div class="mb-3 d-flex align-items-center justify-content-between">
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required >
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
                        <div>
                            <label for="role">Employee Role</label>
                            <select name="role" id="role" class="form-select">
                                <option value="-1">Select Role</option>
                                <option value="lab">Lab</option>
                                <option value="receiption">Receiption</option>
                                <option value="cashier">Cashier</option>
                                <option value="report">Report</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input class="form-control" type="text" name="address" id="address">
                </div>
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input class="form-control" type="number" name="phone" id="phone">
                </div>
                <div class="mb-3">
                    <img class="w-25" src="{{asset("assets/admin/img/default.jpg")}}" id="preview" alt="">
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input oninput="preview.src =  window.URL.createObjectURL(this.files[0])" class="form-control" type="file" name="image" id="image">
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button onclick="resetForm()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button onclick="handleSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Empolyee</button>
            </div>
          </div>
        </div>
      </div>
    {{-- form modal  --}}

    <script>

        function resetForm(){           
            $("#form")[0].reset();
            $("#imgPreview").attr("src","{{asset("assets/admin/img/default.jpg")}}")
        }

        async function handleSubmit(){
            let name = $("#name").val();
            let email = $("#useremail").val();
            let password = $('#password').val();
            let role = $('#role').val();
            let address = $("#address").val();
            let phone = $("#phone").val();
            let image = $("#image")[0].files[0];;

            if(name == ""){
                alert("Please Entry Employee Name")
            }else if(email == ""){
                alert("Please Entry Employee Email")
            }else if(password.length <=7 ){
                alert("Password must be 8 Character")
            }else if(role == "-1"){
                alert("Please Employee Role")
            } else if(address == ""){
                alert("Please Enter Address");
            }else if(phone == ""){
                alert("Please Enter Phone");
            }else if(!image){
                alet("Select Image")
            }else{

                try {

                    var formData = new FormData();
                    formData.append("name",name)
                    formData.append("email",email)
                    formData.append("password",password)
                    formData.append("role",role)
                    formData.append('address', address);
                    formData.append('phone', phone);
                    formData.append('image', image);

                    let res = await axios.post("/dashboard/upload-employee",formData);
                    if(res.data.error){
                        Swal.fire(
                            'Message!',
                            res.data.msg,
                            res.data.success
                        )
                    }else{
                        $('#employeeModal').modal('hide');
                        resetForm()
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