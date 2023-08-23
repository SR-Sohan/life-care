<div class="print_appointment">
    <form class="bg-white p-4 d-flex align-items-center justify-content-between" id="form">
        <div >
            <select class="form-select" name="department" id="department">
                <option value="-1">Select Department</option>
                @forelse ($department as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                    
                @endforelse
            </select>
        </div>
        <div >
            <select class="form-select" name="doctor" id="doctor">
                <option value="-1">Select Doctor</option>
            </select>
        </div>
        <div >
            <input class="form-control" type="date" name="appointment_date" id="appointment_date">
        </div>
        <button type="button" onclick="handleSubmit()" class="btn btn-outline-primary" >Show Appointment</button>
    </form>
</div>

<script>

// Change Department
$("#department").change(function() {
    let id = $(this).val();

    axios.get(`/dashboard/appointment-doctor/${id}`)
        .then(res => {
            if (res.data.error) {
                $("#doctor").html(`<option value="-1">This Department Doctor Not Available</option>`);
            } else {
               
                let doctor = $("#doctor");
                doctor.val("");
                let optionsHtml = `<option value="-1">Select Doctor</option>`;
                
                res.data.doctor.forEach(item => {
                    optionsHtml += `<option value="${item.id}">${item.name}</option>`;
                });

                doctor.html(optionsHtml);
            }
        })
        .catch(error => {
            console.error("Error fetching data:", error);
        });
});

// Search Appointment
async function handleSubmit() {

    let department = $("#department").val();
    let doctor = $("#doctor").val();
    let appointment_date = $("#appointment_date").val();

    if(department == "-1"){
        alert("Please Select Department")
    }else if(doctor == "-1"){
        alert("Please Select Doctor")
    }else if(appointment_date == ""){
        alert("Please Select Date")
    }else{
        var formData = new FormData();
            formData.append('department', department);
            formData.append('doctor', doctor);
            formData.append('appointment_date', appointment_date);

        let res = await axios.post("/dashboard/search-appointments",formData)

        if(res.data.error){
            Swal.fire(
            'Message!',
            res.data.msg,
            res.data.success
            )
        }else{

            if( res.data.appointments.length < 1){
                Swal.fire(
                'Message!',
                "Appointment Not Found",
                "success"
                )
            }else{
                $("#printappointmentModal").modal("show");

                let tableBody = $("#table_body");
                tableBody.empty();
                res.data.appointments.forEach(function(item, index){
                    let newRow = `<tr>
                    <td>${index + 1}</td>
                    <td>${item.user.name}</td>
                    <td>${item.doctor.name}</td>
                    <td>${item.appointment_date}</td>
                    <td>${item.status}</td>
                </tr>`;
            
                tableBody.append(newRow);
                })
            }
        }
    }

}

</script>