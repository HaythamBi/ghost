<div class="blocks">
    <div class="row-fluid">
        <div class="span12">
            <div class="block">
                <div class="block-header muted uppercase">
                    <div class="block-title pull-left">Authors</div>
                    <div class="block-icons pull-right"><a href="{{ URL::to_route('New Author') }}"><i class="muted">&oplus;</i></a></div>
                </div>
                <div class="author">
                    @foreach ($authors as $author)
                        @render('authors.single', array('author' => $author))
                    @endforeach
                </div><!-- .posts -->
            </div>
        </div>
        <div class="span6 hide">
            <div class="block">
                <div class="block-header muted uppercase">
                    <div class="block-title pull-left">More Info</div>
                    <div class="block-icons pull-right"></div>
                </div>
                <div class="preview">Loading Author...</div>
            </div>
        </div>
    </div>
</div>
