{{-- content list start  --}}
@include('admin.components.loading')
<div class="content_list mt-5">
    <table id="table_content"  class="table table-primary table-striped">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th>Image</th>
                <th>Branch</th>
                <th>Department</th>                    
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

//Load Data
loadData()
async function loadData() {
    let table = $("#table_content");
    let tableBody = $("#table_body");

    showLoading();

    try {

        let res = await axios.get("/dashboard/doctors");     
        hideLoading(); 

        if (Array.isArray(res.data)) {
            tableBody.empty(); 

            res.data.forEach(function(item, index) {
               
                let newRow = `<tr>
                    <td>${index+1}</td>
                                    <td>${item.name}</td>
                                    <td class="table_img"><img src="{{asset("storage")}}/${item.images}" alt=""></td>
                                    <td>${item.branch.name}</td>
                                    <td>${item.department.name}</td>
                                    <td>${item.phone}</td>
                                    <td >
                                        <i data-bs-toggle="modal" data-bs-target="#createModal" onclick="updateItem(${item.id})" id="editBtn" class="fa-solid fa-pen-to-square"></i>
                        <i onclick="deleteItem(${item.id})"  id="deleteBtn" class="fa-solid fa-trash"></i>
                                    </td>
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

</script>