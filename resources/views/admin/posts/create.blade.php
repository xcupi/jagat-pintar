<x-layout>    
	<x-setting heading="Publish New Course">
		<form method="POST" action="/admin/posts" enctype="multipart/form-data">
		@csrf

		<x-form.input name="title"/>
		<x-form.input name="slug"/>
		<x-form.input class="form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding border-solid transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-red-600 focus:outline-none" name="thumbnail" type="file"/>
		<x-form.textarea name="excerpt"/>
		<x-form.textarea name="body"/>

		<x-form.field>
			<x-form.label name="category"/>

			<select name="category_id" id="category" class="form-select appearance-none
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-red-600 focus:outline-none" aria-label="Default select example">

				@foreach(App\Models\Category::all() as $category)
					<option 
					value="{{ $category->id }}"
					{{ old('category_id') == $category->id ? 'selected' : '' }}
					>{{ ucwords($category->name) }}</option>
				@endforeach
				
			</select>

			<x-form.error name="category"/>
		</x-form.field>

		<x-form.button>Publish</x-form.button>
	</form>
	</x-setting>
</x-layout>