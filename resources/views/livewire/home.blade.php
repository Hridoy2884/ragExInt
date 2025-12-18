<div>
    <section class="relative w-full h-screen bg-gray-900 overflow-hidden">
        <!-- Premium Fabric Background -->
        <canvas id="hero-bg" class="w-full h-full absolute inset-0"></canvas>
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-900 via-gray-900 to-indigo-800 opacity-60"></div>

        <!-- Hero Content -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full px-4 text-center">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 animate-fadeInUp">
                Welcome to <span class="text-indigo-400">RagExInternational</span>
            </h1>
            <p id="rotating-subtitle" class="text-lg md:text-xl text-gray-300 mb-8 animate-fadeInUp delay-200">
                Premium Garments Manufacturing | Corporate Excellence | Quality You Can Trust
            </p>
            <div class="flex gap-4 animate-fadeInUp delay-400">
                <a href="#about" class="px-6 py-3 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-lg transition transform hover:scale-105">
                    About Us
                </a>
                <a href="#products" class="px-6 py-3 border border-indigo-500 text-indigo-400 hover:bg-indigo-500 hover:text-white font-semibold rounded-lg transition transform hover:scale-105">
                    Our Products
                </a>
            </div>
        </div>
    </section>

    <!-- Tailwind Animations -->
    <style>
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeInUp { animation: fadeInUp 1s ease forwards; }
        .animate-fadeInUp.delay-200 { animation-delay: 0.2s; }
        .animate-fadeInUp.delay-400 { animation-delay: 0.4s; }
    </style>

    <!-- Rotating Subtitles -->
    <script>
        const subtitles = [
            "Premium Garments Manufacturing | Corporate Excellence | Quality You Can Trust",
            "Innovative Textile Solutions for Modern Fashion",
            "Sustainable and Ethical Garment Production",
            "Delivering Excellence, Stitch by Stitch",
            "Where Quality Meets Style in Every Thread"
        ];

        let subtitleIndex = 0;
        const subtitleElement = document.getElementById('rotating-subtitle');

        function rotateSubtitle() {
            subtitleIndex = (subtitleIndex + 1) % subtitles.length;
            subtitleElement.classList.add('opacity-0', 'transition-opacity', 'duration-500');

            setTimeout(() => {
                subtitleElement.textContent = subtitles[subtitleIndex];
                subtitleElement.classList.remove('opacity-0');
            }, 500);
        }

        setInterval(rotateSubtitle, 4000);
    </script>

    <!-- Premium Fabric Thread Background -->
    <script>
        const canvas = document.getElementById('hero-bg');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let threads = [];

        class Thread {
            constructor(x, y, length, speed, angle, color, width) {
                this.x = x;
                this.y = y;
                this.length = length;
                this.speed = speed;
                this.angle = angle;
                this.color = color;
                this.width = width;
            }

            update() {
                this.x += Math.cos(this.angle) * this.speed;
                this.y += Math.sin(this.angle) * this.speed;

                // Wrap edges
                if (this.x > canvas.width + 50) this.x = -50;
                if (this.x < -50) this.x = canvas.width + 50;
                if (this.y > canvas.height + 50) this.y = -50;
                if (this.y < -50) this.y = canvas.height + 50;
            }

            draw() {
                ctx.beginPath();
                ctx.moveTo(this.x, this.y);
                ctx.lineTo(this.x + Math.cos(this.angle) * this.length, this.y + Math.sin(this.angle) * this.length);
                ctx.strokeStyle = this.color;
                ctx.lineWidth = this.width;
                ctx.stroke();
            }
        }

        function initThreads() {
            threads = [];
            const spacing = 50;
            for (let i = 0; i < canvas.width; i += spacing) {
                for (let j = 0; j < canvas.height; j += spacing) {
                    // Create crisscross threads to mimic woven fabric
                    let colors = [
                        'rgba(255,255,255,0.08)',
                        'rgba(255,255,255,0.05)',
                        'rgba(255,255,255,0.03)'
                    ];
                    let angle = Math.PI / 4;
                    threads.push(new Thread(i + Math.random()*20, j + Math.random()*20, 60, 0.1 + Math.random()*0.1, angle, colors[Math.floor(Math.random()*colors.length)], 1));
                    threads.push(new Thread(i + Math.random()*20, j + Math.random()*20, 60, 0.1 + Math.random()*0.1, -angle, colors[Math.floor(Math.random()*colors.length)], 1));
                }
            }
        }

        function animateThreads() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            threads.forEach(thread => {
                thread.update();
                thread.draw();
            });
            requestAnimationFrame(animateThreads);
        }

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            initThreads();
        });

        initThreads();
        animateThreads();
    </script>
</div>
