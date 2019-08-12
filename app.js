// configs
const module = 'flexpeak';
const api = "api/";
const version = '1.0.1';

(function () {
    angular.module(module, [
        'ui.router',                    // Routing
        'oc.lazyLoad',                  // ocLazyLoad
        'ui.bootstrap',                 // Ui Bootstrap
        'pascalprecht.translate',       // Angular Translate
        'ngIdle',                       // Idle timer
        'ngSanitize',                    // ngSanitize
        'ps.inputTime',
    ]);
})();