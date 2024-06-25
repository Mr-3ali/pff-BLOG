@extends('layout')
@section('title', $post->title)

@section('content')
    <!-- Post Section -->
    <section class="max-w-5xl mx-auto p-4">
        <article class="bg-white rounded shadow-lg overflow-hidden mb-6">
            <!-- Post Title and Metadata -->
            <div class="p-6">
                <h1 class="text-4xl font-bold leading-tight text-gray-900 mb-2">{{ $post->title }}</h1>
                <div class="flex items-center text-sm text-gray-600 space-x-2">
                    <a href="{{ route('categories.show', $post->category->slug) }}" class="text-blue-700 font-semibold uppercase">{{ $post->category->name }}</a>
                    <span class="text-gray-500">|</span>
                    <p>Published on {{ $post->created_at->format('F j, Y') }}</p>
                    <span class="text-gray-500">|</span>
                    <p>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</p>
                </div>
            </div>

            <!-- Post Image -->
            @if ($post->image)
                <div class="w-full overflow-hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
                </div>
            @endif

            <!-- Post Content -->
            <div class="p-6 prose prose-lg mt-4 w-full mx-auto ql-align-justify">
                {!! $post->content !!}
            </div>
        </article>

        <!-- You Might Also Like Section -->
        <section class="bg-white rounded shadow-lg p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">You Might Also Like</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($relatedPosts as $relatedPost)
                    <div class="bg-gray-100 p-4 rounded flex flex-col justify-between">
                        <a href="{{ route('posts.show', $relatedPost->slug) }}">
                            @if ($relatedPost->image)
                                <img src="{{ asset('storage/' . $relatedPost->image) }}" alt="{{ $relatedPost->title }}"
                                    class="w-full h-32 object-cover rounded">
                            @else
                                <img src="https://via.placeholder.com/150" alt="{{ $relatedPost->title }}"
                                    class="w-full h-32 object-cover rounded">
                            @endif
                            <h3 class="text-lg font-semibold mt-2">{{ $relatedPost->title }}</h3>
                        </a>
                        <p class="text-xs text-gray-600 mt-1">Published on {{ $relatedPost->created_at->format('F j, Y') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Comments Section -->
        <section class="bg-white rounded shadow-lg p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Comments ({{ $post->comments->count() }})</h2>
            <!-- Display Comments -->
            @foreach ($post->comments as $comment)
                <div class="bg-gray-100 p-4 mb-4 rounded flex items-start">
                    <!-- Random User Icon -->
                    <div class="mr-4">
                        <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                            <span
                                class="text-gray-700 text-lg font-bold">{{ strtoupper(substr($comment->user->name, 0, 1)) }}</span>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <p class="text-sm text-gray-600 font-bold">{{ $comment->user->name }}</p>
                        <p class="text-sm text-gray-600">Published on {{ $comment->created_at->format('F j, Y') }}</p>
                        <p class="mt-2">{{ $comment->content }}</p>
                    </div>
                    @auth
                        @if (Auth::id() == $comment->user_id || Auth::user()->is_admin)
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach

            @auth
                <!-- Comment Form -->
                <form action="{{ route('comments.store', $post->slug) }}" method="POST"
                    class="bg-gray-100 p-4 rounded flex items-center">
                    @csrf
                    <div class="flex-grow mr-4">
                        <label for="content" class="block text-gray-700">Add a Comment</label>
                        <textarea name="content" rows="2"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Post
                        Comment</button>
                </form>
            @else
                <!-- Login Prompt -->
                <p class="text-gray-600">You need to <a href="{{ route('login') }}"
                        class="text-blue-500 hover:underline">login</a> to post a comment.</p>
            @endauth
        </section>
    </section>
@endsection

@push('scripts')
    <script>
        // Update progress bar to track the post content
        document.addEventListener('scroll', function() {
            var content = document.querySelector('.prose');
            var contentHeight = content.offsetHeight;
            var contentTop = content.offsetTop;
            var scrollPosition = window.scrollY - contentTop;
            var progress = Math.min(Math.max(scrollPosition / contentHeight * 100, 0), 100);

            document.getElementById('progressBar').style.width = progress + '%';
        });
    </script>
@endpush