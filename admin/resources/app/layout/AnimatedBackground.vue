<template>
    <div
        class="relative items-center justify-center hidden h-screen col-span-1 overflow-hidden gradient md:flex"
    >
        <svg
            width="429"
            height="697"
            xmlns="http://www.w3.org/2000/svg"
            class="absolute blur-lg svg-1"
        >
            <defs>
                <linearGradient
                    x1="99.777%"
                    y1="49.777%"
                    x2=".223%"
                    y2="49.777%"
                    id="a"
                >
                    <stop stop-color="#FFA84B" offset="0%"></stop>
                    <stop stop-color="#FF6D7F" offset="100%"></stop>
                </linearGradient>
                <linearGradient
                    id="paint0_linear_1_4"
                    x1="215"
                    y1="112.5"
                    x2="215"
                    y2="587.5"
                    gradientUnits="userSpaceOnUse"
                >
                    <stop stop-color="#1F1F2C" />
                    <stop offset="1" stop-color="#0E0E1A" />
                </linearGradient>
            </defs>
            <path
                d="M348.939 13C386.046 13 416.126 43.08 416.126 80.188C416.126 117.294 386.046 147.375 348.939 147.375C311.832 147.375 281.751 177.457 281.751 214.565C281.751 251.671 311.832 281.752 348.939 281.752C386.046 281.752 416.126 311.832 416.126 348.939C416.126 386.046 386.046 416.127 348.939 416.127C311.832 416.127 281.751 386.046 281.751 348.939C281.751 311.833 251.671 281.752 214.564 281.752C177.456 281.752 147.374 311.832 147.374 348.939C147.374 386.046 117.294 416.127 80.187 416.127C43.081 416.127 13 446.209 13 483.316C13 520.423 43.08 550.503 80.187 550.503H77.7C114.806 550.503 144.887 580.584 144.887 617.691C144.887 654.798 174.968 684.878 212.075 684.878C249.181 684.878 279.262 654.798 279.262 617.691C279.262 580.584 249.182 550.503 212.075 550.503"
                stroke="url(#a)"
                stroke-width="25"
                fill="none"
                fill-rule="evenodd"
                stroke-linecap="round"
            ></path>
        </svg>
    </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue';

const reveal = () => {
    let element = document.querySelector('.svg-1') as Element;
    let mask: SVGGeometryElement | null = null;
    let pathLength = '0';

    let path = element.querySelector('path') as Element;
    mask = path.cloneNode() as SVGGeometryElement;
    mask.setAttribute('stroke', 'url(#paint0_linear_1_4)');
    mask.setAttribute('stroke-width', '30');
    mask.classList.add('svg-mask');
    element.appendChild(mask);

    pathLength = mask.getTotalLength().toString();
    mask.style.strokeDasharray = pathLength + ' ' + pathLength;

    setTimeout(() => {
        mask = mask as SVGGeometryElement;
        mask.classList.remove('animating');
        mask.style.strokeDashoffset = '0';
        mask.getBoundingClientRect();

        mask.classList.add('animating');
        mask.style.strokeDashoffset = pathLength;
    }, 1000);
};

onMounted(() => {
    reveal();
});
</script>

<style>
#poly {
    transform: translate(-10px, -10px) rotate(90deg);
}

.svg-mask {
    stroke-dashoffset: 0;
}
.svg-mask.animating {
    transition: stroke-dashoffset 6s ease-in-out;
}
.svg-1 {
    transform: scale(1.5);
    bottom: 0;
    right: 0;
}
@media (min-width: 1280px) {
    .svg-1 {
        transform: scale(1.8);
        bottom: 10%;
        right: 10%;
    }
}
@media (min-width: 2300px) {
    .svg-1 {
        transform: scale(3.6);
        bottom: 30%;
        right: 15%;
    }
}
</style>
