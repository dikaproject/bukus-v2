@extends('student.components.base')

@section('title', 'about')

@section('dashboard')
<style>
    :root {
	--index: calc(1vw + 1vh);
	--gutter: 30px;
	--side-small: 26;
	--side-big: 36;
	--depth: 4000px;
	--transition: .75s cubic-bezier(.075, .5, 0, 1)
}

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700&display=swap');

body {
	background-color: #000;
	color: #fff;
	font-size: calc(var(--index) * .8);
	font-family: 'Poppins', sans-serif;
	line-height: 1.75;
	height: var(--depth);
	font-weight: 300;
}

.container {
	width: 100%;
	height: 100%;
	position: fixed;
	perspective: 1500px;
}

.gallery {
	transform-style: preserve-3d;
	height: 100%;
}

.frame {
	width: 100%;
	height: 100%;
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	transition: var(--transition), opacity .75s ease;
	will-change: transform;
	transform-style: preserve-3d;
}

h1, h2, h3, h4 {
	font-weight: 100;
	text-transform: uppercase;
	width: min-content;
	line-height: 1;
	font-family: 'Poppins', sans-serif;
	color: #fff; /* Mengubah warna teks menjadi putih */
}

.frame h2 {
	text-align: center;
	font-size: calc(var(--index) * 3.3);
}

.frame-media {
	position: relative;
	width: calc(var(--index) * var(--side-small));
	height: calc(var(--index) * var(--side-big));
	background-position: center;
	background-size: cover;
}

.frame-media_left {
	right: calc(var(--side-small) / 2 * var(--index) + var(--gutter));
}

.frame-media_right {
	left: calc(var(--side-small) / 2 * var(--index) + var(--gutter));
}

.frame_bg {
	background-color: rgb(0 0 0 / .87);
}

video.frame-media {
	width: calc(var(--index) * var(--side-big));
	height: calc(var(--index) * var(--side-small));
}

video.frame-media_right {
	left: calc(var(--side-big) / 2 * var(--index) + var(--gutter));
}

video.frame-media_left {
	right: calc(var(--side-big) / 2 * var(--index) + var(--gutter));
}

.text-right > * {
	position: relative;
	left: 18vw;
}

.text-left > * {
	position: relative;
	right: 18vw;
}

.frame h3 {
	font-size: calc(var(--index) * 3);
	color: #fff; /* Mengubah warna teks menjadi putih */
}

.frame p {
	max-width: 30vw;
	margin-top: 3vh;
	color: #fff; /* Mengubah warna teks menjadi putih */
}

.scroll-text {
	position: fixed;
	bottom: 5vh;
	right: 5vw;
	cursor: pointer;
	font-size: calc(var(--index) * 1.5);
	transition: .25s ease;
}
</style>
<div class="container">
    <section class="gallery">
      <div class="frame">
        <div class="frame__content">
          <h2>Welcome to Bukus-V2</h2>
        </div>
      </div>

      <div class="frame">
        <div class="frame__content">
          <div
            class="frame-media frame-media_left"
            style="background-image: url('{{ asset('assets/images/1.jpg') }}')"
            ></div>
        </div>
      </div>

      <div class="frame frame_bg">
        <div class="frame__content">
          <video
            class="frame-media frame-media_right"
            src="media/video_optimized.mp4"
            autoplay
            loop
            muted
          ></video>
        </div>
      </div>

      <div class="frame"></div>

      <div class="frame">
        <div class="frame__content text-right">
          <h3>About Bukus</h3>
          <p>
            The Bukus website is useful for recording student violation points and star points<br />

          </p>
        </div>
      </div>

      <div class="frame frame_bg">
        <div class="frame__content">
          <div
            class="frame-media frame-media_left"
            style="background-image: url(images/2.webp)"
          ></div>
        </div>
      </div>

      <div class="frame"></div>

      <div class="frame frame_bg">
        <div class="frame__content">
          <video
            class="frame-media frame-media_right"
            src="media/video_optimized.mp4"
            autoplay
            loop
            muted
          ></video>
        </div>
      </div>

      <div class="frame"></div>

      <div class="frame">
        <div class="frame__content text-left">
          <h3>New Version</h3>
          <p>
            This newer version has a more updated website appearance and is more pleasing to users and eliminates bugs on the previous website
          </p>
        </div>
      </div>

      <div class="frame frame_bg">
        <div class="frame__content">
          <div
            class="frame-media frame-media_right"
            style="background-image: url(images/4.webp)"
          ></div>
        </div>
      </div>

      <div class="frame">
        <div class="frame__content">
          <video
            class="frame-media frame-media_left"
            src="media/video_optimized.mp4"
            autoplay
            loop
            muted
          ></video>
        </div>
      </div>

      <div class="frame"></div>
      <div class="frame"></div>

      <div class="frame frame_bg">
        <div class="frame__content">
          <div
            class="frame-media frame-media_right"
            style="background-image: url(images/5.webp)"
          ></div>
        </div>
      </div>

      <div class="frame frame_bg">
        <div class="frame__content">
          <video
            class="frame-media"
            src="media/video_optimized.mp4"
            autoplay
            loop
            muted
          ></video>
        </div>
      </div>

      <div class="frame"></div>
      <div class="frame"></div>

      <div class="frame">
        <div class="frame__content">© Develop By Arya and Dika </div>
      </div>
    </section>
  </div>

  <!-- Mengganti elemen soundbutton dengan h3 yang berisi teks "Scroll this page" -->
  <h3 class="scroll-text">Scroll this page</h3>

@endsection

@section('script')
<script>
let zSpacing = -1000,
		lastPos = zSpacing / 5,
		$frames = document.getElementsByClassName('frame'),
		frames = Array.from($frames),
		zVals = []

window.onscroll = function() {

	let top = document.documentElement.scrollTop,
			delta = lastPos - top

	lastPos = top

	frames.forEach(function(n, i) {
		zVals.push((i * zSpacing) + zSpacing)
		zVals[i] += delta * -5.5
		let frame = frames[i],
				transform = `translateZ(${zVals[i]}px)`,
				opacity = zVals[i] < Math.abs(zSpacing) / 1.8 ? 1 : 0
		frame.setAttribute('style', `transform: ${transform}; opacity: ${opacity}`)
	})

}

window.scrollTo(0, 1)
</script>
@endsection
