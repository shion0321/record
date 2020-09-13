/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(document).ready(function () {

    $('input[type="file"]').on('change', function () {
        var fileprop = $(this).prop('files')[0],
            find_img = $(this).parent().find('img'),
            filereader = new FileReader(),
            view_box = $(this).parent('.form-group');

        if (find_img.length) {
            find_img.nextAll().remove();
            find_img.remove();
        }

        var img = '<div class="img_view"><img alt="" class="img"><p><a href="#" class="img_del">画像を削除する</a></p></div>';

        view_box.append(img);

        filereader.onload = function () {
            view_box.find('img').attr({
                'src': filereader.result,
                width: "100%",
            });
            img_del(view_box);
        }
        filereader.readAsDataURL(fileprop);
    });

    function img_del(target) {
        target.find("a.img_del").on('click', function () {
            var self = $(this),
                parentBox = self.parent().parent().parent();
            if (window.confirm('画像を削除します。\nよろしいですか？')) {
                setTimeout(function () {
                    parentBox.find('input[type=file]').val('');
                    parentBox.find('.img_view').remove();
                }, 0);
            }
            return false;
        });
    }

});
