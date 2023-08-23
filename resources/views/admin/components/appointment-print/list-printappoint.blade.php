 {{-- form modal  --}}
 <div class="modal fade" id="printappointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div style="max-width: 100%; width: 100%" class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Appointment List</h1>
          <button onclick="formClose()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="appointment_print" class="modal-body">
          <table class="table">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Doctor</th>
                    <th>Branch</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="table_body">

            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="printAppointment()" id="submit_btn" type="button" class="btn btn-primary">Print</button>
        </div>
      </div>
    </div>
  </div>
{{-- form modal  --}}

<script>
    function printAppointment(){
        let printContents = document.getElementById("appointment_print").innerHTML;
        let originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

        setTimeout(() => {
            location.reload()
        }, 1000);
    }
</script>