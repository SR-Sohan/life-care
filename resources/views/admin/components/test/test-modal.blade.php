   {{-- form modal  --}}
   <div class="modal fade" id="test" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 i class="modal-title fs-5" id="pageTitle">Add Test</h1>
          <button onclick="resetForm()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form">
            <input type="hidden" name="test_id" id="test_id">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button onclick="resetForm()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="handleSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Test</button>
        </div>
      </div>
    </div>
  </div>
{{-- form modal  --}}

<script>

function resetForm(){
    $("#form")[0].reset();
    $("#submit_btn").html("Add Test")
    $("#pageTitle").html("Add Test")
}

  // Form Submit
  async function handleSubmit(){

      let id = $("#test_id").val();
      let name = $("#name").val();
      let price = $("#price").val();
    
      if(name == ""){
        alert("Please Enter Nmae")
      }else if(price == ""){
        alert("Please Enter Price")
      }else{

       try {
        var formData = new FormData();
            formData.append('id', id);
            formData.append('name', name);
            formData.append('price', price);

            let res = await axios.post("/dashboard/upload-test",formData);

            if(res.data.error){
              Swal.fire(
                  'Message!',
                  res.data.msg,
                  res.data.success
              )
            }else{
                $('#test').modal('hide');
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
  
   // Update
async function updateItem(id){
  $("#submit_btn").html("Update Test")
    $("#pageTitle").html("Update Test")
let res = await axios.get(`/dashboard/single-test/${id}`)

if(res.data.data.error){
    Swal.fire(
          'Message!',
          res.data.data.msg,
          res.data.data.success
      )
}else{
  $("#test_id").val(res.data.data.id)
  $("#name").val(res.data.data.name)
  $("#price").val(res.data.data.price)
}

}


</script>