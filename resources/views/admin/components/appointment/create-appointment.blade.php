 {{-- form modal  --}}
 <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Appointment</h1>
          <button onclick="formClose()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form">
            <input type="radio" id="newPatient" name="patientType" value="new" checked>
            <label for="newPatient">New Patient</label>

            <input type="radio" id="oldPatient" name="patientType" value="old">
            <label for="oldPatient">Old Patient</label>
            <div id="userForm" class="mb-3">
              <div class="mb-3 d-flex align-items-center justify-content-between">
                  <div>
                      <label for="name"> Name</label>
                      <input type="text" name="name" id="name" class="form-control" required >
                  </div>
                  <div>
                      <label for="useremail">User Email</label>
                      <input type="email" name="useremail" id="useremail" class="form-control" required >
                  </div>
              </div>
              <div class="mb-3 d-flex align-items-center justify-content-between">
                  <div>
                      <label for="password">User Password</label>
                      <input type="password" name="password" id="password" class="form-control" required >
                  </div>
                  
              </div>

            </div>

            <div id="oldPatientForm" >
              <div class="mb-3">
                <label for="p_id">Patient Id</label>
                <input class="form-control" type="text" name="p_id" id="p_id">
              </div>
            </div>
            <div>
              <label for="phone">Phone</label>
              <input class="form-control" type="number" name="phone" id="phone">
            </div>
            
            <div class="mb-3">
                <label for="department">Department</label>
                <select class="form-select" name="department" id="department">
                    <option value="-1">Select Department</option>
                    @forelse ($department as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @empty
                        
                    @endforelse
                </select>
            </div>
            <div id="doctorForm" class="mb-3 d-none">
                <label for="doctor">Doctor</label>
                <select class="form-select" name="doctor" id="doctor">
                    <option value="-1">Select Doctor</option>
                </select>
            </div>
           
          <div class="mb-3">
            <label for="appointmentDate">Select Appointment Date:</label>
            <input class="form-control" type="date" id="appointment_date" name="appointment_date">
          </div>
          </form>
        </div>
        <div class="modal-footer">
          <button onclick="formClose()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="handleSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Appointment</button>
        </div>
      </div>
    </div>
  </div>
{{-- form modal  --}}
<script>

  // New Old Patient
  $('#oldPatientForm').hide();
  $('input[name="patientType"]').change(function() {
        if ($(this).val() === 'new') {
            $('#userForm').show();
            $('#oldPatientForm').hide();
        } else {
            $('#userForm').hide();
            $('#oldPatientForm').show();
        }
    });

  // Date
    const currentDate = new Date();
    const maxDate = new Date(currentDate);
    maxDate.setDate(currentDate.getDate() + 6);

    const currentYear = currentDate.getFullYear();
    const currentMonth = String(currentDate.getMonth() + 1).padStart(2, '0');
    const currentDay = String(currentDate.getDate()).padStart(2, '0');
    const formattedCurrentDate = `${currentYear}-${currentMonth}-${currentDay}`;

    const maxYear = maxDate.getFullYear();
    const maxMonth = String(maxDate.getMonth() + 1).padStart(2, '0');
    const maxDay = String(maxDate.getDate()).padStart(2, '0');
    const formattedMaxDate = `${maxYear}-${maxMonth}-${maxDay}`;

    document.getElementById("appointment_date").min = formattedCurrentDate;
    document.getElementById("appointment_date").max = formattedMaxDate;
  
  
    //change Department
$("#department").change(function() {
    let id = $(this).val();

    axios.get(`/dashboard/appointment-doctor/${id}`)
        .then(res => {
            if (res.data.error) {
                $("#doctor").html(`<option value="-1">This Department Doctor Not Available</option>`);
            } else {
                $("#doctorForm").removeClass("d-none");
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


  //  Form close
  function formClose(){
      $("#imgPreview").attr("src","{{asset("assets/admin/img/default.jpg")}}")
      $("#form")[0].reset();
      $('#userForm').show();
      $('#oldPatientForm').hide();

  }
 
    async function handleSubmit(){
          let p_id = $("#p_id").val();
          let username = $("#name").val();
          let useremail = $("#useremail").val();
          let password = $("#password").val();
          let department_id = $("#department").val();
          let phone = $("#phone").val();
          let doctor_id = $("#doctor").val();
          let appointment_date = $("#appointment_date").val();

          if($('input[name="patientType"]').val() === "new" && p_id == ""){
            if(username == ""){
            alert("Please enter user name")
            }else if(useremail == ""){
              alert("Please enter user email")
            }else if(password.length <= 7){
              alert("Please enter password at least 8 charcter")
            }else if(phone == ""){
                alert("Patient Phone Number")
            }
          }else{
            if(p_id == ""){
              alert("Please enter User Password")
            }
          }


          if(department_id == ""){
            alert("Please Select Department")
          }else if(doctor_id == ""){
            alert("Please select Doctor")
          }else if(appointment_date == ""){
            alert("Please Select appointment Date")
          }else{


              try {
                  var formData = new FormData();
                  formData.append('p_id', p_id);
                  formData.append('name', username);
                  formData.append('email', useremail);
                  formData.append('password', password);
                  formData.append('department_id', department_id);
                  formData.append('doctor_id', doctor_id);
                  formData.append('phone', phone);
                  formData.append('appointment_date', appointment_date);
                  let res = await axios.post("/dashboard/upload-appointment",formData);
                  
                  if(res.data.error){
                      Swal.fire(
                            'Message!',
                            res.data.msg,
                            res.data.success
                      )
                    }else{
                      $('#appointmentModal').modal('hide');
                      formClose()
                      loadData()
                      Swal.fire(
                            'Message!',
                            res.data.msg,
                            res.data.success
                      )
                    }

                
              } catch (error) {
                
              }

          }
      }
  

    
</script>