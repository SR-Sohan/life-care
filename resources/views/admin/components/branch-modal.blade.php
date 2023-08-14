   {{-- form modal  --}}
   <div class="modal fade" id="branchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Branch</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form">
            <div class="mb-3">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <div>
                        <label for="username">User Name</label>
                        <input type="text" name="username" id="username" class="form-control" required >
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
                    <div>
                        <label for="role">User Role</label>
                       <select name="role" id="role" class="form-select">
                        <option value="-1">Select Role</option>
                       </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" >
            </div>
            <div class="mb-3">
                <input type="file" name="image" id="image" class="form-control" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="submit_btn" type="button" class="btn btn-primary">Add Branch</button>
        </div>
      </div>
    </div>
  </div>
{{-- form modal  --}}