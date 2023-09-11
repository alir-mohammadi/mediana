import './bootstrap';

import 'flowbite';

import Alpine from 'alpinejs';

import toastr from 'toastr';

import $ from 'jquery';

import { Modal } from 'flowbite';

window.$ = window.jQuery = $;

window.Modal = Modal;

window.toastr = toastr;

window.Alpine = Alpine;

Alpine.start();
