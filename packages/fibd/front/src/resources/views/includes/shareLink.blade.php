<div class="icon-share">
  <ul class="share-links">
      <li><a href=" https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ textLink(url()->current())}}" class="link-twitter" target="_blank"><img src="{{ asset('medias/images/Twitter.svg') }}" alt="Twitter FIBD"></a></li>
      <li><a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}&name={{ textLink(url()->current())}}#fibd" class="link-facebook" target="_blank"><img src="{{ asset('medias/images/Facebook.svg') }}" alt="Facebook FIBD"></a></li>
  </ul>
</div>
