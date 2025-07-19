<nav class="bg-white border-b px-4 py-3 shadow" x-data="{ open: false }">
    <div class="flex items-center justify-between">
        <!-- ハンバーガーアイコン：常に表示 -->
        <button @click="open = !open" class="text-gray-700 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div x-show="open" @click.outside="open = false" class="mt-3 space-y-2">
        <a href="{{ route('index') }}" class="block text-gray-700 hover:text-blue-500">イベント一覧</a>
        <a href="{{ route('mypage.index') }}" class="block text-gray-700 hover:text-blue-500">マイページ</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block text-gray-700 hover:text-blue-500">
                ログアウト
            </button>
        </form>
    </div>
</nav>
