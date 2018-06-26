<form method="post" action="{{ route('candidate.update.profile') }}" enctype="multipart/form-data">
	@csrf
		<div class="row">
		<div id="file-upload-form" class="uploader">
			<input id="file-upload" type="file" name="dp" accept="image/*" />

			<label for="file-upload" id="file-drag">
				<img id="file-image" src="{{ asset('storage/uploads/'.(($candidate->dp) ? $candidate->dp : 'default_user.png'))}}" alt="Preview" class="">
				<div id="start">
				<i class="fa fa-download" aria-hidden="true"></i>
				<div>Select a profile image or drag here</div>
				<div id="notimage" class="hidden">Please select an image</div>
				<span id="file-upload-btn" class="btn btn-primary">Select a file</span>
				</div>
				<div id="response" class="hidden">
				<div id="messages"></div>
				</div>
			</label>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Full Name</span>
			<div class="pf-field">
				<input type="text" placeholder="Ali TUFAN" />
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Job Title</span>
			<div class="pf-field">
				<input type="text" placeholder="UX / UI Designer" />
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Allow In Search</span>
			<div class="pf-field">
				<select data-placeholder="Allow In Search" class="chosen">
					<option>Yes</option>
					<option>No</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Minimum Salary</span>
			<div class="pf-field">
				<input type="text" placeholder="$4250" />
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Experience</span>
			<div class="pf-field">
				<select data-placeholder="Allow In Search" class="chosen">
					<option>2-6 Years</option>
					<option>6-12 Years</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Age</span>
			<div class="pf-field">
				<select data-placeholder="Allow In Search" class="chosen">
					<option>22-30 Years</option>
					<option>30-40 Years</option>
					<option>40-50 Years</option>
				</select>
			</div>
		</div>
		<div class="col-lg-3">
			<span class="pf-title">Current Salary($) min</span>
			<div class="pf-field">
				<input type="text" placeholder="20K" />
			</div>
		</div>
		<div class="col-lg-3">
			<span class="pf-title">Max</span>
			<div class="pf-field">
				<input type="text" placeholder="30K" />
			</div>
		</div>
		<div class="col-lg-3">
			<span class="pf-title">Expected Salary($) min</span>
			<div class="pf-field">
				<input type="text" placeholder="30k" />
			</div>
		</div>
		<div class="col-lg-3">
			<span class="pf-title">Max</span>
			<div class="pf-field">
				<input type="text" placeholder="40K" />
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Education Levels</span>
			<div class="pf-field">
				<select data-placeholder="Please Select Specialism" class="chosen">
					<option>Diploma</option>
					<option>Inter</option>
					<option>Bachelor</option>
					<option>Graduate</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6">
			<span class="pf-title">Languages</span>
			<div class="pf-field">
				<div class="pf-field">
					<select data-placeholder="Please Select Specialism" class="chosen">
						<option>English</option>
						<option>German</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<span class="pf-title">Categories</span>
			<div class="pf-field no-margin">
				<ul class="tags">
					<li class="addedTag">Photoshop<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]"
						 value="Photoshop"></li>
					<li class="addedTag">Digital & Creative<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden"
						 name="tags[]" value="Digital"></li>
					<li class="addedTag">Agency<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]"
						 value="Agency"></li>
					<li class="tagAdd taglist">
						<input type="text" id="search-field">
					</li>
				</ul>
			</div>
		</div>
		<div class="col-lg-12">
			<span class="pf-title">Description</span>
			<div class="pf-field">
				<textarea>Spent several years working on sheep on Wall Street. Had moderate success investing in Yugos on Wall Street. Managed a small team buying and selling pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed severalnew methods for working with banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer ollaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present</textarea>
			</div>
		</div>
		<div class="col-lg-12">
			<button type="submit">Update</button>
		</div>
	</div>
</form>