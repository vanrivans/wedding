

@if ($device === 1)
<img src="{{ $imagesPath . 'cover_mobile.jpg' }}" class="cover__image" alt="" title="">
@else
<img src="{{ $imagesPath . 'cover_desktop.jpg' }}" class="cover__image" alt="" title="">
@endif
<div class="cover__box">
	<img src="{{ base_url('assets/logo/logo.png') }}" width="50" height="50" class="watermark">
	<div class="cover__opening">
		<span>UNDANGAN PERNIKAHAN</span>
	</div>
	<div class="cover__box__name">
		<span class="cover__name__style">{{ $brideFullName1 }}</span><br>
		<span class="cover__name__style">&</span><br>
		<span class="cover__name__style">{{ $brideFullName2 }}</span>
	</div>
	<div class="cover__to">
		<span>Teruntuk,</span><br>
		<span>{{ $recipient }}</span>
	</div>
	<div class="cover__btn">
		<button class="btn" id="btn-cover">
			<span class="btn__inner" style="font-size:18px">Buka Undangan</span>
		</button>
	</div>
</div>
