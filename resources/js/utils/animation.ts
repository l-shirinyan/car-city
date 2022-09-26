import anime from 'animejs/lib/anime.es.js';

export default function animate(
    animation: string,
    el: Element | null,
    options: any = {}
) {

    const animate: any = {};

    switch (animation) {
        case 'shrink':
            animate.width = ['100%', 0];
            animate.easing = 'easeInQuart';
            break;
        case 'display':
            animate.opacity = [0, 1];
            animate.easing = 'easeInQuart';
            break;
        default:
            break;
    }

    anime({
        targets: el,
        ...animate
    });
}

