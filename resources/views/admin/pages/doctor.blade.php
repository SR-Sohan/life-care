@extends('layouts.aLayout')
@section('acontent')
    {{-- page heading start  --}}
    <div class="page_heading mt-3 bg-secondary p-3 d-flex align-items-center justify-content-between">
        <div class="page_search">
            <input class="form-control" type="text" name="" id="" placeholder="Search Doctor">
        </div>
        <div class="page_filter">
            <select class="form-select" name="" id="">
                <option value="">Filter Doctor</option>
            </select>
        </div>
        <div class="page_add">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
        </div>
    </div>
    {{-- page heading end --}}

    {{-- content list start  --}}
    <div class="content_list mt-5">
        <h2 class="text-center">Our Doctors</h2>
        <table  class="table table-primary table-striped">
            <thead>
                <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Branch</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="content_body">
                <tr>
                    <td>1</td>
                    <td>Dr. Kamal</td>
                    <td class="table_img"><img src="" alt=""></td>
                    <td>Mirpur</td>
                    <td>+8801700000000</td>
                    <td>chest</td>
                    <td class="d-flex table_icon">
                        <p><i class="fa-solid fa-eye"></i></p>
                        <p><i class="fa-solid fa-pen-to-square"></i></p>
                        <p><i class="fa-solid fa-trash"></i></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- content list end --}}

    {{-- form modal  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Doctor</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="">
                <div class="mb-3">
                    <label for="branch">Branch Name</label>
                  <select name="branch_id" id="branch" class="form-select">
                    <option value="-1">Select Branch</option>
                  </select>
                </div>
                <div class="mb-3">
                    <label for="department">Department Name</label>
                  <select name="department_id" id="department" class="form-select">
                    <option value="-1">Select Department</option>
                  </select>
                </div>
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="position">Position</label>
                    <input type="text" name="position" id="position" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" >
                </div>
                <div class="mb-3">
                    <input type="file" name="image" id="image" class="form-control" >
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Add Doctor</button>
            </div>
          </div>
        </div>
      </div>
    {{-- form modal  --}}
@endsection