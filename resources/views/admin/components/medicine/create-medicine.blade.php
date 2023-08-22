 {{-- form modal  --}}
 <div class="modal fade" id="medicineModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Medicine</h1>
          <button onclick="formClose()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form">
            <input type="hidden" name="medicine_id" id="medicine_id">

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" >
            </div>
            
            <div class="mb-3">
                <label for="type">Medicine Type</label>
                <select class="form-select" name="type" id="type">
                  <option value="-1">Select Medicine Type</option>
                  <option value="Tablet">Tablet</option>
                  <option value="Capsule">Capsule</option>
                  <option value="Syrup">Syrup</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="power">Power</label>
                <input type="text" name="power" id="power" class="form-control" >
            </div>
           
            
          </form>
        </div>
        <div class="modal-footer">
          <button onclick="formClose()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="handleSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Medicine</button>
        </div>
      </div>
    </div>
  </div>
{{-- form modal  --}}

<script>
    // Reset Form
  function formClose(){
    $("#form")[0].reset()
    $("#medicine_id").val("");
    $("#submit_btn").html("Add Medicine")
  }

async function handleSubmit(){

    let medicine_id = $("#medicine_id").val();
    let name = $("#name").val();
    let type = $("#type").val();
    let power = $("#power").val();


    if(type == "-1"){
      alert("Please Select Medicine Type")
    }else if(name == ""){
      alert("Enter Medicine Name")
    }else{
        try {
          var formData = new FormData();

          formData.append('medicine_id', medicine_id);
          formData.append('name', name);
          formData.append('type',type);
          formData.append('power', power);
          

          let res = await axios.post("/dashboard/create-medicine",formData);
          
          if(res.data.error){
            Swal.fire(
                  'Message!',
                  res.data.msg,
                  res.data.success
            )
          }else{
            $("#medicineModal").modal("hide");
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