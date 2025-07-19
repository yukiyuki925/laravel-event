<x-event-layout>
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" src="{{$event->image_url}}" alt="イベント画像">
            <div class="text-center lg:w-2/3 w-full">
                <div class="flex items-center gap-5 justify-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{$event->event_title}}</h1>
                    @if (auth()->user()->id != $event->user_id)
                        <form action="{{ route('event-like', $event->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="hover:opacity-70">
                                @if (auth()->user()->likedEvents->contains($event->id))
                                {{-- いいね済み --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500 fill-current" viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                                2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09
                                                C13.09 3.81 14.76 3 16.5 3
                                                19.58 3 22 5.42 22 8.5
                                                c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                @else
                                {{-- 未いいね --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 21l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                                2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09
                                                C13.09 3.81 14.76 3 16.5 3
                                                19.58 3 22 5.42 22 8.5
                                                c0 3.78-3.4 6.86-8.55 11.54L12 21z" />
                                    </svg>
                                @endif
                            </button>
                        </form>
                    @endif
                </div>
                <p class="mb-8 leading-relaxed text-left">{{$event->description}}</p>
                <div class="space-y-5 text-sm md:text-base">
                    <!-- 開催期間 -->
                    <div class="flex flex-col md:flex-row md:items-start">
                        <span class="w-28 shrink-0 rounded bg-blue-600 px-3 py-1 text-white text-center md:text-left">
                            開催期間
                        </span>
                        <div class="mt-2 md:mt-0 md:ml-4">
                            <p>{{$event->formatted_start_date}}〜{{$event->formatted_end_date}}</p>
                        </div>
                    </div>

                    <!-- 開催時間 -->
                    <div class="flex flex-col md:flex-row md:items-start">
                        <span class="w-28 shrink-0 rounded bg-blue-600 px-3 py-1 text-white text-center md:text-left">
                            開催時間
                        </span>
                        <div class="mt-2 md:mt-0 md:ml-4">
                            <p>{{$event->formatted_start_time}}〜{{$event->formatted_end_time}}</p>
                        </div>
                    </div>

                    <!-- 開催場所 -->
                    <div class="flex flex-col md:flex-row md:items-start">
                        <span class="w-28 shrink-0 rounded bg-blue-600 px-3 py-1 text-white text-center md:text-left">
                            場所
                        </span>
                        <div class="mt-2 md:mt-0 md:ml-4">
                            <p>{{$event->area->name}}/{{$event->place}}</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        @foreach ($event->tags as $tag)
                            <span class="inline-block rounded-full border border-blue-500 px-4 py-1 text-blue-500 text-sm">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-event-layout>
