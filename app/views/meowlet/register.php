<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meowiet — Register</title>
    <script src="https://kit.fontawesome.com/ccbead7141.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'meow-dark': '#1a1660',
                        'meow-mid': '#2d27a8',
                        'meow-purple': '#4c45d0',
                        'meow-light': '#6c63ff',
                        'meow-accent': '#8f88ff',
                    },
                    fontFamily: {
                        display: ['"Fredoka One"', 'cursive'],
                        body: ['"Nunito"', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 9s ease-in-out infinite',
                        'fade-up': 'fadeUp 0.7s ease both',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-16px)' },
                        },
                        fadeUp: {
                            '0%': { opacity: '0', transform: 'translateY(24px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                    },
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
</head>

<body class="min-h-screen bg-[url('/assets/img/registerloginbg.png')] bg-cover bg-center bg-no-repeat font-body flex items-center justify-center overflow-hidden relative">
    <div
    class="relative z-10 w-full max-w-4xl mx-auto flex rounded-3xl overflow-hidden shadow-2xl shadow-meow-dark/80 animate-fade-up">

        <div
            class="flex-1 bg-white/5 backdrop-blur-xl border border-white/10 p-10 flex flex-col justify-center min-w-0">

            <!-- Logo -->
            <div class="flex items-center gap-2 mb-8">
                <div class="w-24 flex items-center justify-center text-white text-sm">
                    <img src="assets/img/logo.png">
                </div>
            </div>

            <h1 class="font-display text-white text-4xl mb-1">Welcome</h1>
            <p class="text-white/50 text-sm mb-8">Please input your detail</p>

            <!-- Form -->
            <form action="#" method="POST" class="flex flex-col gap-4">

                <!-- Username -->
                <div
                    class="flex items-center gap-3 bg-white/10 border border-white/10 rounded-xl px-4 py-3 focus-within:border-meow-accent transition-colors">
                    <img src="assets/img/account.png">
                    <input type="text" name="username" id="username" placeholder="Username" maxlength="50" required
                        class="bg-transparent text-white placeholder-white/40 text-sm w-full outline-none" />
                </div>

                <!-- Email -->
                <div
                    class="flex items-center gap-3 bg-white/10 border border-white/10 rounded-xl px-4 py-3 focus-within:border-meow-accent transition-colors">
                    <img src="assets/img/email.png" class="">
                    <input type="email" name="email" id="email" placeholder="Email" maxlength="100" required
                        class="bg-transparent text-white placeholder-white/40 text-sm w-full outline-none" />
                </div>

                <!-- Password -->
                <div
                    class="flex items-center gap-3 bg-white/10 border border-white/10 rounded-xl px-4 py-3 focus-within:border-meow-accent transition-colors">
                    <img src="assets/img/lock.png">
                    <input type="password" name="password" id="password" placeholder="Password" maxlength="255" required
                        class="bg-transparent text-white placeholder-white/40 text-sm w-full outline-none" />
                    <!-- Toggle password -->
                    <button type="button" onclick="togglePassword()"
                        class="text-white/30 hover:text-white/60 transition-colors shrink-0">
                        <span id="eye-icon">
                            <i class="fa-regular fa-eye" style="color: rgb(158, 173, 201);"></i>
                        </span>
                    </button>
                </div>

                <!-- Already have account -->
                <p class="text-white/40 text-xs text-center">
                    Already have an account?
                    <a href="#" class="text-meow-accent hover:text-white transition-colors font-semibold">Sign In</a>
                </p>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-white text-meow-dark font-display text-base rounded-xl py-3 hover:bg-meow-accent hover:text-white active:scale-95 transition-all duration-200 shadow-lg shadow-meow-dark/40 mt-1">
                    Sign Up
                </button>

                <!-- Pemisah -->
                <div class="flex items-center gap-3 my-1">
                    <div class="flex-1 h-px bg-white/10"></div>
                    <span class="text-white/30 text-xs">or</span>
                    <div class="flex-1 h-px bg-white/10"></div>
                </div>

                <!-- Tombol Medsos -->
                <div class="flex justify-center gap-4">
                    <!-- Google -->
                    <button type="button"
                        class="w-10 h-10 rounded-full bg-white/10 border border-white/10 hover:bg-white/20 transition flex items-center justify-center">
                        <i class="fa-brands fa-google" style="color: rgb(158, 173, 201);"></i>
                    </button>
                    <!-- Facebook -->
                    <button type="button"
                        class="w-10 h-10 rounded-full bg-white/10 border border-white/10 hover:bg-white/20 transition flex items-center justify-center">
                        <i class="fa-brands fa-facebook-f" style="color: rgb(158, 173, 201);"></i>
                    </button>
                    <!-- Twitter/X -->
                    <button type="button"
                        class="w-10 h-10 rounded-full bg-white/10 border border-white/10 hover:bg-white/20 transition flex items-center justify-center">
                        <i class="fa-brands fa-x-twitter" style="color: rgb(158, 173, 201);"></i>
                    </button>
                </div>

            </form>
        </div>

        <!-- Panel Kanan -->
        <div
            class="hidden md:flex w-72 bg-white/10 backdrop-blur-xl border-l border-white/10 items-center justify-center relative overflow-hidden p-6">
            <img src="assets/img/registerloginright.png" class="w-full h-auto object-contain relative" />

        </div>

    </div>

    <script src="/js/register.js">
        
    </script>

</body>
</html>