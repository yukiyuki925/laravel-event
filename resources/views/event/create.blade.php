<x-event-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12 mt-5">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8 pb-10">
            <div class="mb-12 md:mb-16">
                <h4 class="mb-4 text-left font-bold text-2xl text-gray-800 md:mb-6 lg:text-3xl">イベント新規作成</h4>
            </div>

            <form action="{{route('event.store')}}" id="event-form" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="sm:col-span-2">
                    <label for="event_title" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">イベント名<span class="ml-2 inline-block rounded bg-blue-100 px-2 py-0.5 text-xs text-blue-700">必須</span></label>
                    <input name="event_title"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    @error('event_title')
                        <p class="text-red-600 text-sm mt-1">※ {{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="area_id" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">エリア<span class="ml-2 inline-block rounded bg-blue-100 px-2 py-0.5 text-xs text-blue-700">必須</span></label>
                    <select name="area_id" id="area_id"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none focus:ring">
                        <option value="">選択してください</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                    @error('area_id')
                        <p class="text-red-600 text-sm mt-1">※ {{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="event_start" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">開催日程<span class="ml-2 inline-block rounded bg-blue-100 px-2 py-0.5 text-xs text-blue-700">必須</span></label>
                    <div class="flex gap-2">
                        <input type="date" name="start_event_date"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                        <span class="self-center text-gray-500">〜</span>
                        <input type="date" name="end_event_date"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    </div>
                    @error('start_event_date')
                        <p class="text-red-600 text-sm mt-1">※ {{ $message }}</p>
                    @enderror
                    @error('end_event_date')
                        <p class="text-red-600 text-sm mt-1">※ {{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="start_time" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">開始時間<span class="ml-2 inline-block rounded bg-blue-100 px-2 py-0.5 text-xs text-blue-700">必須</span></label>
                    <input type="time" name="start_time"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none focus:ring" />
                    @error('start_time')
                        <p class="text-red-600 text-sm mt-1">※ {{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="end_time" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">終了時間<span class="ml-2 inline-block rounded bg-blue-100 px-2 py-0.5 text-xs text-blue-700">必須</span></label>
                    <input type="time" name="end_time"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none focus:ring" />
                    @error('end_time')
                        <p class="text-red-600 text-sm mt-1">※ {{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2 my-1">
                    <label for="img" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像<span class="ml-2 inline-block rounded bg-blue-100 px-2 py-0.5 text-xs text-blue-700">必須</span></label>
                    <div class="relative w-fit my-3">
                        <input
                            type="file"
                            name="img"
                            id="img"
                            accept="image/*"
                            class="block text-sm text-gray-700
                                   file:py-2 file:px-4
                                   file:rounded file:border-0
                                   file:text-sm file:font-semibold
                                   file:bg-blue-50 file:text-blue-700
                                   hover:file:bg-blue-100
                                   focus:outline-none"
                        />
                        @error('img')
                            <p class="text-red-600 text-sm mt-1">※ {{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="sm:col-span-2">
                    <label for="description" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">イベント詳細<span class="ml-2 inline-block rounded bg-blue-100 px-2 py-0.5 text-xs text-blue-700">必須</span></label>
                    <textarea name="description"
                        class="h-48 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></textarea>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">※ {{ $message }}</p>
                        @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">料金区分</label>
                    <div class="flex items-center gap-4">
                        <label><input type="radio" name="price_type" value="free" checked onclick="togglePrice(false)"> 無料</label>
                        <label><input type="radio" name="price_type" value="paid" onclick="togglePrice(true)"> 有料</label>
                    </div>

                    <div id="price-input" class="mt-4 hidden">
                        <label for="price" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">金額（円）    <span class="ml-2 inline-block rounded bg-blue-100 px-2 py-0.5 text-xs text-blue-700">必須</span></label>
                        <input type="number" name="price" id="price" min="0" step="100"
                            class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                        @error('price')
                            <p class="text-red-600 text-sm mt-1">※ {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="place" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">開催場所<span class="ml-2 inline-block rounded bg-blue-100 px-2 py-0.5 text-xs text-blue-700">必須</span></label>
                    <input name="place"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></input>
                    @error('place')
                        <p class="text-red-600 text-sm mt-1">※ {{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">
                        タグ
                    </label>

                    <div class="flex flex-wrap gap-3">
                        @foreach($tags as $tag)
                            <label class="inline-flex items-center space-x-2">
                                <input type="checkbox"
                                    name="tag_id[]"
                                    value="{{ $tag->id }}"
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200"
                                    {{ in_array($tag->id, old('tag_id', [])) ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700">{{ $tag->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="flex flex-wrap justify-end gap-5 mt-4 pb-5">
        <a href="{{route('index')}}" class="rounded-lg border border-blue-400 bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-white hover:bg-blue-700 focus:ring focus:ring-white-200 disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300">一覧へ戻る</a>
        <button onclick="document.getElementById('event-form').submit();" class="rounded-lg border border-blue-400 bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-white hover:bg-blue-700 focus:ring focus:ring-white-200 disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300">イベントを作成</button>
    </div>

</x-event-layout>

<script>
    function togglePrice(show) {
        document.getElementById('price-input').classList.toggle('hidden', !show);
    }
</script>
