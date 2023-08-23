<div class="modal fade" id="medicineAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Medicine</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="mediForm">
            
            <div class="mb-3">
                <label for="name">Medicine Name</label>
                <input type="text" name="name" id="medicinename" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="take_time">Take Time</label>
                <select class="form-select" name="take_time" id="take_time">
                    <option value="-1">Select Take Time</option>
                    <option value="1 + 0 + 0">1 + 0 + 0</option>
                    <option value="0 + 1 + 0">0 + 1 + 0</option>
                    <option value="0 + 0 + 1">0 + 0 + 1</option>
                    <option value="0 + 1 + 1">0 + 1 + 1</option>
                    <option value="1 + 1 + 1">1 + 1 + 1</option>
                    <option value="1 + 0 + 1">1 + 0 + 1</option>
                    <option value="1 + 1 + 0">1 + 1 + 0</option>
                    <option value="0 + 1 + 1">0 + 1 + 1</option>
                    
                </select>    
            </div>
            <div class="mb-3">
         
                <input checked type="radio" name="meal" id="after" value="After Meal"> 
                <label for="after">After Meal</label>
                |
             
                <input type="radio" name="meal" id="before" value="Before Meal"> 
                <label for="before">Before Meal</label>
                |
                
                <input type="radio" name="meal" id="any" value="Any Time">
                <label for="any">Any Time</label>
            </div> 
            <div class="mb-3">
                <label for="how_day">How Day Eat</label>
                <input class="form-control" type="text" name="how_day" id="how_day">
            </div>         
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="medicineSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Medicine</button>
        </div>
      </div>
    </div>
  </div>

  <script>

    async function medicineSubmit(){
        let medicine = $("#medicinename").val();
        let take_time = $("#take_time").val();
        let meal = $('input[name="meal"]:checked').val();
        let how_day = $("#how_day").val();

        if(medicine == ""){
            alert("Please Select Medicine")
        }else if(take_time == "-1"){
            alert("Please Select Take Time")
        }else if(meal == ""){
            alert("Please Select Meal Time")
        }else if(how_day == ""){
            alert("Please Enter day ")
        }else{

            let mediContainer = $("#medications-container")

            let row = ` <div class="medication-item d-flex align-items-center justify-content-between mb-2">
                        <div>
                           <div class="d-flex align-items-center">
                            <h6>${medicine}</h6>
                            <p id="day" class="ms-4 ">${how_day}</p>
                           </div>
                            <p id="time_meal">  ${take_time} ( ${meal} )</p>
                        </div>
                        <div>
                            <a id="removeMedicine"  class="btn btn-danger text-white">Remove</a>
                        </div>
                    </div>`
            $("#medicineAddModal").modal("hide")
            $("#mediForm")[0].reset();
            mediContainer.append(row);
        }
    }
    $(document).ready(function() {     
        // For test autocomplete
        $("#medicinename").autocomplete({
        
            source: function(request, response) {
                axios.get("/dashboard/medicine-prescription", {
                        params: {
                            term: request.term
                        }
                    }).then(function(res) {
                        var formattedData = res.data.map(function(item) {
                        return {
                            label:item.type + "." + " " +  item.name + " (" + item.power + ")",
                            value: item.type + "." + " " +  item.name + " (" + item.power + ")"
                        };
                        });
                        response(formattedData);
                    });
                },
                minLength: 1,
                appendTo: "#medicineAddModal"
            });


        });
  </script>