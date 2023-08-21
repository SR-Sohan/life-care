{{-- content list start  --}}
@include('admin.components.loading')
<div class="content_list mt-5">
    <table id="table_content"  class="table table-primary table-striped">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Ward Type</th>
                <th>Ward Name</th>
                <th>Ward Number</th>
                <th>Branch Name</th>
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
    let res = await axios.get("/dashboard/wards");
    hideLoading();
    if(Array.isArray(res.data)){
        tableBody.empty();

        res.data.forEach((item,index) => {
            let newRow = `<tr>
                    <td>${index + 1}</td>
                    <td>${item.ward_type}</td>
                    <td>${item.name}</td>
                    <td>${item.ward_number}</td>
                    <td>${item.branch.name}</td>
                    <td >
                        <i data-bs-toggle="modal" data-bs-target="#createModal" onclick="updateItem(${item.id})" id="editBtn" class="fa-solid fa-pen-to-square"></i>
                         <i onclick="deleteItem(${item.id})"  id="deleteBtn" class="fa-solid fa-trash"></i>
                    </td>
                </tr>`;

                tableBody.append(newRow);
        });
    }else{
        console.log("Data Array Not Found");
    }

    table.DataTable({
        lengthMenu: [15,30,50,100],
        order: [[0,"asc"]]
    });

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
            let res = await axios.get("/dashboard/ward-delete", {
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

