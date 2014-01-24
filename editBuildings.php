<div class="row">
	<form class="form-horizontal" role="form">
	  <div class="form-group">
	  <label for="unit_ID" class="col-sm-2 control-label">Select Building to Edit</label>
		<div class="col-sm-2">
			<select class="form-control">
				<option>Barracks</option>
				<option>Factory</option>
				<option>Airport</option>
				<option>Seaport</option>
				<option>Option Placeholder 5</option>
				<option>Option Placeholder 6</option>
				<option>Option Placeholder 7</option>
				<option>Option Placeholder 8</option>
			</select>
		</div>
	  </div>
	  <div class="form-group">
		<label for="Health" class="col-sm-2 control-label">Building Health</label>
		<div class="col-sm-1">
			<input type="number" class="form-control" id="UnitHealth" placeholder="0">
		</div>
	  </div>
	  <div class="form-group">
		<label for="Can_Parent" class="col-sm-2 control-label">Can Parent</label>
			<div class="radio">
				<div class="col-sm-1">
					<label>
					<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
					Yes
					</label>
				</div>
				<div class="col-sm-1">
					<label>
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
					No
					</label>
				</div>
			</div>
	  </div>
	  <div class="form-group">
		<label for="Pop_Provided" class="col-sm-2 control-label">Pop Provided</label>
		<div class="col-sm-1">
			<input type="number" class="form-control" id="StrongCurseMod" placeholder="0">
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-1">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	  </div>
	</form>
</div>  <!-- end of row -->