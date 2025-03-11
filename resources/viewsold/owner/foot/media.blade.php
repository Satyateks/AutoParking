@extends('components.user.main')

@section('main-container')

  <main class="container pt-4 pb-4">
    <section class="blog-single">
      <div class="blog">
        <div class="blog-img blog-head-img">
          <img src="images/media1.jpg" alt="">
        </div>
        <div class="blog-content">
          <h2 class="blog-title">
            Weekly Newsletter: Tweets for Higher Engagements
          </h2>
          <p class="blog-desc">
            It is a long established fact that a reader will be distracted by
            the readable content of a page when looking at its layout. The
            point of using Lorem Ipsum is that it has a more-or-less normal
            distribution of letters, as opposed to using 'Content here,
            content here', making it look like readable English.
          </p>
          <div class="blog-details">
            <div class="blog-author-img">
              <img src="images/media.jpg" alt="" />
            </div>
            <div class="blog-author-details">
              <h4 class="blog-author-name">Media, Press Release</h4>
              <div class="blog-author-desig">AutoPark</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="blog-grid pt-4">
      <div class="blog">
        <div class="blog-img">
          <img src="images/media.jpg" alt="">
        </div>
        <div class="blog-content blog-head-content">
          <h2 class="blog-title">AutoPark adds up to 750 new parking locations</h2>
          <p class="blog-desc">
            AutoPark adds up to 750 new parking locations to its network in US it has a more-or-less normal
            distribution of letters, as opposed to using 'Content here,
            content here', making it look like readable English.
          </p>
          <div class="blog-details">
            <div class="blog-author-details">
              <h4 class="blog-author-name">Media Release</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="blog">
        <div class="blog-img">
          <img
              src="images/media1.jpg"
              alt=""
            />
        </div>
        <div class="blog-content blog-head-content">
          <h2 class="blog-title">AutoPark adds up to 750 new parking locations</h2>
          <p class="blog-desc">
            AutoPark adds up to 750 new parking locations to its network in US it has a more-or-less normal
            distribution of letters, as opposed to using 'Content here,
            content here', making it look like readable English.
          </p>
          <div class="blog-details">
            <div class="blog-author-details">
              <h4 class="blog-author-name">Media Release</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="blog">
        <div class="blog-img">
          <img
              src="images/media1.jpg"
              alt=""
            />
        </div>
        <div class="blog-content blog-head-content">
          <h2 class="blog-title">AutoPark adds up to 750 new parking locations</h2>
          <p class="blog-desc">
            AutoPark adds up to 750 new parking locations to its network in US it has a more-or-less normal
            distribution of letters, as opposed to using 'Content here,
            content here', making it look like readable English.
          </p>
          <div class="blog-details">
            <div class="blog-author-details">
              <h4 class="blog-author-name">Media Release</h4>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection()
