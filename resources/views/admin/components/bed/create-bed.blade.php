    {{-- form modal  --}}
    <div class="modal fade" id="bedmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 id="pageTitle" class="modal-title fs-5" id="exampleModalLabel">Add Department</h1>
              <button onclick="resetForm()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="form">
             
                <div class="mb-3">
                    <label for="ward">Ward</label>
                    <select name="ward" id="ward" class="form-select">
                        <option value="-1">Select Ward</option>
                        @forelse ($ward as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @empty
                            
                        @endforelse
                    </select>
                    
                </div>
                <div class="mb-3">
                    <label for="bed_number">Bed Number</label>
                    <input type="number" name="bed_number" id="bed_number" class="form-control" >
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button onclick="resetForm()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button onclick="handleSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Bed</button>
            </div>
          </div>
        </div>
      </div>
    {{-- form modal  --}}

    <script>

      // Rest Form
      function resetForm(){
        $("#form")[0].reset();
        $("#bedmodal").modal("hide")
      }

      async function handleSubmit () {
       let ward_id = $("#ward").val();
       let bed_number = $("#bed_number").val();

        if(ward_id == "-1"){
          alert("Please Select Ward")
        }else if(bed_number == ''){
          alert("Please Enter Bed Number")
        }else {

            var formData = new FormData();
                formData.append("ward_id",ward_id);
                formData.append("bed_number",bed_number);

                let res = await axios.post("/dashboard/create-bed",formData)

                if(res.data.error){
                  Swal.fire(
                    'Message!',
                    res.data.msg,
                    res.data.success
                  )
                }else{
                  resetForm();
                  loadData();
                  Swal.fire(
                    'Message!',
                    res.data.msg,
                    res.data.success
                  )
                }
        }

      }
    </script>