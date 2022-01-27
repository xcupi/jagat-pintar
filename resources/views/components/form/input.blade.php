@props(['name'])

<x-form.field>
			<x-form.label name="{{ $name }}"/>

			<input {{ $attributes->merge(['class' => 'border border-gray-300 w-full rounded px-3 py-1.5']) }} 
			name="{{ $name }}"
			id="{{ $name }}"
			{{ $attributes(['value' => old($name)]) }}>

			<x-form.error name="{{ $name }}"/>
		</x-form.field>