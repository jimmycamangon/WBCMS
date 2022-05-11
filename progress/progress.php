<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<div class="pakainfo container">
  <div class="dsp row">
    <div class="dsp col-md-12">
	    <p> </p>
		<p> </p>
		<button type="button" id="submit_categories"  class="btn btn-success btn-block">Click Here To Live Start Progress Bar</button>
		<p> <p>
		<button type="button" id="submit_products"  class="btn btn-danger btn-block">Click Here To Live Stop Progress Bar</button>
    </div>
    <div class="pakainfo col-md-12">
		<p> </p>
	    <p> </p>
		<div id="live_progress_bar" style="border:1px solid #ccc; border-radius: 5px; "></div>
  
		<!-- PHP Simple Progress preview_details -->
		<br>
		<div id="preview_details" ></div>
	</div>
  </div>
</div>

<iframe id="preview_area" style="display:none;"></iframe><br />
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script >
	$("#submit_categories").click(function(){
		document.getElementById('preview_area').src = 'live_progress_bar.php';
	});
	$("#submit_products").click(function(){
		document.getElementById('preview_area').src = '';
	});
</script>