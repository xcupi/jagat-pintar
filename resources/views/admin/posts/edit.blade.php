<x-layout>    
	<x-setting :heading="'Edit Course: ' . $post->title">
		<form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
		@csrf

		@method('PATCH')

		<x-form.input name="title" :value="old('title', $post->title)"/>
		<x-form.input name="slug" :value="old('slug', $post->slug)"/>
			<div class="flex mt-6">
				<div class="flex-1">
					<x-form.input class="form-control block text-base font-normal text-gray-700 bg-white bg-clip-padding     border-solid transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-red-600 focus:outline-none" name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"/>
				</div>
				
			<img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
			</div>
		
		<x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
		<x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

		<x-form.field>
			<x-form.label name="category"/>

			<select name="category_id" id="category" class="form-select appearance-none
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
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
					{{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
					>{{ ucwords($category->name) }}</option>
				@endforeach
				
			</select>

			<x-form.error name="category"/>
		</x-form.field>

		<x-form.button>Update</x-form.button>
	</form>
	</x-setting>
</x-layout>