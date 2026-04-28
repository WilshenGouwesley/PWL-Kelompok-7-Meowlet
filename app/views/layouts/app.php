<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Meowlet – Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Koh+Santepheap:wght@400;700;900&display=swap" rel="stylesheet"/>
  <style>
    @keyframes floatY { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-9px)} }
    @keyframes prog   { from{width:0} to{width:42%} }
    .anim-float { animation: floatY 4s ease-in-out infinite; transform-box:fill-box; transform-origin:center; }
    #prog-bar   { animation: prog 1s ease-out 0.5s both; }
  </style>
</head>

<body style="font-family:'Koh Santepheap',sans-serif" class="bg-[#2d2b3d] text-[#b0aec8] min-h-screen">
    <!-- Header start -->
    <?php require_once '../app/views/layouts/partials/header.php' ?>
    <!-- Header end -->

    <!-- Main content start -->
    <div class="w-full px-8 pt-8 pb-8">
    <?php require_once $content ?>
    </div>

    <!-- Footer start -->
    <?php require_once '../app/views/layouts/partials/footer.php' ?>
    <!-- Footer end -->

</body>
</html>