@extends('layouts.cLayout')

@section('content')

<div class="container">

 <form action="" method="post" class="form-control">
    <div class="row">
        <div class="col-md-4">
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

        
         <div class="col-md-4">
            <div class="">
                <br>
                <button class="form-control">Find Doctor</button>
            </div>
         </div>
       
    
        
    </div>
    
    

 </form>

</div>
    
@endsection