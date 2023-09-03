{{-- content list start  --}}
<div class="money_wrap">
    <div class="paient_info bg-white p-3 d-flex align-items-center justify-content-between">
        <div class="mb-3">
            <label for="patient_id">Patient Id</label>
            <input class="form-control" type="number" name="patient_id" id="patient_id">
        </div>
        <div class="mb-3">
            <label for="patient_name">Patient Name</label>
            <input class="form-control" type="text" name="patient_name" id="patient_name">
        </div>
        <div class="mb-3">
            <label for="doctor_name">Reffered Doctor</label>
            <input class="form-control" type="text" name="doctor_name" id="doctor_name">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form action="">
              <table class="table text-right">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Test Name</th>
                        <th>Test Price</th>
                        <th>Acticon</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   
                </tbody>
              </table>
              <button id="addBtn" type="button" class="btn btn-outline-primary text-right">Add Test</button>
            </form>
        </div>
        <div class="col-md-3 bg-white">

        </div>
    </div>
</div>
{{-- content list end --}}

<script>

    // Doctor autocomplete
    $("#doctor_name").autocomplete({
        source: function(request, response) {
            axios.get("/dashboard/doctor", {
                    params: {
                        term: request.term
                    }
                }).then(function(res) {
                    var formattedData = res.data.map(function(item) {
                    return {
                        label:  item.name ,
                        value: item.name,
                    };
                    });
                    response(formattedData);
                });
            },
            minLength: 1,
    })

    // Patient autocomplete 
    $("#patient_id").autocomplete({
        
        source: function(request, response) {
            axios.get("/dashboard/patient-id", {
                    params: {
                        term: request.term
                    }
                }).then(function(res) {
                    var formattedData = res.data.map(function(item) {
                    return {
                        label:  item.id ,
                        value: item.id,
                        name: item.name
                    };
                    });
                    response(formattedData);
                });
            },
            minLength: 1,
            select: function (event, ui) {
                    $("#patient_name").val(ui.item.name)
            },
        });

    // Serail Number
    function updateSerialNumbers() {
        $("#tbody tr").each(function (index) {
            $(this).find(".serial-number").text(index + 1);
        });
    }

    // Remove Test
    $("#tbody").on("click",".removeTest",function(){
      $(this).parent().parent().remove();
      updateSerialNumbers()
    }) 
 
    // Add Test
    $("#addBtn").click(function(){
        let tbody = $("#tbody");
        let newSerialNumber = tbody.find("tr").length + 1;

        let row = `<tr>
                        <td class="serial-number">${newSerialNumber}</td>
                        <td><input type="text" class="test_name"></td>
                        <td><input type="number" class="price" disabled></td>
                        <td><p class="text-danger removeTest">Remove</p></td>
                    </tr>`;

        tbody.append(row)

        let test_name_input = $(".test_name:last");
        let price_input = $(".price:last");
        test_name_input.autocomplete({
            source: function(request, response) {
                axios.get("/dashboard/test-name", {
                        params: {
                            term: request.term
                        }
                    }).then(function(res) {
                        var formattedData = res.data.map(function(item) {
                            return {
                                label:  item.name ,
                                value:  item.name ,
                                price: item.price
                            };
                        });
                        response(formattedData);

                    });
                },
                minLength: 1,
                select: function (event, ui) {
                    // When a test name is selected, set the corresponding price
                    price_input.val(ui.item.price);
                },
            });
        
    })
</script>