<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymHub Home Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
        </style>
    @endif
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- 
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/fonts/Satoshi/WEB/css/satoshi.css"> -->

    <link rel="stylesheet" href="{{ asset('css/homedashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/fonts/Satoshi\WEB\css/satoshi.css') }}">
    @vite(['resources/js/homedashboard.js'])
</head>
<body>
    <div id="loginPopup" class="popup">
        <span id="closePopup">&times;</span>
        <form id="loginform">
            <label for="username">Ingresa tu usuario:</label>
            <input type="text" class="textbox" id="username" name="username" placeholder="Usuario" required>

            <label for="password">Ingresa tu contraseña:</label>
            <input type="password" class="textbox" id="password" name="password" placeholder="Contraseña" required>

            <button id="boton" type="submit" >Entrar </button>
        </form>
    </div>
    <div class="ellipse1"></div>
    <div id="HUD-container">
        <div class="HUD">
            <div class="logo">
                <h1 id="logo" class="inter"><img src="{{ asset('styles/resources/P0.png') }}" alt=""> GYMHUB <img src="{{ asset('styles/resources/P1.png') }}" alt=""></h1>
            </div>
            <div class="head-container" id="loginButton">
                <svg id="head" xmlns="http://www.w3.org/2000/svg" width="38" height="39" viewBox="0 0 38 39" fill="none">
                    <path d="M20.9481 3.67203C19.3568 3.61143 17.7699 3.87708 16.285 4.45265C14.8001 5.02822 13.4488 5.90152 12.314 7.01883C11.1688 8.12248 10.2589 9.44659 9.6392 10.9113C9.0195 12.3761 8.70281 13.9512 8.70821 15.5416V15.5895L5.69307 21.9917C5.57912 22.2329 5.52803 22.4991 5.54454 22.7654C5.56104 23.0317 5.64462 23.2895 5.78749 23.5149C5.93036 23.7402 6.12789 23.9258 6.36172 24.0543C6.59554 24.1828 6.85807 24.2501 7.12488 24.2499H8.70821V27.4166C8.70917 28.2562 9.04311 29.0611 9.63677 29.6547C10.2304 30.2484 11.0353 30.5823 11.8749 30.5833H13.4582V33.7499C13.4582 34.1699 13.625 34.5726 13.922 34.8695C14.2189 35.1665 14.6216 35.3333 15.0415 35.3333C15.4615 35.3333 15.8642 35.1665 16.1611 34.8695C16.4581 34.5726 16.6249 34.1699 16.6249 33.7499V30.5833C17.0448 30.5833 17.4475 30.4165 17.7445 30.1195C18.0414 29.8226 18.2082 29.4199 18.2082 28.9999C18.2082 28.58 18.0414 28.1773 17.7445 27.8804C17.4475 27.5834 17.0448 27.4166 16.6249 27.4166H11.8749V22.6666C11.8749 22.4587 11.834 22.2528 11.7545 22.0606C11.6749 21.8685 11.5583 21.6939 11.4113 21.5469C11.2642 21.3999 11.0897 21.2832 10.8975 21.2037C10.7054 21.1241 10.4995 21.0832 10.2915 21.0833H9.62048L11.7419 16.5799C11.8506 16.3506 11.9021 16.0983 11.8919 15.8447C11.8919 15.8284 11.8764 15.5578 11.8748 15.5416C11.8708 14.3753 12.1029 13.2203 12.5574 12.1461C13.0118 11.072 13.6791 10.101 14.5189 9.29177C15.3577 8.48117 16.3501 7.84644 17.4377 7.42491C18.5253 7.00337 19.6863 6.80354 20.8523 6.83715C23.1643 6.9814 25.3317 8.01148 26.9035 9.71309C28.4754 11.4147 29.3307 13.6568 29.2915 15.973L26.1774 27.8557C26.1047 28.1332 26.1079 28.425 26.1867 28.7008L27.7701 34.1891C27.8655 34.5189 28.0654 34.8089 28.3398 35.0154C28.6142 35.2219 28.9482 35.3337 29.2915 35.3341C29.4401 35.3335 29.5879 35.3125 29.7307 35.2714C30.1341 35.1549 30.4748 34.8829 30.6778 34.5152C30.8807 34.1476 30.9294 33.7143 30.813 33.3108L29.3503 28.2438L32.4056 16.7392C32.4401 16.6066 32.4578 16.4702 32.4582 16.3333V15.973C32.492 12.8352 31.3144 9.80528 29.1704 7.51396C27.0264 5.22265 24.0812 3.84651 20.9481 3.67203Z"/>
                </svg>
            </div>
        </div>
        <div class="Body-container">
            <div class="Body">
                <div class="Horarios-container">
                    <div class="HTitulo">
                        <p>🕐 Horarios de clases grupales</p>
                    </div>
                    <div id="dias-container-center">
                        <div class="Dias-container">
                            <div class="Dia-container-active" id="day-lu">
                                <p>Lu</p>
                            </div>
                            <div class="Dia-container-unactive" id="day-ma">
                                <p>Ma</p>
                            </div>
                            <div class="Dia-container-unactive" id="day-mi">
                                <p>Mi</p>
                            </div>
                            <div class="Dia-container-unactive" id="day-ju">
                                <p>Ju</p>
                            </div>
                            <div class="Dia-container-unactive" id="day-vi">
                                <p>Vi</p>
                            </div>
                            <div class="Dia-container-unactive" id="day-sa">
                                <p>Sa</p>
                            </div>
                            <div class="Dia-container-unactive" id="day-do">
                                <p>Do</p>
                            </div>
                        </div>
                    </div>
                    <div id="dcolumnas-container">
                        <div class="dcolumnas">
                            <p>Clase</p>
                            <p>Horario</p>
                            <p>Entrenador</p>
                        </div>
                    </div>
                    <div id="clases-container">
                        <div class="clase">
                            {{-- <p>Crossfit</p>
                            <p>7:00 am - 9:00 am</p>
                            <p>Eduardo P.</p> --}}
                        </div>
                        <div class="clase">
                            {{-- <p>Zumba</p>
                            <p>11:00 am - 12:00 pm</p>
                            <p>Rafa M.</p> --}}
                        </div>
                        <div class="clase">
                            {{-- <p>Danza</p>
                            <p>3:00 pm - 5:00 pm</p>
                            <p>Pablo E.</p> --}}
                        </div>
                        <div class="clase">
                            {{-- <p>Muay Tai</p>
                            <p>8:00 pm - 10:00 pm</p>
                            <p>Renzo D.</p> --}}
                        </div>
                        <div class="clase">
                            <p>🏋🏽‍♀️</p>
                        </div>
                    </div>
                </div>
                <div id="barraV"></div>
                <div id="matriculayanuncios-container">
                    <div id="matricula-container">
                        <div id="registrar-matricula-p-container">
                            <p id="registrar-matricula-p">📝 Registrar Matrícula</p>
                        </div>
                        <p id="ingresar-matricula-p">Ingresa tu matrícula:</p>
                        <form action="" id="form">
                            <input type="text" class="textbox" id="matricula" name="matricula" placeholder="Escribe tu matrícula" required>
                            <p id="ErrorCredenciales">Las credenciales ingresadas son invalidas, favor de revisarlas.</p>
                            <br>
                            <button id="boton" class="btnRegistro">Registrar</button>
                        </form>
                    </div>
                    <div id="anuncios-container">
                        <div class="flecha">
                            <svg id="flecha" xmlns="http://www.w3.org/2000/svg" width="34" height="35" viewBox="0 0 34 35" fill="none">
                                <g clip-path="url(#clip0_1_66)">
                                <path d="M12.3333 16.5101L17.7073 11.136C18.1315 10.7118 18.1315 10.1461 17.7073 9.72183C17.283 9.29756 16.7173 9.29756 16.2931 9.72183L9.222 16.7929C8.79774 17.2172 8.79774 17.7828 9.222 18.2071L16.2931 25.2782C16.7173 25.7024 17.283 25.7024 17.7073 25.2782C18.1315 24.8539 18.1315 24.2882 17.7073 23.864L12.3333 18.4899L24.0712 18.49C24.6369 18.49 25.0612 18.0657 25.0612 17.5C25.0612 16.9343 24.6369 16.51 24.0712 16.51L12.3333 16.5101Z" fill="#AEFF5C"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_1_66">
                                <rect width="24" height="24" fill="white" transform="translate(0.029541 17.5) rotate(-45)"/>
                                </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <img id="imagen" src="{{ asset('styles/resources/gimnasio.png') }}" alt="Imagen ejemplo de un gimnasio">
                        <div class="flecha">
                            <svg id="flecha" xmlns="http://www.w3.org/2000/svg" width="34" height="35" viewBox="0 0 34 35" fill="none">
                                <g clip-path="url(#clip0_1_70)">
                                  <path d="M24.7782 16.7928L17.7071 9.72176C17.2828 9.29749 16.7172 9.29749 16.2929 9.72176C15.8686 10.146 15.8686 10.7117 16.2929 11.136L21.6669 16.51L9.92893 16.51C9.36325 16.51 8.93898 16.9342 8.93898 17.4999C8.93898 18.0656 9.36325 18.4899 9.92893 18.4899L21.6669 18.4899L16.2929 23.8639C15.8686 24.2882 15.8686 24.8538 16.2929 25.2781C16.7172 25.7024 17.2828 25.7024 17.7071 25.2781L24.7782 18.207C25.2024 17.7828 25.2024 17.2171 24.7782 16.7928Z" fill="#AEFF5C"/>
                                </g>
                                <defs>
                                  <clipPath id="clip0_1_70">
                                    <rect width="24" height="24" fill="white" transform="translate(17 0.529297) rotate(45)"/>
                                  </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
