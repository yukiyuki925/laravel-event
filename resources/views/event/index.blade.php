<x-event-layout>
    <div class="bg-white sm:py-8 lg:py-12 mt-5">
        <div class="mx-auto max-w-screen-2xl py-4 px-4 md:px-8">
            <div class="mb-6 flex items-end justify-between gap-4">
                <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">イベント一覧</h2>
                <a href="{{ route('event.create') }}" class="inline-block rounded-lg border bg-white px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">イベント作成</a>
            </div>
            @if ($events->count())
                <div class="grid gap-x-4 gap-y-8 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($events as $event)
                        <div>
                            <div class="flex items-center gap-2 justify-center">
                                <a href="{{ route('event.show', $event->id) }}"
                                class="hover:gray-800 mb-1 text-black transition duration-100 lg:text-lg">{{$event->event_title}}</a>
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
                            <a href="{{ route('event.show', $event->id) }}"
                                class="group relative mb-2 block h-80 overflow-hidden rounded-lg bg-gray-100 lg:mb-3">
                                <img src="{{ $event->image_url }}" alt="イベント画像"
                                    loading="lazy"
                                    class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>

                            <div class="flex justify-start mb-2">
                                <p class=" text-red-500">{{$event->formatted_start_date}}〜{{$event->formatted_end_date}}</p>
                            </div>

                            <div>
                                <p class="mt-1 mb-1">エリア：{{$event->area->name}}</p>
                                <p>開催地：{{$event->place}}</p>
                            </div>

                            <div class="flex flex-wrap gap-2 mt-2">
                                @foreach ($event->tags as $tag)
                                    <span class="inline-block rounded-full border border-blue-500 px-4 py-1 text-blue-500 text-sm">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>現在開催中のイベントはありません</p>
            @endif
        </div>
    </div>
</x-event-layout>
