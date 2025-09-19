<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h4>{{ $page->title }}</h4>
                        <p class="text-sm text-muted mb-2">Slug: <code>{{ $page->slug }}</code></p>
                        <p class="mb-0"><strong>Status:</strong> {{ ucfirst($page->status) }}</p>
                        <p><strong>Template:</strong> {{ $page->template_type == 'custom' ? $page->template_name : 'Default' }}</p>
                        @if ($page->published_at)
                            <p><strong>Published At:</strong> {{ \Carbon\Carbon::parse($page->published_at)->format('d M, Y') }}</p>
                        @endif
                    </div>
                    <div class="col-lg-4 text-end">
                        <a class="btn btn-outline-success btn-sm" href="{{ route('cms.pages.edit', $page) }}">Edit Page</a>
                    </div>
                </div>
                <hr class="horizontal dark">
                <div class="row">
                    <div class="col-md-12">
                        <h6>SEO Meta Information</h6>
                        <table class="table table-sm table-borderless">
                            <tr class="bg-light">
                                <th colspan="2">Meta Tags</th>
                            </tr>
                            <tr><th class="text-dark w-25">Meta Description</th><td>{{ $page->meta_description }}</td></tr>
                            <tr><th class="text-dark">Meta Keywords</th><td>{{ $page->meta_keywords }}</td></tr>
                            <tr><th class="text-dark">Canonical URL</th><td>{{ $page->canonical_url }}</td></tr>

                            <tr class="bg-light">
                                <th colspan="2">Twitter Tags</th>
                            </tr>
                            <tr><th class="text-dark">Twitter Card</th><td>{{ $page->twitter_card }}</td></tr>
                            <tr><th class="text-dark">Twitter Title</th><td>{{ $page->twitter_title }}</td></tr>
                            <tr><th class="text-dark">Twitter Description</th><td>{{ $page->twitter_description }}</td></tr>

                            <tr class="bg-light">
                                <th colspan="2">Open Graph Tags</th>
                            </tr>
                            <tr><th class="text-dark">OG Title</th><td>{{ $page->og_title }}</td></tr>
                            <tr><th class="text-dark">OG Description</th><td>{{ $page->og_description }}</td></tr>
                            <tr><th class="text-dark">OG URL</th><td>{{ $page->og_url }}</td></tr>
                            <tr><th class="text-dark">OG Type</th><td>{{ $page->og_type }}</td></tr>
                            <tr><th class="text-dark">OG Site Name</th><td>{{ $page->og_site_name }}</td></tr>
                            <tr><th class="text-dark">OG Locale</th><td>{{ $page->og_locale }}</td></tr>
                            <tr><th class="text-dark">Published Time</th><td>{{ $page->published_time }}</td></tr>
                            <tr><th class="text-dark">Modified Time</th><td>{{ $page->modified_time }}</td></tr>
                            @if ($page->metaTags && $page->metaTags->count())
                            <tr class="bg-light">
                                <th colspan="2">Custom Tags</th>
                            </tr>
                            @foreach ($page->metaTags as $tag)
                                <tr>
                                    <th class="text-dark">{{ $tag->key }}</th>
                                    <td>{{ is_array($tag->value) ? json_encode($tag->value) : $tag->value }}</td>
                                </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
                <hr class="horizontal dark">
                <div class="row">
                    <div class="col-12">
                        <h6>Page Content</h6>
                        <div class="border p-3 bg-light">
                            {!! nl2br(e($page->content)) ?: 'No content available.' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
