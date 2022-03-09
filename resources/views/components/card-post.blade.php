@props(
    [
        'post'
    ])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <img src="{{ isset($post->image) ? Storage::url($post->image->url) : 'http://www.losprincipios.org/images/default.jpg' }}" class="w-full h-72 object-cover object-center" alt="">

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
        </h1>

        <div class="text-gray-700 text-base">
            {!! $post->extract !!}
        </div>

        <div class="px-6 pt-4 pb-2">
            @foreach($post->tags as $tag)
                <a href="{{ route('posts.tag', $tag) }}" class="inline-block px-3 text-white text-sm rounded-full bg-{{ $tag->color }}-500 mr-2" >{{ $tag->name }}</a>
            @endforeach

        </div>

    </div>
</article>