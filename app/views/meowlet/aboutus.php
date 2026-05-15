<?php
session_start();
$username = $_SESSION['user']['username'] ?? 'Guest';
?>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Nunito', 'sans-serif'] },
          colors: {
            bg:     '#1e1c2e',
            nav:    '#14121f',
            card:   '#2d2b3d',
            panel:  '#3a3852',
            border: '#4a4870',
            violet: '#7b5fff',
            gold:   '#f5a800',
          },
          keyframes: {
            float: {
              '0%,100%': { transform: 'translateY(0)' },
              '50%':     { transform: 'translateY(-8px)' },
            },
            fadeUp: {
              '0%':   { opacity: '0', transform: 'translateY(24px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
          },
          animation: {
            'float':   'float 3s ease-in-out infinite',
            'float2':  'float 3s ease-in-out 0.3s infinite',
            'float3':  'float 3s ease-in-out 0.6s infinite',
            'float4':  'float 3s ease-in-out 0.9s infinite',
            'fadeUp':  'fadeUp .6s ease forwards',
            'fadeUp2': 'fadeUp .6s ease .15s forwards',
            'fadeUp3': 'fadeUp .6s ease .3s forwards',
            'fadeUp4': 'fadeUp .6s ease .45s forwards',
          },
        },
      },
    }
  </script>
  <!-- ─── BANNER ─── -->
  <div class="relative w-full h-[460px]">
    <img src="/assets/img/banner.png" alt="banner" class="absolute inset-0 w-full h-full object-cover"/>
  </div>

  <!-- ─── TEAM CARDS ─── -->
  <section class="max-w-5xl mx-auto px-4 py-12">

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5">

      <!-- Member 1 -->
      <div class="team-card animate-fadeUp bg-card border border-border rounded-2xl overflow-hidden flex flex-col items-center" style="opacity:0">
        <div class="w-full aspect-[3/4] avatar-box flex items-center justify-center overflow-hidden">
          <img src="/assets/img/member1.png" alt="Leonardo Agustin"
               class="w-full h-full object-cover"
               onerror="this.style.display='none'">
        </div>
        <div class="w-full px-3 py-3 bg-panel">
          <p class="text-white font-extrabold text-[.88rem] text-center mb-2.5">Leonardo Agustin</p>
          <p class="text-[#999] text-[.7rem] text-center mb-3">Front-End Engineer</p>
          <div class="flex justify-center gap-3">
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/instagram.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/facebook.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/github.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/gmail.png" class="w-4"></a>
          </div>
        </div>
      </div>

      <!-- Member 2 -->
      <div class="team-card animate-fadeUp2 bg-card border border-border rounded-2xl overflow-hidden flex flex-col items-center" style="opacity:0">
        <div class="w-full aspect-[3/4] avatar-box flex items-center justify-center overflow-hidden">
          <img src="/assets/img/member2.png" alt="Quinlen Medelline"
               class="w-full h-full object-cover"
               onerror="this.style.display='none'">
        </div>
        <div class="w-full px-3 py-3 bg-panel">
          <p class="text-white font-extrabold text-[.88rem] text-center mb-2.5">Quinlen Medelline</p>
          <p class="text-[#999] text-[.7rem] text-center mb-3">UI/UX Designer</p>
          <div class="flex justify-center gap-3">
          <a href="#" class="social-icon opacity-60"><img src="/assets/img/instagram.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/facebook.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/github.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/gmail.png" class="w-4"></a>
          </div>
        </div>
      </div>

      <!-- Member 3 -->
      <div class="team-card animate-fadeUp3 bg-card border border-border rounded-2xl overflow-hidden flex flex-col items-center" style="opacity:0">
        <div class="w-full aspect-[3/4] avatar-box flex items-center justify-center overflow-hidden">
          <img src="/assets/img/member3.png" alt="Sandrika Marcella Jolie"
               class="w-full h-full object-cover"
               onerror="this.style.display='none'">
        </div>
        <div class="w-full px-3 py-3 bg-panel">
          <p class="text-white font-extrabold text-[.88rem] text-center mb-2.5">Sandrika Marcella Jolie</p>
          <p class="text-[#999] text-[.7rem] text-center mb-3">UI/UX Designer</p>
          <div class="flex justify-center gap-3">
          <a href="#" class="social-icon opacity-60"><img src="/assets/img/instagram.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/facebook.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/github.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/gmail.png" class="w-4"></a>
          </div>
        </div>
      </div>

      <!-- Member 4 -->
      <div class="team-card animate-fadeUp4 bg-card border border-border rounded-2xl overflow-hidden flex flex-col items-center" style="opacity:0">
        <div class="w-full aspect-[3/4] avatar-box flex items-center justify-center overflow-hidden">
          <img src="/assets/img/member4.png" alt="Wilshen Gouwesley"
               class="w-full h-full object-cover"
               onerror="this.style.display='none'">
        </div>
        <div class="w-full px-3 py-3 bg-panel">
          <p class="text-white font-extrabold text-[.88rem] text-center mb-2.5">Wilshen Gouwesley</p>
          <p class="text-[#999] text-[.7rem] text-center mb-3">Front-End Engineer</p>
          <div class="flex justify-center gap-3">
          <a href="#" class="social-icon opacity-60"><img src="/assets/img/instagram.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/facebook.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/github.png" class="w-4"></a>
            <a href="#" class="social-icon opacity-60"><img src="/assets/img/gmail.png" class="w-4"></a>
          </div>
        </div>
      </div>

    </div>
  </section>
</body>
</html>