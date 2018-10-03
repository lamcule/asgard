<div class="box-body">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
  </div>
  <div class="form-group">
    <label for="parent_id">Parent_id</label>
    <input type="number" class="form-control" id="parent_id" name="parent_id" value="{{ $category->parent_id }}">
  </div>
  <div class="form-group">
	<label class="input-group-text" for="inputGroupSelect02">Options</label>
    <div class="input-group mb-3">   	
	    <select class="custom-select" id="type" name="type">
		    <option value="industry" selected>Industry</option>
		    <option value="interest">Interest</option>
		</select>
    </div>
   </div>
</div>
