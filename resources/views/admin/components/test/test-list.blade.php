 {{-- content list start  --}}
 @include('admin.components.loading')
 <div class="content_list mt-5">
    <table id="table_content" class="table table-primary table-striped">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table_body"></tbody>
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

        let res = await axios.get("/dashboard/tests");     
        hideLoading(); 

        if (Array.isArray(res.data.data)) {
            tableBody.empty(); 

            res.data.data.forEach(function(item, index) {
               
                let newRow = `<tr>
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td>${item.price}</td>
                    <td>
                        <i data-bs-toggle="modal" data-bs-target="#test" onclick="updateItem(${item.id})" id="editBtn" class="fa-solid fa-pen-to-square"></i>
                        <i onclick="deleteItem(${item.id})"  id="deleteBtn" class="fa-solid fa-trash"></i>
                    </td>
                    
                </tr>`;

                tableBody.append(newRow); 
            });
        } else {
            alert("Response data is not an array.");
        }
    } catch (error) {
        console.error(error);
    }

    table.DataTable({
        lengthMenu: [15,30,50,100],
        order: [[0,"asc"]]
    });
}

async function deleteItem(id){
    const confirmed = await Swal.fire({
        title: 'Confirm Deletion',
        text: 'Are you sure you want to delete this Test?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    });

    if (confirmed.isConfirmed) {
        try {
            let res = await axios.get("/dashboard/test-delete", {
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