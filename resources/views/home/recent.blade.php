<div class="col-12 pt-3 pb-4 g-0 border-bottom-brown">
  <p class="text-muted fs-5 text-brown">Recently Written</p>
  @foreach ($recentlyWritten as $recent)
    <span onclick="redirectTo('{{ $recent['url'] }}')">
      <div class="card p-0 mt-4 small-card" style="min-height:140px;">
        <img src="{{ $recent['image_url_landscape'] }}" class="w-100 h-100 card-img" style="opacity: 0.5; min-height:140px;">
        <div class="card-img-overlay">
          <h5 class="card-title text-brown">{{ $recent['title'] }}</h5>
          <p class="card-text text-brown">{{ $recent['date'] }}</p>
        </div>
      </div>
    </span>
  @endforeach
</div>