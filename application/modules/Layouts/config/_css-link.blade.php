
@include('Layouts.config._fonts')

<link rel="stylesheet" href="{{ base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ base_url('vendor/twbs/bootstrap-icons/bootstrap-icons.css') }}">

{{-- <link href="{{ base_url('assets/styles/animation.css') }}" rel="stylesheet"> --}}
<link href="{{ base_url('assets/styles/source.min.css') }}" rel="stylesheet">
<link href="{{ base_url('assets/styles/source-tablet.min.css') }}" rel="stylesheet">
<link href="{{ base_url('assets/styles/source-desktop.min.css') }}" rel="stylesheet">

<style>
	@keyframes br_animation {
		0% {
			width: 0%;
		}
		100% {
			width: 100%;
		}
	}
	@keyframes heartbeat {
		from {
			-webkit-transform: scale(1);
			transform: scale(1);
			-webkit-transform-origin: center center;
			transform-origin: center center;
			-webkit-animation-timing-function: ease-out;
			animation-timing-function: ease-out;
		}
		10% {
			-webkit-transform: scale(0.91);
			transform: scale(0.91);
			-webkit-animation-timing-function: ease-in;
			animation-timing-function: ease-in;
		}
		17% {
			-webkit-transform: scale(0.98);
			transform: scale(0.98);
			-webkit-animation-timing-function: ease-out;
			animation-timing-function: ease-out;
		}
		33% {
			-webkit-transform: scale(0.87);
			transform: scale(0.87);
			-webkit-animation-timing-function: ease-in;
			animation-timing-function: ease-in;
		}
		45% {
			-webkit-transform: scale(1);
			transform: scale(1);
			-webkit-animation-timing-function: ease-out;
			animation-timing-function: ease-out;
		}
	}
	@keyframes puff-out-center {
		0% {
			-webkit-transform: scale(1);
			transform: scale(1);
			-webkit-filter: blur(0px);
			filter: blur(0px);
			opacity: 1;
		}
		100% {
			-webkit-transform: scale(2);
			transform: scale(2);
			-webkit-filter: blur(4px);
			filter: blur(4px);
			opacity: 0;
		}
	}
	.heartbeat {
		-webkit-animation: heartbeat 1.5s ease-in-out infinite both;
		animation: heartbeat 1.5s ease-in-out infinite both;
	}
	</style>
