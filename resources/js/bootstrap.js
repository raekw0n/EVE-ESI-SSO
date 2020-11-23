import Popper from 'popper.js';
import $ from 'jquery';
import _ from 'lodash';
import axios from 'axios';
import 'bootstrap';
import Swal from 'sweetalert2';
import {
    library,
    dom
} from '@fortawesome/fontawesome-svg-core';
import {
    faArrowLeft,
    faArrowRight,
    faCompass,
    faHome,
    faPlus,
    faTruck,
    faRocket,
    faWrench
} from '@fortawesome/free-solid-svg-icons';

library.add(faArrowLeft, faArrowRight, faCompass, faHome, faPlus, faTruck, faRocket, faWrench);
dom.watch();

window.Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    animation: false,
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.Popper = Popper;
window.$ = window.jQuery = $;

window._ = _;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
