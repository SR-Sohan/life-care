{{-- content list start  --}}
@include('admin.components.loading')
<div class="content_list mt-5">
   <table id="table_content"  class="table table-primary table-striped">
       <thead>
           <tr>
               <th>Sl.</th>
               <th>Name</th>
               <th>Department</th>
               <th>Doctor</th>
               <th>Appointment Date</th>
               <th>Status</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody id="table_body">
       </tbody>
   </table>
</div>
{{-- content list end --}}

<script>
    // LoadData Function
loadData()
async function loadData() {
    let table = $("#table_content");
    let tableBody = $("#table_body");

    showLoading();

    try {

        let res = await axios.get("/dashboard/appoitnments");     
        hideLoading(); 
 

        table.DataTable().destroy();
        tableBody.empty();


        if (Array.isArray(res.data)) {
           ; 

            res.data.forEach(function(item, index) {

                
               
                let newRow = `<tr>
                    <td>${index + 1}</td>
                    <td>${item.user.name}</td>
                    <td >${item.department.name}</td>
                    <td >${item.doctor.name}</td>
                    <td >${item.appointment_date}</td>
                    <td> 
                        <select id='status' data-id="${item.id}" class="form-select" value='${item.status}'>
                            <option value='cancel' ${item.status == 'cancel' && 'selected'}>Cancel</option>
                            <option value='pending' ${item.status == 'pending' && 'selected'}>Pending</option>                            
                            <option value='complete' ${item.status == 'complete' && 'selected'}>Complete</option>
                        </select>  
                    </td>

                    <td>
                        <i data-bs-toggle="modal" data-bs-target="#createModal" onclick="updateItem(${item.id})" id="editBtn" class="fa-solid fa-pen-to-square"></i>
                        <i onclick="deleteItem(${item.id})"  id="deleteBtn" class="fa-solid fa-trash"></i>
                    </td>
                    <!-- Add more columns as needed -->
                </tr>`;
            
                tableBody.append(newRow);
                
            });
        } else {
            alert("Response data is not an array.");
        }
    } catch (error) {
        console.error(error);
    }

    new DataTable("#table_content",{
        lengthMenu: [15,30,50,100],
        order: [[0,"asc"]]
    });
}

// Change Status
$("#table_body").on("change","#status",function(){
    let val = $(this).val()
    let id = $(this).data("id")
    
    axios.post("/dashboard/update-status", {
        id: id,
        newStatus: val
    })
    .then(res => {
        Swal.fire(
            'Message!',
            res.data.message,
            'success'
        )
    })
    .catch(error => {
        console.error("Error updating status:", error);
    });
})



</script>