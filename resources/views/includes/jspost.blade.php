<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHxRb6dudEmAaydcc8FS54Lw-KVGiAGdE&libraries=places"></script>
<script src="{{asset('libsfront/jquery.geocomplete.min.js')}}"></script>
<script src="{{asset('libsfront/transition.js')}}"></script>
<script src="{{asset('libsfront/collapse.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script>
	$(function(){
	$("#geocomplete").geocomplete({
		map: ".map_canvas",
		details: "form ",
		markerOptions: {
		draggable: true
		}
	});
	
	$("#geocomplete").bind("geocode:dragged", function(event, latLng){
		$("input[name=lat]").val(latLng.lat());
		$("input[name=lng]").val(latLng.lng());
		$("#reset").show();
	});	
	
	$("#reset").click(function(){
		$("#geocomplete").geocomplete("resetMarker");
		$("#reset").hide();
		return false;
	});
	
	$("#find").click(function(){
		$("#geocomplete").trigger("geocode");
	}).click();
	});
</script>

<script type="text/javascript">
	$(function(){
		$('*[name=time]').appendDtpicker();
	});
</script>

<script>
		$(".delete_link").click(function(){
			return confirm("Are you sure you want to Delete?");
	});
</script>

<script type="text/javascript">
	$(function () {
		$('#datetimepicker1').datetimepicker({
			format:'YYYY-MM-DD HH:mm:00'
		});
	});
</script>
