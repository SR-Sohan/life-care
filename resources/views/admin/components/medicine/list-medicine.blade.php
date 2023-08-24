{{-- content list start  --}}

@include('admin.components.loading')

<div class="content_list mt-5">
    <table id="table_content"  class="table table-primary table-striped">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th>Type</th>
                <th>Power</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table_body">
        </tbody>
    </table>
</div>
{{-- content list end --}}

<script>

    // Load Data 
loadData();
async function loadData(){

    let table = $("#table_content")
    let tableBody = $("#table_body")

    showLoading()
    let res = await axios.get("/dashboard/medicines");
    hideLoading();

    table.DataTable().destroy();
    tableBody.empty();

    if(Array.isArray(res.data)){

        res.data.forEach((item,index) => {
            let newRow = `<tr>
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td>${item.type}</td>
                    <td>${item.power}</td>
                    <td >
                        <i data-bs-toggle="modal" data-bs-target="#medicineModal" onclick="updateItem(${item.id})" id="editBtn" class="fa-solid fa-pen-to-square"></i>
                         <i onclick="deleteItem(${item.id})"  id="deleteBtn" class="fa-solid fa-trash"></i>
                    </td>
                </tr>`;

                tableBody.append(newRow);
        });
    }else{
        alert("Data Array Not Found");
    }

    new DataTable("#table_content",{
        lengthMenu: [15,30,50,100],
        order: [[0,"asc"]]
    });

}


async function updateItem(id){

$("#submit_btn").html("Update Medicine")

let res = await axios.get(`/dashboard/medicines-single/${id}`);


if(res.data.error){
    Swal.fire(
        'Message!',
        res.data.msg,
        res.data.success
    )
}else{
    $("#medicine_id").val(res.data.data.id)
    $("#name").val(res.data.data.name)
    $("#type").val(res.data.data.type)
    $("#power").val(res.data.data.power)
    
    
}


}



async function deleteItem(id){

const confirmed = await Swal.fire({
    title: 'Confirm Deletion',
    text: 'Are you sure you want to delete this ward?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, delete it!'
});

if (confirmed.isConfirmed) {
    try {
        let res = await axios.get("/dashboard/medicine-delete", {
            params: {
                id: id
            }
        });
        
        
        if(res.data.error){
            Swal.fire(
                  'Message!',
                  res.data.msg,
                  res.data.success
             )
        }else{
            loadData()
            Swal.fire(
                  'Message!',
                  res.data.msg,
                  res.data.success
             )
        }

    } catch (error) {
        console.error("An error occurred:", error);
    }
}
}
</script>