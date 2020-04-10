<script>
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  window.twttr = (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
      t = window.twttr || {};
    if (d.getElementById(id)) return t;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);

    t._e = [];
    t.ready = function(f) {
      t._e.push(f);
    };

    return t;
  }(document, "script", "twitter-wjs"));
</script>

<div class="share">
  <ul class="share-list">
    <li class="share-list-item wow pulse">
      <script async src="https://telegram.org/js/telegram-widget.js?8" data-telegram-share-url="<?=$current_url ?>" data-size="large" data-comment="<?=$article['caption'] ?> - Миколаївський заклад загальної середньої освіти №34"></script>
    </li>
    <li class="share-list-item wow pulse" data-wow-delay=".5s">
      <div class="fb-share-button" data-href="<?=$current_url ?>" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fschool344.ua%2Fnews%2Fnews.php%3Fid%3D150&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
    </li>
    <li class="share-list-item wow pulse" data-wow-delay="1s">
      <a class="twitter-share-button"
        href="<?=$current_url ?>"
        data-size="large">
        Tweet</a>
    </li>
  </ul>
</div>