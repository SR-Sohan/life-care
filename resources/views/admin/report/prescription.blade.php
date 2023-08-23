<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{margin: 0; padding: 0}
        #body{
            padding: 15px;
        }
        #prescription_heading{
            border-bottom: 3px solid #000
        }
        .top_heading , .bottom_heading{
            display: flex;
            align-items: center;
            justify-content: space-between
        }
        #prescription_body{
            display: flex;
            align-items: center;
            justify-content: space-between;
        
        }
        .left_body{
            width: 40%;
            border-right: 1px solid #000;
            height: 800px;
            padding-left: 25px;
            padding-top: 30px;
        }
        .right_body{
            width: 60%;
            height: 800px;
            padding: 0px 20px;
            
            
        }
        .advice{
            padding-top: 30px;
        }
        .single_test , .single_advice{
            margin-left: 30px;
            padding-top: 15px;
        }
        .single_medicine{
            margin-top: 25px;
            margin-left: 35px;
        }
    </style>
</head>
<body id="body">
    <div id="prescription_heading">
        <div class="top_heading">
            <div class="logo">
                <img src="{{asset("assets/client/img/aa.png")}}" alt="">
            </div>
            <div class="doctor_info">
                <h3>{{$doctor->name}}</h3>
                <p>({{$doctor->department->name}})</p>
                <p>{{$doctor->position}}</p>
            </div>
            <div class="hospital_info">
                <h2>Life Care, {{$branch->name}}</h2>
                <p>{{$branch->address}}</p>
                <p>Date & time: {{$prescription["created_at"]->format('d-m-Y -- H:i:s a')}}</p>
            </div>
        </div>
       
        <div class="bottom_heading">
            <h3>Name: {{$user->name}}</h3>
            <h3>UHID: #{{$user->id}}</h3>
            <h3>APID: #{{$appointment->id}}</h3>
            <h3>Age: {{$appointment->age}}</h3>
            <h3>Gender: {{$appointment->gender}}</h3>
        </div>
    </div>

    <div id="prescription_body">
        <div class="left_body">           
            <div class="test">
                <h2>Tests</h2>
                <hr>
                <ol class="single_test">
                 
                   @forelse ($test as $item)
                       <li>{{$item['name']}}</li>
                   @empty
                       
                   @endforelse
                </ol>
            </div>
            <div class="advice">
                <h2>Advice</h2>
                <hr>
                <ul class="single_advice">
                    
                </ul>
            </div>
        </div>
        <div class="right_body">
            <div class="medicine_wrap">

                @forelse ($medicine as $item)
                    <div class="single_medicine">
                        <div style="display: flex; align-items:center"> 
                            <h3>{{$item['name']}}</h3>
                            <p style="margin-left: 20px">{{$item['day']}}</p>
                        </div>
                        <p>{{$item['time_meal']}}</p>
                    </div>
                @empty
                    
                @endforelse
                
                
              
            </div>
        </div>
    </div>
</body>
</html>