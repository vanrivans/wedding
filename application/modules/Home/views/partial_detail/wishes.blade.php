	
	<div class="row wishes__row">
		<div class="col wishes__col">
            <img src="{{ $templatePath . 'mark-l.png' }}" class="wishes__mark mark-l">
			<div class="wishes__title">
				Ucapan & Doa
			</div>
            <img src="{{ $templatePath . 'mark-r.png' }}" class="wishes__mark mark-r">
		</div>
	</div>

	<div class="row wishes__row2">
		<div class="col-12">
			<form id="form-wishes">
				<div class="mb-2">
					<textarea id="wishes-text" class="form-control wishes__text" rows="3" placeholder="Write something..." required></textarea>
				</div>
				<div class="mb-2">
					<button type="submit" class="btn wishes__btn">
						<span class="btn__inner">Kirim</span>
					</button>
				</div>
			</form>
		</div>
		<div class="col-12" id="comment-list">
		</div>
	</div>

