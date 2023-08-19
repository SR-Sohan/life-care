
    {{-- form modal  --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 id="pageTitle" class="modal-title fs-5" id="exampleModalLabel">Add Department</h1>
              <button onclick="resetForm()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="createForm">
                <input type="hidden" name="id" id="department_id">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control" >
                </div>
                <div class="mb-3">
                    <img id="preview" class="w-25" src="{{asset("assets/admin/img/default.jpg")}}" alt="">
                </div>
                <div class="mb-3">
                    <input oninput="preview.src = window.URL.createObjectURL(this.files[0])" type="file" name="image" id="image" class="form-control" >
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button onclick="resetForm()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button onclick="handleSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Department</button>
            </div>
          </div>
        </div>
      </div>
    {{-- form modal  --}}

    <script>

        function resetForm(){
            $("#preview").attr("src","{{asset("assets/admin/img/default.jpg")}}")
            $("#createForm")[0].reset();
            $("#submit_btn").html("Add Department")
            $("#pageTitle").html("Add Department")
        }

        async function handleSubmit(){
            let id = $("#department_id").val();
            let name = $("#name").val();
            let description = $("#description").val();
            let image = $('#image')[0].files[0];


                if( name && description ){
                try {
                    var formData = new FormData();
                    formData.append('id', id);
                    formData.append('name', name);
                    formData.append('description', description);
                    formData.append('image', image);
                    let res = await axios.post("/dashboard/upload-department",formData);
                
                    if(res.data.error){
                    Swal.fire(
                            'Message!',
                            res.data.msg,
                            res.data.success
                        )
                    }else{
                    $('#createModal').modal('hide');
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
                }else{
                alert("Please Fill Up Filed")
                }
        }
        
      // Update
      async function updateItem(id){

        let res = await axios.get(`/dashboard/single-department/${id}`)

        if(res.data.data.error){
            Swal.fire(
                  'Message!',
                  res.data.data.msg,
                  res.data.data.success
              )
        }else{
          $("#department_id").val(res.data.data.id)
          $("#name").val(res.data.data.name)
          $("#description").val(res.data.data.description)
          $("#submit_btn").html("Update Department")
          $("#pageTitle").html("Update Department")
          $("#preview").attr("src",`{{asset('storage/${res.data.data.image}')}}`)
        }

      }
    </script>