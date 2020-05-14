@extends('layouts.app')

@section('content')
<section class="section-content padding-y">

	<div class="container">



		<div class="row">
			<div class="col-sm">
				    <!-- TODO: PAGE CONTENT HERE -->
				<h1>Our shop in Eger</h1> <!--Store name -->
				<!--Store address -->
				<div class="store_address">3300 Eger Eszterházy tér 1
				</div>
				<!-- Store info-->
				<div class="store_info">
					<b>Phone Number: (+36) 36 234 5678</b>
					<p>Open Hours</p>
					<p>Monday-Saturday: 09:00-18:00<pb>
					<p>Sunday: 10:00-15:00</p>
				</div>

			</div>
			<div class="col-sm">
				<!--Google Map -->
				<div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px width: 200px">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2674.864370107147!2d20.373416915640757!3d47.90031037920522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47408d9db477d087%3A0xf761572020b28f3b!2zRWdlciwgTMOtY2V1bSwgMzMwMA!5e0!3m2!1shu!2shu!4v1585229240146!5m2!1shu!2shu" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>




		</div>


		<div class="row">
			<div class="col-sm">
				    <!-- TODO: PAGE CONTENT HERE -->
				<h1>Our shop in Budapest</h1> <!--Store name -->
				<!--Store address -->
				<div class="store_address">1146 Budapest Állatkerti körút 12a
				</div>
				<!-- Store info-->
				<div class="store_info">
					<b>Phone Number: (+36) 01 234 5678</b>
					<p>Open Hours</p>
					<p>Monday-Saturday: 10:00-18:00<pb>
					<p>Sunday: 10:00-15:00</p>
				</div>

			</div>
			<div class="col-sm">
				<!--Google Map -->
				<div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px width: 200px">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4531.600865176503!2d19.076427895103908!3d47.519011122681555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741db85fdc5e7e9%3A0x7308379b71e27371!2sF%C5%91v%C3%A1rosi%20Nagycirkusz!5e0!3m2!1shu!2shu!4v1589115319572!5m2!1shu!2shu" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>


	</div>



</section>
@endsection
