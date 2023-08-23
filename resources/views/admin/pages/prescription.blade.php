@extends('layouts.aLayout')
@section('acontent')
    {{-- page heading start  --}}
    <div class="page_heading mt-3 bg-secondary p-3 d-flex align-items-center justify-content-between">
       <h2 class="text-white">Prescription</h2>
    </div>
    {{-- page heading end --}}

    @include('admin.components.prescription.prescription-create')
    
    
@endsection