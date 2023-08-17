   {{-- form modal  --}}
   <div class="modal fade" id="branchUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Branch</h1>
          <button onclick="updateClose()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formUpdate">
            <input type="hidden" name="bran_id" id="bran_id">
            <div class="mb-3">
                <label for="name">Branch Name</label>
                <input type="text" name="name" id="bran_name" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" name="address" id="bran_address" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="bran_phone" class="form-control" >
            </div>
            <div class="mb-3">
                <img id="preview" class="w-25" src="{{asset("assets/admin/img/default.jpg")}}" alt="">
            </div>
            <div class="mb-3">
                <input oninput="preview.src = window.URL.createObjectURL(this.files[0])" type="file" name="image" id="bran_img" class="form-control" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button onclick="updateClose()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="handleUpdate()" id="submit_btn" type="button" class="btn btn-primary">Update Branch</button>
        </div>
      </div>
    </div>
  </div>

  <script>
      function updateClose(){
      $("#preview").attr("src","{{asset("assets/admin/img/default.jpg")}}")
      $("#formUpdate")[0].reset();

  }
  // Update
    async function updateBranch(id){
       
        let res = await axios.get(`/dashboard/single-branch/${id}`)

        if(res.data.error){
            Swal.fire(
                'Message!',
                res.data.msg,
                res.data.success
            )
        }else{
            $("#bran_id").val(res.data.data.id)
            $("#bran_name").val(res.data.data.name)
            $("#bran_address").val(res.data.data.address)
            $("#bran_phone").val(res.data.data.phone)
            $("#preview").attr("src",`{{asset('storage/${res.data.data.image}')}}`)
        }
    }

    async function handleUpdate(){
          
          let id = $("#bran_id").val();
          let name = $("#bran_name").val();
          let address = $("#bran_address").val();
          let phone = $("#bran_phone").val();
          let image = $('#bran_img')[0].files[0];
  

          if(id && name && address && phone ){
            try {
              var formData = new FormData();
              formData.append('id', id);
              formData.append('name', name);
              formData.append('address', address);
              formData.append('phone', phone);
              formData.append('image', image);
              let res = await axios.post("/dashboard/update-branch",formData);

            
              if(res.data.error){
                Swal.fire(
                      'Message!',
                      res.data.msg,
                      res.data.success
                 )
              }else{
                $('#branchUpdateModal').modal('hide');
                updateClose()
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