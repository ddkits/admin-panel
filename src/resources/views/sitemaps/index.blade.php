<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if ($post->count() > 0)
    <sitemap>
        <loc>{{ config('app.url', 'ddkits.com') }}/sitemap/post</loc>
        <lastmod>{{ $post->first()->created_at->tz('PST')->toAtomString() }}</lastmod>
    </sitemap>
    @endif

</sitemapindex>
