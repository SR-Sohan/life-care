@extends('layouts.aLayout')
@section('acontent')
    {{-- page heading start  --}}
    <div class="page_heading mt-3 bg-secondary p-3 d-flex align-items-center justify-content-between">
        <h2 class="text-white">Bed</h2>
        <div class="page_add">
            <button data-bs-toggle="modal" data-bs-target="#bedmodal" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
        </div>
    </div>
    {{-- page heading end --}}

    @include('admin.components.bed.create-bed')
    @include('admin.components.bed.list-bed')
   
 
    

@endsection