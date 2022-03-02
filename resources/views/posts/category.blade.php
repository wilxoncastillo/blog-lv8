<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Categoria: {{$category->name}}</h1>

        @foreach($posts as $post)
            <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ Storage::url($post->image->url) }}" class="w-full h-72 object-cover object-center" alt="">

                <div class="px-6 py-4">
                    <h1 class="font-bold text-xl mb-2">
                        <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
                    </h1>

                    <div class="text-gray-700 text-base">
                        {{ $post->extract}}
                    </div>

                    <div class="px-6 pt-4 pb-2">
                        @foreach($post->tags as $tag)
                            <a href="" class="inline-block px-3 text-white text-sm rounded-full bg-{{ $tag->color }}-500 mr-2" >{{ $tag->name }}</a>
                        @endforeach

                    </div>

                </div>
            </article>
        @endforeach

        <div>
            {{$posts->links() }}
        </div>
    </div>


    
</x-app-layout>