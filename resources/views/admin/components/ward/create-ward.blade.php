 {{-- form modal  --}}
 <div class="modal fade" id="wardModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ward</h1>
          <button onclick="formClose()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form">
            <input type="hidden" name="ward_id" id="ward_id">
            <input type="hidden" name="branch_id" id="branch_id" value="{{$branch_id}}">
            <div class="mb-3">
                <label for="ward_type">Ward Type</label>
                <select class="form-select" name="ward_type" id="ward_type">
                  <option value="-1">Select Ward Type</option>
                  <option value="icu">ICU</option>
                  <option value="ac">AC</option>
                  <option value="non-ac">Non-AC</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ward_number">Ward Number</label>
                <input type="text" name="ward-no" id="ward_number" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="name"> Ward Name</label>
                <input type="text" name="name" id="name" class="form-control" >
            </div>
            
          </form>
        </div>
        <div class="modal-footer">
          <button onclick="formClose()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="handleSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Ward</button>
        </div>
      </div>
    </div>
  </div>
{{-- form modal  --}}

<script>
  // Reset Form
  function formClose(){
    $("#form")[0].reset()
    $("#submit_btn").html("Add Ward")
  }

  async function handleSubmit(){
    let ward_id = $("#ward_id").val();
    let branch_id = $("#branch_id").val();
    let ward_type = $("#ward_type").val();
    let ward_number = $("#ward_number").val();
    let name = $("#name").val();

    if(ward_type == "-1"){
      alert("Please Select Ward Type")
    }else if(ward_number == ""){
      alert("Enter Ward Number")
    }else if(name == ""){
      alert("Enter Ward Name")
    }else{
        try {
          var formData = new FormData();

          formData.append('ward_id', ward_id);
          formData.append('branch_id', branch_id);
          formData.append('ward_type', ward_type);
          formData.append('ward_number', ward_number);
          formData.append('name', name);

          let res = await axios.post("/dashboard/create-ward",formData);
          
          if(res.data.error){
            Swal.fire(
                  'Message!',
                  res.data.msg,
                  res.data.success
            )
          }else{
            $("#wardModal").modal("hide");
            loadData();
            formClose();
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