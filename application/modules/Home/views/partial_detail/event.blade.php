
	<div class="row">

		<div class="col-xs-12">
			
			<div class="event__prolog" id="sec-event-prolog">
				
				<div class="event__prolog__title title_style">
					<span>Acara Pernikahan</span>
				</div>
				<p class="event__prolog__content">
					Untuk melaksanakan syariat agama-Mu, mengikuti sunnah rasul-Mu dalam membentuk keluarga yang Sakinah, Mawaddah, Warahmah yang Insya Allah akan diselenggarakan pada hari:
				</p>
			</div>
		</div>

		<div class="col-xs-12">
			<div class="event__date title_style" id="sec-event-date">
				<span>{{ $resepsiDay }}</span><br>
				<span>{{ $resepsiDate }}</span>
			</div>
		</div>

		<div class="col-xs-12">

			<div class="event__akad" id="sec-event-akad">

				<div class="event__akad__title title_style">
					Akad Keluarga
				</div>
				<div class="event__akad__time">
					{{ $akadTime }}
				</div>
				<div class="event__akad__place mb-2">
					{{ $akadPlace }}
				</div>
				<p class="event__akad__address">
					{{ $akadAddress }}
				</p>
				<a href="{{ $akadLoc }}" target="_blank">
					<button class="btn"><span class="btn__inner btn_maps">Lihat Maps</span>
					</button>
				</a>

			</div>

		</div>

		<div class="col-xs-12">

			<div class="event__resepsi" id="sec-event-resepsi">

				<div class="event__resepsi__title title_style">
					Resepsi
				</div>
				<div class="event__resepsi__time">
					{{ $resepsiTime }}
				</div>
				<div class="event__resepsi__place mb-2">
					{{ $resepsiPlace }}
				</div>
				<p class="event__resepsi__address">
					{{ $resepsiAddress }}
				</p>
				<a href="{{ $resepsiLoc }}" target="_blank">
					<button class="btn">
						<span class="btn__inner btn_maps">Lihat Maps</span>
					</button>
				</a>

			</div>

		</div>

	</div>
