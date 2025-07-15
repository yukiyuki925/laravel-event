<x-event-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12 mt-5">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8 pb-10">
            <div class="mb-12 md:mb-16">
                <h4 class="mb-4 text-left text-2xl text-gray-800 md:mb-6 lg:text-3xl">イベント新規作成</h4>
            </div>

            <form action="{{route('event.store')}}" id="event-form" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="sm:col-span-2">
                    <label for="event_title" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">イベント名</label>
                    <input name="event_title"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                </div>

                <div class="sm:col-span-2">
                    <label for="area_id" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">エリア</label>
                    <select name="area_id" id="area_id"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none focus:ring">
                        <option value="">選択してください</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="sm:col-span-2">
                    <label for="event_start" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">開催日程</label>
                    <div class="flex gap-2">
                        <input type="date" name="start_event_date"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                        <span class="self-center text-gray-500">〜</span>
                        <input type="date" name="end_event_date"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="img" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">画像</label>
                    <input type="file" name="img" id="img" accept="image/*" />
                </div>


                <div class="sm:col-span-2">
                    <label for="description" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">イベント詳細</label>
                    <textarea name="description"
                        class="h-48 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="mb-2 inline-block text-sm text-gray-800 sm:text-base">料金区分</label>
                    <div class="flex items-center gap-4">
                        <label><input type="radio" name="price_type" value="free" checked onclick="togglePrice(false)"> 無料</label>
                        <label><input type="radio" name="price_type" value="paid" onclick="togglePrice(true)"> 有料</label>
                    </div>

                    <div id="price-input" class="mt-4 hidden">
                        <label for="price" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">金額（円）</label>
                        <input type="number" name="price" id="price" min="0" step="100"
                            class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="place" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">開催場所</label>
                    <input name="place"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></input>
                </div>

                <div class="sm:col-span-2">
                    <label for="tag_id" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">タグ</label>
                    <select name="tag_id" id="tag_id"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none focus:ring">
                        <option value="">選択してください</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>

<div class="flex flex-wrap justify-end gap-5 mt-4 pb-5">
    <button onclick="document.getElementById('event-form').submit();" class="rounded-lg border border-blue-400 bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-white hover:bg-blue-700 focus:ring focus:ring-white-200 disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300">イベントを作成</button>
</div>

@if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>・{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</x-event-layout>

<script>
    function togglePrice(show) {
        document.getElementById('price-input').classList.toggle('hidden', !show);
    }
</script>
