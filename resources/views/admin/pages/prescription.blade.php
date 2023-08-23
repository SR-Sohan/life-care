@extends('layouts.aLayout')
@section('acontent')
    {{-- page heading start  --}}
    <div class="page_heading mt-3 bg-secondary p-3 d-flex align-items-center justify-content-between">
       <h2 class="text-white">Prescription</h2>
    </div>
    {{-- page heading end --}}

    <div class="prescription_wrap mt-3">
        <form  id="form">
            <div class="form_wrap border w-100 d-flex">
                <div class="test_wrap w-50 pe-3 ps-2 py-3">
                    <div class="form_heading d-flex align-items-center justify-content-between">
                        <h4>Add Test</h4>
                        <div class="page_add">
                            <button data-bs-toggle="modal" data-bs-target="#testAddModal" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
    
                    <div id="test_content" class="mt-3">
                        <ol>
                            <li class="d-flex align-items-center justify-content-between mb-2">
                                <h6>Xray-Chest</h6>
                                <button class="btn btn-danger">Remove</button>
                            </li>
                            <li class="d-flex align-items-center justify-content-between mb-2">
                                <h6>Xray-Chest</h6>
                                <button class="btn btn-danger">Remove</button>
                            </li>
                            <li class="d-flex align-items-center justify-content-between mb-2">
                                <h6>Xray-Chest</h6>
                                <button class="btn btn-danger">Remove</button>
                            </li>
                            <li class="d-flex align-items-center justify-content-between mb-2">
                                <h6>Xray-Chest</h6>
                                <button class="btn btn-danger">Remove</button>
                            </li>
                           
                        </ol>
                    </div>
               </div>
               <div style="border-left: 2px solid #000" class="medicine_wrap w-50 ps-3 pe-2 py-3">
                <div class="form_heading d-flex align-items-center justify-content-between">
                    <h4>Add Medicine</h4>
                    <div class="page_add">
                        <button data-bs-toggle="modal" data-bs-target="#testAddModal" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                <div id="medications-container" class="mt-3">
                    <div class="medication-item d-flex align-items-center justify-content-between mb-2">
                        <div>
                           <div class="d-flex align-items-center">
                            <h6>Tablet. Napa ( 500mg )</h6>
                            <p class="ms-4">7 Day</p>
                           </div>
                            <p> 1 + 0 + 1 ( After Meal )</p>
                        </div>
                        <div>
                            <button class="btn btn-danger">Remove</button>
                        </div>
                    </div>
                    <div class="medication-item d-flex align-items-center justify-content-between mb-2">
                        <div>
                           <div class="d-flex align-items-center">
                            <h6>Tablet. Napa ( 500mg )</h6>
                            <p class="ms-4">7 Day</p>
                           </div>
                            <p> 1 + 0 + 1 ( After Meal )</p>
                        </div>
                        <div>
                            <button class="btn btn-danger">Remove</button>
                        </div>
                    </div>
                    <div class="medication-item d-flex align-items-center justify-content-between mb-2">
                        <div>
                           <div class="d-flex align-items-center">
                            <h6>Tablet. Napa ( 500mg )</h6>
                            <p class="ms-4">7 Day</p>
                           </div>
                            <p> 1 + 0 + 1 ( After Meal )</p>
                        </div>
                        <div>
                            <button class="btn btn-danger">Remove</button>
                        </div>
                    </div>
                </div>
               </div>
            </div>
            <div class="w-100  d-flex justify-content-end mt-3">
                <button class="btn btn-outline-primary ">Print & Save</button>
            </div>
        </form>
    </div>
    
    
@endsection