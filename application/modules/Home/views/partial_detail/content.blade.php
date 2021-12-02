
	<div class="content__head" id="sec-content-head">
		<div class="row">
			<div class="col-xs-12">
				<div class="content__head__title title_style">Bismillahirrahmanirrahim</div>
				<p class="content__head__body">
					Assalamu'alaikum Warahmatullahi Wabarakaatuh<br>
					Maha Suci Allah yang telah menciptakan makhluk-Nya<br>
					berpasang-pasang<br>
					Ya Allah, perkenankanlah putra-putri kami:
				</p>
			</div>
		</div>
	</div>

	<div class="content__body">

		<div class="row">

			<div class="col-xs-12">
				<div class="content__body__person" id="sec-content-body-p1">
					<center>
					<div class="person">
						<img src="{{ base_url('assets/images/p1.jpg') }}" class="person__image" alt="" title="">
					</div>
					</center>
					<div class="person_name">
						<span class="person_name_style">{{ $brideFullName1 }}</span>
						<div class="person_ig">
							<a href="{{ $ig1 }}" target="_blank"><span><i class="bi bi-instagram"></i> {{ $brideIg1 }}</span></a>
						</div>
					</div>
					<div class="person_parent">
						<span>Putri dari,</span><br>
						<span>{{ $parent1 }}</span>
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="content__body__separator">
					<span class="content__body__separator__style">&</span>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="content__body__person" id="sec-content-body-p2">
					<center>
					<div class="person">
						<img src="{{ base_url('assets/images/p2.jpg') }}" class="person__image">
					</div>
					</center>
					<div class="person_name">
						<span class="person_name_style">{{ $brideFullName2 }}</span>
						<div class="person_ig">
							<a href="{{ $ig2 }}" target="_blank"><span><i class="bi bi-instagram"></i> {{ $brideIg2 }}</span></a>
						</div>
					</div>
					<div class="person_parent">
						<span>Putra dari,</span><br>
						<span>{{ $parent2 }}</span>
					</div>
				</div>
			</div>
			
		</div>

	</div>
