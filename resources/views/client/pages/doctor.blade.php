@extends('layouts.cLayout')

@section('content')

<div class="find_doctor my-5">
<div class="container">
 <form action="" method="post" class="form-control">
    <div class="row">
        <div class="col-md-4 offset-md-1">
            <div class="">

                <label for="selectOption">Select Branch:</label>
              <select id="selectOption" name="selectOption" class="form-select">
            <option value="option1">Mirpur</option>
            <option value="option2">Dhanmondi</option>
            <option value="option3">Banani</option>
            
          </select>
            </div> 
        </div>
        
        <div class="col-md-4">
            <div class="">
                <label for="selectOption">Select Department:</label>
                <select id="selectOption" name="selectOption" class="form-select">
              <option value="option1">Mirpur</option>
              <option value="option2">Dhanmondi</option>
              <option value="option3">Banani</option>
              
            </select>
            </div>
        </div>
         <div class="col-md-2">
            <div class="">
                <br> 
                <button class="btn btn-primary">Find Doctor</button>
            </div>
         </div>
    </div>
  </form>
  </div>
</div> 
@endsection