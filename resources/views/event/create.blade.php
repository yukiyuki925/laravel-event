<x-event-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12 mt-5">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h4 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">イベント新規作成</h4>
            </div>
            <!-- text - end -->

            <!-- form - start -->
            <form class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="event_title" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">イベント名</label>
                    <input name="event_title"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                </div>

                <div class="sm:col-span-2">
                    <label for="event_date" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Email*</label>
                    <input name="event_date"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                </div>

                <div class="sm:col-span-2">
                    <label for="subject" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Subject*</label>
                    <input name="subject"
                        class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                </div>

                <div class="sm:col-span-2">
                    <label for="message" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Message*</label>
                    <textarea name="message"
                        class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></textarea>
                </div>

                <div class="flex items-center justify-between sm:col-span-2">
                    <button
                        class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Send</button>

                    <span class="text-sm text-gray-500">*Required</span>
                </div>

                <p class="text-xs text-gray-400">By signing up to our newsletter you agree to our <a href="#"
                        class="underline transition duration-100 hover:text-indigo-500 active:text-indigo-600">Privacy
                        Policy</a>.</p>
            </form>
            <!-- form - end -->
        </div>
    </div>
</x-event-layout>
