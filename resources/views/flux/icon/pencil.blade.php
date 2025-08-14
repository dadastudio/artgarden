@php $attributes = $unescapedForwardedAttributes ?? $attributes; @endphp

@props([
    'variant' => 'outline',
])

@php
	$classes = Flux::classes('shrink-0')->add(
	    match ($variant) {
	        'outline' => '[:where(&)]:size-6',
	        'solid' => '[:where(&)]:size-6',
	        'mini' => '[:where(&)]:size-5',
	        'micro' => '[:where(&)]:size-4',
	    },
	);
@endphp

<svg fill="none" height="11" viewBox="0 0 10 11" width="10" xmlns="http://www.w3.org/2000/svg">
	<g clip-path="url(#clip0_1182_3091)">
		<path clip-rule="evenodd" d="M1.5011 7.31161L5.0048 3.77037L7.1541 5.92838L9.75 3.35507L6.87496 0.449219L0.5 6.8925V9.69922L3.35019 9.6992L7.1541 5.92838L6.45061 5.22204L2.94119 8.68737L1.5011 8.68738V7.31161ZM8.3446 3.51071L6.87199 2.01802L5.8669 3.03095L7.33951 4.52364L8.3446 3.51071Z" fill-rule="evenodd" fill="#C9C9C8" />
	</g>
	{{-- <defs>
		<clipPath id="clip0_1182_3091">
			<rect fill="white" height="10" transform="translate(0 0.199219)" width="10" />
		</clipPath>
	</defs> --}}
</svg>
