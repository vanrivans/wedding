<?php if($url == 'Journals' || $url == 'Journal'): ?>
<div class="gradient-top"><img src="<?php echo e(base_url('assets/images/body/white-gradient-1.png')); ?>" alt=" " title=" " style="width:100%"></div>
<?php endif; ?>

<nav class="navbar navbar-expand-md fixed-top header">

    <div class="container-fluid p-0 header__container">
		<a class="navbar-brand" href="<?php echo e(base_url()); ?>" style="position:absolute;left:46.5%;top:35px" >
			<?php echo $__env->make('Layouts.icons._icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</a>
      	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
      	</button>

      	<div class="collapse navbar-collapse" id="navbar">
        	<ul class="navbar-nav me-auto mb-2 mb-md-0">
				<li class="nav-item header__nav-link">
					<a href="<?php echo e(base_url('home')); ?>" class="nav-link">HOME</a>
				</li>
				<li class="nav-item header__nav-link">
					<a href="<?php echo e(base_url('journals')); ?>" class="nav-link">JOURNALS</a>
				</li>
				<li class="nav-item header__nav-link">
					<a href="<?php echo e(base_url('booking')); ?>" class="nav-link">BOOKING</a>
				</li>
				<li class="nav-item header__nav-link">
					<a href="<?php echo e(base_url('personal_trainer')); ?>" data-anchor="" class="nav-link">PERSONAL TRAINER</a>
				</li>
				<!-- <li class="nav-item header__nav-link">
					<a href="<?php echo e(base_url()); ?>#about" data-anchor="" class="nav-link">ABOUT US</a>
				</li> -->
				<li class="nav-item header__nav-link">
					<a href="<?php echo e(base_url()); ?>#find" data-anchor="" class="nav-link">FIND US</a>
				</li>
			</ul>
		</div>

		<div class="header__social">
			<ul class="header__social-list" style="margin-bottom:0">
				<li class="header__social-item">
					<a target="_blank" class="header__social-link twitter-link">
						<svg width="39.044" height="39.045" viewBox="0 0 39.044 39.045">
							<use xlink:href="#twitter-icon">
								<?php echo $__env->make('Layouts.icons._twitter-icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</use>
						</svg>
					</a>
				</li>
				<li class="header__social-item">
					<a target="_blank" class="header__social-link youtube-link">
						<svg width="39.063" height="39.063" viewBox="0 0 39.068 39.068">
							<use xlink:href="#youtube-icon">
								<?php echo $__env->make('Layouts.icons._youtube-icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</use>
						</svg>
					</a>
				</li>
				<li class="header__social-item">
					<a target="_blank" class="header__social-link instagram-link">
						<svg width="39.063" height="39.063" viewBox="0 0 39.063 39.063">
							<use xlink:href="#instagram-icon">
								<?php echo $__env->make('Layouts.icons._instagram-icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
							</use>
						</svg>
					</a>
				</li>
				<li class="header__social-item dropdown">
					<a class="header__social-link dropdown-toggle" href="#" id="dropdown-user" data-bs-toggle="dropdown" aria-expanded="true">
						<i class="bi-person-circle" style="font-size: 40px"></i>
					</a>
					<ul class="dropdown-menu text-right" aria-labelledby="dropdown-user" data-bs-popper="none">
						<?php if($id_sess == 0): ?>
							<li><a class="dropdown-item" href="<?php echo e(base_url('register')); ?>">REGISTER</a></li>
							<li><a class="dropdown-item" href="<?php echo e(base_url('login')); ?>">LOGIN</a></li>
						<?php else: ?>
							<li><a class="dropdown-item" href="<?php echo e(base_url('profile')); ?>">PROFILE</a></li>
							<li><a class="dropdown-item" href="<?php echo e(base_url('logout')); ?>">LOGOUT</a></li>
						<?php endif; ?>
					</ul>
				</li>
			</ul>
		</div>

		<a href="<?php echo e(base_url()); ?>#contact" class="header__mail-to">
			<svg width="39" height="29.087" viewBox="0 0 39 29.087">
				<use xlink:href="#mail-icon">
					<?php echo $__env->make('Layouts.icons._mail-icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</use>
			</svg>
		</a>

		<!-- <ul id="navigasi">
			<li><a href="#">日本語</a>
				<ul>
					<li><a href="https://www.mygreengrowers.com/en/">English</a></li>
				</ul>
			</li>
		</ul> -->
		<button class="header__hamburger" aria-label="Menu" id="btn-hamburger">
			<span></span>
			<span></span>
			<span></span>
		</button>
    </div>
</nav><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Layouts/config/_navbar.blade.php ENDPATH**/ ?>