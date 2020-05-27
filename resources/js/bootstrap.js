import Popper from 'popper.js';
import $ from 'jquery';
import _ from 'lodash';
import axios from 'axios';
import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faArrowLeft, faArrowRight, faCompass, faPlus } from '@fortawesome/free-solid-svg-icons';
import 'bootstrap';

window.Popper = Popper;
window.$ = window.jQuery = $;

library.add(faArrowLeft, faArrowRight, faCompass, faPlus);
dom.watch();

window._ = _;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
