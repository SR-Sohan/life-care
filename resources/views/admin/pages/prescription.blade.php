@extends('layouts.aLayout')
@section('acontent')
    {{-- page heading start  --}}
    <div class="page_heading mt-3 bg-secondary p-3 d-flex align-items-center justify-content-between">
       <h2 class="text-white">Prescription</h2>
    </div>
    {{-- page heading end --}}

    <div class="prescription_wrap mt-3">
        <form  id="form">
            <div class="mb-3">
                <label for="user_id">User Id</label>
                <input class="form-control" type="number" name="user_id" id="user_id">
            </div>
            <div class="form_wrap border w-100 d-flex">
               
                <div class="test_wrap w-50 pe-3 ps-2 py-3">
                    <div style="border-bottom: 2px solid #ddd"  class="form_heading d-flex align-items-center justify-content-between pb-1">
                        <h4>Add Test</h4>
                        <div class="page_add">
                            <a data-bs-toggle="modal" data-bs-target="#testAddModal" class="btn btn-primary text-white"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
    
                    <div id="test_content" class="mt-3">
                        <ol id="test_list"> 
                        </ol>
                    </div>
               </div>
               <div style="border-left: 2px solid #000; " class="medicine_wrap w-50 ps-3 pe-2 py-3">
                <div style="border-bottom: 2px solid #ddd" class="form_heading d-flex align-items-center justify-content-between pb-1">
                    <h4>Add Medicine</h4>
                    <div class="page_add">
                        <a data-bs-toggle="modal" data-bs-target="#medicineAddModal" class="btn btn-primary text-white"><i class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
                <div id="medications-container" class="mt-3">
                    
                </div>
               </div>
            </div>
            <div class="w-100  d-flex justify-content-end mt-3">
                <a onclick="printSave()" class="btn btn-primary text-white">Print & Save</a>
            </div>
        </form>
    </div>

    @include('admin.components.prescription.test-prescription')
    @include('admin.components.prescription.medicine-prescription')


    <script>

        // Print & Save
        async function printSave(){
            
            // Test Data to json
            var tests = [];        
            $(".single_test").each(function(index) {
                var test = {};
                
                test.name = $(this).find("h6").text().trim();                
                tests.push(test);
            });        
            var testData = JSON.stringify(tests);

            // Medicine Data to Json
            var medicines = [];
            $(".medication-item").each(function(index){
                var medicine = {};
                medicine.name = $(this).find("h6").text()
                medicine.day = $(this).find("#day").text()
                medicine.time_meal = $(this).find("#time_meal").text()

                medicines.push(medicine)
            })

            let medicineData = JSON.stringify(medicines)

            let user_id = $("#user_id").val();

            if(user_id == ""){
                alert("Please Enter Patient Id")
            }else{

                var formData = new FormData();
                formData.append('user_id', user_id);
                formData.append('test', testData);
                formData.append('medicine', medicineData);

                let res = await axios.post("/dashboard/create-prescription",formData)

                if(res.data.error){
                    Swal.fire(
                        'Message!',
                        res.data.msg,
                        res.data.success
                    )
                }else{
                    let pId = res.data.id;
                    //  let result = await axios.get(`/dashboard/print-prescription/${pId}`)

                   

                    var reportWindow = window.open(`/dashboard/print-prescription/${pId}`);    
          
                    reportWindow.onload = function() {
                        reportWindow.print();
                    };

                    $("#form")[0].reset();
                    // location.reload();
                    
                }
               
            }

        
        }

    // Remove Item
      $("#test_list").on("click","#removeTest",function(){
        $(this).parent().remove();
      })
      $("#medications-container").on("click","#removeMedicine",function(){
        $(this).parent().parent().remove();
      })

    </script>
    
@endsection