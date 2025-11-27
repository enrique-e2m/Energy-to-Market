tailwind.config = {
    theme: {
        extend: {
            colors: {
                'orange-primary': '#f99c26e6',
                'green-primary': '#79b464e6',
                'blue-primary': '#3b82f6e6'
            },
            fontFamily: {
                'inter': ['Inter', '-apple-system', 'BlinkMacSystemFont', 'sans-serif']
            },
            animation: {
                'fade-in': 'fadeIn 0.8s cubic-bezier(0.4, 0, 0.2, 1)',
                'slide-up': 'slideUp 0.6s cubic-bezier(0.4, 0, 0.2, 1)',
                'scale-in': 'scaleIn 0.5s cubic-bezier(0.4, 0, 0.2, 1)'
            },
            keyframes: {
                fadeIn: {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(20px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    }
                },
                slideUp: {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(30px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    }
                },
                scaleIn: {
                    '0%': {
                        opacity: '0',
                        transform: 'scale(0.9)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'scale(1)'
                    }
                }
            }
        }
    }
}