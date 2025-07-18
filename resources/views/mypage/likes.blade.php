<x-event-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12 mt-5">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="mb-6 flex items-end justify-between gap-4">
                <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">いいねしたイベント一覧</h2>
            </div>
            @if ($events->count())
                <div class="grid gap-x-4 gap-y-8 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($events as $event)
                        <div>
                            <a href="{{ route('mypage.likes-show', $event->id) }}"
                            class="hover:gray-800 mb-1 text-black transition duration-100 lg:text-lg">{{$event->event_title}}</a>
                            <a href="{{ route('mypage.likes-show', $event->id) }}"
                                class="group relative mb-2 block h-80 overflow-hidden rounded-lg bg-gray-100 lg:mb-3">
                                <img src="{{ $event->image_url }}" alt="イベント画像"
                                    loading="lazy"
                                    class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>

                            <div class="flex justify-start mb-2">
                                <p class=" text-red-500 lg:text-lg">{{$event->formatted_start_date}}〜{{$event->formatted_end_date}}</p>
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
                <p>いいねしたイベントはありません</p>
            @endif
        </div>
    </div>
</x-event-layout>
