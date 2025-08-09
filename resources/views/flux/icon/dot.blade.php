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

{{-- <svg {{ $attributes->class($classes) }} aria-hidden="true" data-flux-icon fill="none" height="20" viewBox="0 0 62 20" width="62" xmlns="http://www.w3.org/2000/svg"> --}}
{{-- <svg aria-hidden="true" data-flux-icon fill="none" height="20" width="62" xmlns="http://www.w3.org/2000/svg">
	<path clip-rule="evenodd"
		d="M35.2003 0.283442C34.8224 -0.0944829 34.2096 -0.0944804 33.8317 0.283448C33.4538 0.661376 33.4538 1.27412 33.8317 1.65204L41.2129 9.0332H0.96774C0.433272 9.0332 0 9.46648 0 10.0009C0 10.5354 0.433272 10.9687 0.96774 10.9687H41.2109L33.8317 18.348C33.4538 18.7259 33.4538 19.3386 33.8317 19.7166C34.2096 20.0945 34.8224 20.0945 35.2003 19.7166L44.205 10.7118C44.3963 10.535 44.516 10.282 44.516 10.0009C44.516 9.98504 44.5156 9.96922 44.5149 9.9535C44.5135 9.92488 44.5109 9.89631 44.507 9.86788C44.4793 9.66587 44.3878 9.47092 44.2325 9.31563L35.2003 0.283442Z"
		fill-rule="evenodd" fill="#9DCB94" />
	<path clip-rule="evenodd" d="M55 6C52.2386 6 50 8.23858 50 11C50 13.7614 52.2386 16 55 16C57.7614 16 60 13.7614 60 11C60 8.23858 57.7614 6 55 6ZM48 11C48 7.13401 51.134 4 55 4C58.866 4 62 7.13401 62 11C62 14.866 58.866 18 55 18C51.134 18 48 14.866 48 11Z" fill-rule="evenodd" fill="#9DCB94" />
</svg> --}}
<svg height="10" viewBox="0 0 10 10" width="10" xmlns="http://www.w3.org/2000/svg">
	<g clip-path="url(#clip0_1305_5400)">
		<path clip-rule="evenodd" d="M0.199707 5C0.199707 2.23858 2.43828 0 5.19971 0C7.96113 0 10.1997 2.23858 10.1997 5C10.1997 7.76142 7.96113 10 5.19971 10C2.43828 10 0.199707 7.76142 0.199707 5Z" fill-rule="evenodd" fill="#3C3934" />
	</g>
</svg>
