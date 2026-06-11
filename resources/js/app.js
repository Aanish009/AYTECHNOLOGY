import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('mobileMenu', () => ({
    open: false,
    toggle() { this.open = !this.open; },
}));

Alpine.data('dropdown', () => ({
    open: false,
    toggle() { this.open = !this.open; },
    close() { this.open = false; },
}));

Alpine.data('modal', () => ({
    show: false,
    open() { this.show = true; },
    close() { this.show = false; },
}));

Alpine.data('counter', () => ({
    count: 0,
    target: 0,
    init() {
        this.target = parseInt(this.$el.dataset.target) || 0;
        this.animate();
    },
    animate() {
        const duration = 2000;
        const step = this.target / (duration / 16);
        const interval = setInterval(() => {
            this.count += step;
            if (this.count >= this.target) {
                this.count = this.target;
                clearInterval(interval);
            }
        }, 16);
    },
}));

Alpine.start();
