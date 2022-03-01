<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <article 
                class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" 
                style="background-image: url({{ Storage::url($post->image->url) }})">
                <div class="w-full h-full px-8 flex flex-col justify-center">
                    <div >
                        @foreach($post->tags as $tag)
                            <a href="" class="inline-block px-3 h-6 text-white rounded-full bg-{{ $tag->color }}-500" >{{ $tag->name }}</a>
                            
                        @endforeach
                    </div>
                    
                    <h1 class="text-4xl text-white leading-8 font-bold">
                        <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
                    </h1>

                </div>
            </article>
            @endforeach
        </div>

        <div>
            {{ $posts->links()}}
        </div>
    </div>

    <h1 class="bg-black">slate</h1>
    <h1 class="bg-white">slate</h1>
    <h1 class="bg-slate-500">slate</h1>
    <h1 class="bg-gray-500">slate</h1>
    <h1 class="bg-zinc-500">slate</h1>
    <h1 class="bg-neutral-500">slate</h1>
    <h1 class="bg-stone-500">slate</h1>
    <h1 class="bg-red-500">slate</h1>
    <h1 class="bg-orange-500">slate</h1>
    <h1 class="bg-amber-500">slate</h1>
    <h1 class="bg-yellow-500">slate</h1>
    <h1 class="bg-lime-500">slate</h1>
    <h1 class="bg-green-500">slate</h1>
    <h1 class="bg-emerald-500">slate</h1>
    <h1 class="bg-teal-500">slate</h1>
    <h1 class="bg-cyan-500">slate</h1>
    <h1 class="bg-sky-500">slate</h1>
    <h1 class="bg-blue-500">slate</h1>
    <h1 class="bg-indigo-500">slate</h1>
    <h1 class="bg-violet-500">slate</h1>
    <h1 class="bg-purple-500">slate</h1>
    <h1 class="bg-fuchsia-500">slate</h1>
    <h1 class="bg-pink-500">slate</h1>
    <h1 class="bg-rose-500">slate</h1>
    
</x-app-layout>