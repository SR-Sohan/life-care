@extends('layouts.aLayout')
@section('acontent')
    {{-- page heading start  --}}
    <div class="page_heading mt-3 bg-secondary p-3 d-flex align-items-center justify-content-between">
        <div class="page_search">
            <input class="form-control" type="text" name="" id="" placeholder="Search Branch">
        </div>
        <div class="page_filter">
            <select class="form-select" name="" id="">
                <option value="">Filter Branch</option>
            </select>
        </div>
        <div class="page_add">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
        </div>
    </div>
    {{-- page heading end --}}

    {{-- content list start  --}}
    <div class="content_list mt-5">
        <h2 class="text-center">Our Branches</h2>
        <table  class="table table-primary table-striped">
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

    {{-- form modal  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Branch</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="form">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" >
                </div>
                <div class="mb-3">
                    <input type="file" name="image" id="image" class="form-control" >
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button id="submit_btn" type="button" class="btn btn-primary">Add Branch</button>
            </div>
          </div>
        </div>
      </div>
    {{-- form modal  --}}

    <script>
        $(document).ready(function(){

            // Load Data
            function loadData(page){
                $.ajax({
                    url: '{{url("dashboard/branches")}}',
                    method: 'GET',
                    data: { page: page },
                    dataType: 'json',
                    success: function(response) {
                        if(response.data){

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




        })

    </script>
@endsection