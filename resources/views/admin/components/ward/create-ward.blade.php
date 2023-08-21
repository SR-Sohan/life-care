 {{-- form modal  --}}
 <div class="modal fade" id="wardModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ward</h1>
          <button onclick="formClose()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm">
           <div id="userForm" class="mb-3">
              <div class="mb-3 d-flex align-items-center justify-content-between">
                  <div>
                      <label for="username">User Name</label>
                      <input type="text" name="name" id="username" class="form-control" required >
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

            <div class="mb-3">
                <label for="ward-no">Ward Number</label>
                <input type="text" name="ward-no" id="ward-no" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="patient">Patient Name</label>
                <input type="text" name="patient" id="patient" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control" >
            </div>
            
          </form>
        </div>
        <div class="modal-footer">
          <button onclick="formClose()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="submit_btn" type="button" class="btn btn-primary">Add Ward</button>
        </div>
      </div>
    </div>
  </div>
{{-- form modal  --}}