<div class="modal fade" id="testAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Test</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm">
            
            <div class="mb-3">
                <label for="name">Test Name</label>
                <input type="text" name="name" id="testname" class="form-control" >
            </div>          
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="handleSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Test</button>
        </div>
      </div>
    </div>
  </div>

  <script>

      // Handle Submit
      function handleSubmit(){
            let text = $("#testname").val()

            let testList = $("#test_list");

            var row = ` <li class="d-flex align-items-center justify-content-between mb-2">
                                <h6>${text}</h6>
                                <a id="removeTest" class="btn btn-danger">Remove</a>
                            </li>`

                testList.append(row);
                
            $("#testAddModal").modal("hide")
            $("#testname").val("")
        }

    $(document).ready(function() {

     
        // For test autocomplete
        $("#testname").autocomplete({
           
            source: function(request, response) {
                axios.get("/dashboard/test-prescription", {
                    params: {
                        term: request.term
                    }
                }).then(function(res) {
                    response(res.data)
                });
            },
            minLength: 1,
            appendTo: "#testAddModal"
        });

      
    });
  </script>