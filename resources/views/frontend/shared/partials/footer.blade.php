<div class="container">
    @if(!empty(\App\Models\Settings::disqus()))
        @include('frontend.blog.partials.disqus')
    @endif
    <div style="text-align: center">
        <div class="">
            <div class="">
                <hr>
                <p class="small">project ogatism</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- scroll to top button -->
<span id="top-link-block" class="hidden hover-button affix-top">
    <a id="scroll-to-top" href="#top">SCROLL TO TOP</a>
</span>

@if (!empty(\App\Models\Settings::gaId()))
    @include('frontend.blog.partials.analytics')
@endif
