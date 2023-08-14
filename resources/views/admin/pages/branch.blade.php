@extends('layouts.aLayout')
@section('acontent')
    {{-- page heading start  --}}
    <div class="page_heading mt-3 bg-secondary p-3 d-flex align-items-center justify-content-between">
        <h2 class="text-white">Branches</h2>
        <div class="page_add">
            <button data-bs-toggle="modal" data-bs-target="#branchModal" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
        </div>
    </div>
    {{-- page heading end --}}

    {{-- loading  --}}
   
    {{-- loading  --}}

    {{-- content list start  --}}
    <div class="content_list mt-5">
        
        @include('admin.components.loading')
        <table  id="content_table"  class="table table-primary table-striped">
            <thead>
                <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="content_body">
            </tbody>
        </table>
    </div>
    {{-- content list end --}}

    <div id="pagination-links"></div>

    @include('admin.components.branch-modal')

    <script>
        $(document).ready(function(){

            // Load Data
            function loadData(page){

                tableLoading()

                $.ajax({
                    url: '{{url("dashboard/branches")}}',
                    method: 'GET',
                    data: { page: page },
                    dataType: 'json',
                    success: function(response) {
                        if(response.data){
                            console.log(response);
                            let html;
                            response.data.forEach((item,index) => {
                                html    += `<tr>
                                    <td>${index+1}</td>
                                    <td>${item.name}</td>
                                    <td class="table_img"><img src="{{asset("storage")}}/${item.image}" alt=""></td>
                                    <td>${item.address}</td>
                                    <td>${item.phone}</td>
                                    <td class="d-flex table_icon">
                                        <p><i class="fa-solid fa-eye"></i></p>
                                        <p><i class="fa-solid fa-pen-to-square"></i></p>
                                        <p><i class="fa-solid fa-trash"></i></p>
                                    </td>
                                    </tr>`
                           });

                           $("#content_body").html(html)
                           tableLoadOut();
                      
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
            loadData(1);

            //Add Function 
            $("#submit_btn").click(function(){
                let name = $("#name").val();
                let address = $("#address").val();
                let phone = $("#phone").val();
                let image = $('#image')[0].files[0];

                if (name && address && phone && image) {
                    var formData = new FormData();
                    formData.append('name', name);
                    formData.append('address', address);
                    formData.append('phone', phone);
                    formData.append('image', image);

                    $.ajax({
                        url: '{{url('dashboard/upload-branch')}}', 
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                        if(!response.error){
                            $('#exampleModal').modal('hide');
                            $("#form")[0].reset();
                            loadData(1);
                            Swal.fire(
                            'Message!',
                            response.msg,
                            response.success
                            )
                        }
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    })
                }else{
                    alert("Please Fill Up All Field")
                }
            })




        });

    </script>
@endsection