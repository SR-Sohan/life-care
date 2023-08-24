  {{-- form modal  --}}
  <div class="modal fade" id="admitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 id="pageTitle" class="modal-title fs-5" id="exampleModalLabel">Admit</h1>
          <button onclick="resetForm()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createForm">
            <input type="hidden" name="id" id="department_id">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" >
            </div>
            <div class="mb-3">
                <img id="preview" class="w-25" src="{{asset("assets/admin/img/default.jpg")}}" alt="">
            </div>
            <div class="mb-3">
                <input oninput="preview.src = window.URL.createObjectURL(this.files[0])" type="file" name="image" id="image" class="form-control" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button onclick="resetForm()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="handleSubmit()" id="submit_btn" type="button" class="btn btn-primary">Add Department</button>
        </div>
      </div>
    </div>
  </div>
{{-- form modal  --}}