<div class="row">
	<form class="form-horizontal" role="form">
	  <div class="form-group">
	  <label for="unit_ID" class="col-sm-2 control-label">Select Unit to Edit</label>
		<div class="col-sm-2">
			<select class="form-control">
				<option>Infantry</option>
				<option>Trucks</option>
				<option>Planes</option>
				<option>Option Placeholder 4</option>
				<option>Option Placeholder 5</option>
				<option>Option Placeholder 6</option>
				<option>Option Placeholder 7</option>
				<option>Option Placeholder 8</option>
			</select>
		</div>
	  </div>
	  <div class="form-group">
		<label for="Health" class="col-sm-2 control-label">Unit Description</label>
		<div class="col-sm-5">
			<textarea class="form-control" rows="3" id="UnitDescription" placeholder="Type a description of the unit here"></textarea>
		</div>
	  </div>
	  <div class="form-group">
		<label for="Health" class="col-sm-2 control-label">Unit Health</label>
		<div class="col-sm-1">
			<input type="number" class="form-control" id="UnitHealth" placeholder="0">
		</div>
	  </div>
	  <div class="form-group">
		<label for="Weak_Curse_Mod" class="col-sm-2 control-label">Weak Curse Mod</label>
		<div class="col-sm-1">
			<input type="number" class="form-control" id="WeakCurseMod" placeholder="0">
		</div>
	  </div>
	  <div class="form-group">
		<label for="Strong_Curse_Mod" class="col-sm-2 control-label">Strong Curse Mod</label>
		<div class="col-sm-1">
			<input type="number" class="form-control" id="StrongCurseMod" placeholder="0">
		</div>
	  </div>
	  <div class="form-group">
		<label for="Weak_Buff_Mod" class="col-sm-2 control-label">Weak Buff Mod</label>
		<div class="col-sm-1">
			<input type="number" class="form-control" id="WeakBuffMod" placeholder="0">
		</div>
	  </div>
	  <div class="form-group">
		<label for="Strong_Buff_Mod" class="col-sm-2 control-label">Strong Buff Mod</label>
		<div class="col-sm-1">
			<input type="number" class="form-control" id="StrongBuffMod" placeholder="0">
		</div>
	  </div>
	  <div class="form-group">
		<label for="Parent_Structure" class="col-sm-2 control-label">Parent Structure</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="UnitDescription" placeholder="Enter the name of the Parent Structure">
		</div>
	  </div>
	  <div class="form-group">
		<label for="Can_Fly" class="col-sm-2 control-label">Can Fly</label>
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
		<label for="Can_Drive" class="col-sm-2 control-label">Can Drive</label>
			<div class="radio">
				<div class="col-sm-1">
					<label>
					<input type="radio" name="optionsRadios1" id="optionsRadios1" value="option1" checked>
					Yes
					</label>
				</div>
				<div class="col-sm-1">
					<label>
					<input type="radio" name="optionsRadios1" id="optionsRadios2" value="option2">
					No
					</label>
				</div>
			</div>
	  </div>
	  <div class="form-group">
		<label for="Has_Superpower" class="col-sm-2 control-label">Has Super Power</label>
			<div class="radio">
				<div class="col-sm-1">
					<label>
					<input type="radio" name="optionsRadios2" id="optionsRadios1" value="option1" checked>
					Yes
					</label>
				</div>
				<div class="col-sm-1">
					<label>
					<input type="radio" name="optionsRadios2" id="optionsRadios2" value="option2">
					No
					</label>
				</div>
			</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-1">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	  </div>
	</form>
</div>  	