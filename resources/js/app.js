import './bootstrap';
import registerGoogleTranslate from './components/google-translate'
import ApexCharts from 'apexcharts';
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'

window.ApexCharts = ApexCharts;
window.Alpine = Alpine

Alpine.plugin(collapse)
registerGoogleTranslate(Alpine)

Alpine.data('heroSlider', (count = 1, delay = 6800) => ({
    active: 0,
    timer: null,
    reducedMotion: false,

    init() {
        this.reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches

        if (!this.reducedMotion && count > 1) {
            this.start()
        }
    },

    start() {
        this.stop()
        this.timer = window.setInterval(() => this.next(false), delay)
    },

    stop() {
        if (this.timer) {
            window.clearInterval(this.timer)
            this.timer = null
        }
    },

    next(restart = true) {
        this.active = (this.active + 1) % count
        if (restart && !this.reducedMotion) this.start()
    },

    previous() {
        this.active = (this.active - 1 + count) % count
        if (!this.reducedMotion) this.start()
    },

    goTo(index) {
        this.active = index
        if (!this.reducedMotion) this.start()
    },

    destroy() {
        this.stop()
    },
}))

Alpine.data('revealOnScroll', (threshold = 0.14) => ({
    shown: false,
    observer: null,

    init() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            this.shown = true
            return
        }

        this.observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    this.shown = true
                    this.observer?.disconnect()
                }
            })
        }, { threshold })

        this.observer.observe(this.$el)
    },

    destroy() {
        this.observer?.disconnect()
    },
}))

Alpine.start()

// The dashboard translator historically used `hidden sm:block`. Keep the same
// desktop presentation while exposing a compact globe trigger on small screens.
const syncDashboardTranslateTrigger = () => {
    document.querySelectorAll('[x-data="gtUi()"].hidden.sm\\:block').forEach((root) => {
        const mobile = window.matchMedia('(max-width: 639px)').matches
        const button = root.querySelector(':scope > button')
        const label = button?.querySelector('[x-text="label"]')

        root.style.display = mobile ? 'block' : ''

        if (label) {
            label.style.display = mobile ? 'none' : ''
        }

        if (button) {
            button.style.width = mobile ? '40px' : ''
            button.style.paddingLeft = mobile ? '0' : ''
            button.style.paddingRight = mobile ? '0' : ''
            button.style.justifyContent = mobile ? 'center' : ''
        }
    })
}

window.addEventListener('resize', syncDashboardTranslateTrigger)
requestAnimationFrame(syncDashboardTranslateTrigger)
