<?php
$username = $user['username'];
$email    = $user['email'] ?? '';
?>

<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: { nunito: ['Nunito', 'sans-serif'] },
        colors: {
          bg:     '#1e1c2e',
          nav:    '#14121f',
          card:   '#2d2b3d',
          panel:  '#3a3852',
          border: '#4a4870',
          violet: '#7b5fff',
          gold:   '#f5a800',
        },
      },
    },
  }
</script>

<!-- PROFILE HEADER -->
<div class="w-[100%] bg-[#565272] rounded-xl mt-6 p-8 flex items-center gap-5">
  <div class="w-[130px] h-[130px] rounded-full p-[4px]
    bg-gradient-to-br from-yellow-200 via-yellow-400 to-yellow-100
    shadow-[0_0_15px_rgba(255,215,0,0.5)]">
    <img src="/assets/img/profile.png" alt="profile" class="w-full h-full rounded-full"/>
  </div>
  <div>
    <h1 class="text-white text-[37px] font-regular"><?= $username; ?></h1>
    <div class="flex row items-center">
      <div class="mt-3 px-5 py-2 rounded-full bg-[#FEDC73] text-[#2f243a] font-regular text-lg shadow-[0_0_10px_rgba(255,215,0,0.3)]">
        Gold Member
      </div>
      <h2 class="mt-3 mx-5 text-white">Learn more</h2>
    </div>
  </div>
</div>

<!-- EDIT FORM -->
<form action="/profile/update" method="POST">
  <div class="mt-6 px-2">

    <div class="mb-5">
      <label class="block text-white text-[.95rem] font-semibold mb-2">Username</label>
      <input
        type="text"
        name="username"
        value="<?= htmlspecialchars($username ?? ''); ?>"
        placeholder="Username"
        class="w-full px-4 py-3 rounded-xl bg-[#565272]/40 border border-[#7b78a8] text-white placeholder-[#9896b8] text-[.93rem] outline-none focus:border-violet focus:ring-1 focus:ring-violet transition"
      />
    </div>

    <div class="mb-8">
      <label class="block text-white text-[.95rem] font-semibold mb-2">Email</label>
      <input
        type="email"
        name="email"
        value="<?= htmlspecialchars($email ?? ''); ?>"
        placeholder="abc@gmail.com"
        class="w-full px-4 py-3 rounded-xl bg-[#565272]/40 border border-[#7b78a8] text-white placeholder-[#9896b8] text-[.93rem] outline-none focus:border-violet focus:ring-1 focus:ring-violet transition"
      />
    </div>

    <div class="flex justify-center">
      <button
        type="submit"
        class="px-14 py-3.5 rounded-2xl bg-gradient-to-b from-[#302E3E] to-[#5B57A5] text-white text-[1rem] font-bold shadow-lg hover:scale-105 hover:brightness-110 transition duration-300">
        Save Edit
      </button>
    </div>

  </div>
</form>

<script src="/js/main.js"></script>