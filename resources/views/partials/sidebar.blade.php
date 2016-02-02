<div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
</div>
<div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
        @foreach($archives as $archive)
        <li><a href="{{ url('/blogs?published_at='.$archive->published_at) }}">{{ $archive->archive_published_at }}</a></li>
        @endforeach
    </ol>
</div>
<div class="sidebar-module">
    <h4>Tags</h4>
    <ol class="list-unstyled">
        @foreach($tags as $tag)
            <li><a href="{{ url('/blogs?tag='.$tag->id) }}">{{ $tag->name }}</a></li>
        @endforeach
    </ol>
</div>
<div class="sidebar-module">
    <h4>Sort</h4>
    <ol class="list-unstyled">
        <li><a href="{{ url('/blogs?sort=title'.(Request::has('tag')?'&tag='.Request::input('tag'):'')) }}">Title</a></li>
        <li><a href="{{ url('/blogs?sort=published_at'.(Request::has('tag')?'&tag='.Request::input('tag'):'')) }}">Published</a></li>
    </ol>
</div>