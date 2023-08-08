@extends('layouts.aLayout')
@section('acontent')
    {{-- page heading start  --}}
    <div class="page_heading mt-3 bg-secondary p-3 d-flex align-items-center justify-content-between">
        <div class="page_search">
            <input class="form-control" type="text" name="" id="" placeholder="Search Test">
        </div>
        <div class="page_filter">
            <select class="form-select" name="" id="">
                <option value="">Filter Test</option>
            </select>
        </div>
        <div class="page_add">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
        </div>
    </div>
    {{-- page heading end --}}

    {{-- content list start  --}}
    <div class="content_list mt-5">
        <h2 class="text-center">Our Tests</h2>
        <table  class="table table-primary table-striped">
            <thead>
                <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="content_body">
                <tr>
                    <td>1</td>
                    <td>Xray</td>
                    <td class="table_img">500</td>
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
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Test</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" >
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Add Test</button>
            </div>
          </div>
        </div>
      </div>
    {{-- form modal  --}}

    <script>
        

    </script>
@endsection