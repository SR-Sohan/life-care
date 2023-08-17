  {{-- content list start  --}}
  @include('admin.components.loading')
  <div class="content_list mt-5">
        
  
    <table  id="table_content"  class="table table-primary table-striped">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Image</th>
                <th>Address</th>
                <th>Phone</th>
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

        let res = await axios.get("/dashboard/branches");     
        hideLoading(); 

        if (Array.isArray(res.data.data)) {
            tableBody.empty(); 

            res.data.data.forEach(function(item, index) {
               
                let newRow = `<tr>
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td>${item.user.name}</td>
                    <td class="table_img"><img src="{{asset("storage")}}/${item.image}" alt=""></td>
                    <td>${item.address}</td>
                    <td>${item.phone}</td>
                    <td>
                        <i data-bs-toggle="modal" data-bs-target="#branchUpdateModal" onclick="updateBranch(${item.id})" id="editBtn" class="fa-solid fa-pen-to-square"></i>
                        <i onclick="deleteBranch(${item.id})"  id="deleteBtn" class="fa-solid fa-trash"></i>
                    </td>
                    <!-- Add more columns as needed -->
                </tr>`;

                tableBody.append(newRow); // Append the new row to the table body
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



// Delete Branch
async function deleteBranch(id) {
    const confirmed = await Swal.fire({
        title: 'Confirm Deletion',
        text: 'Are you sure you want to delete this branch?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    });

    if (confirmed.isConfirmed) {
        try {
            let res = await axios.get("/dashboard/branch-delete", {
                params: {
                    id: id
                }
            });
            
            console.log(res);
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