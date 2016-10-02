"use strict";

(function googleTracking() {

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
        m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-40535132-1', 'auto');

    this.trackAnalytics = function (categorie, action, label, valeur, custom) {
    	ga('send', 'event', categorie, action, label, valeur, custom);
    };

    var trackers = document.querySelectorAll('[data-ga-trackers="on"]');
    Array.prototype.forEach.call(trackers, function(tracker, idx) {

        tracker.addEventListener('click', function(e) {
            
            var categorie = e.currentTarget.getAttribute('data-ga-cat');
            var action = e.currentTarget.getAttribute('data-ga-act');
            var label = e.currentTarget.getAttribute('data-ga-lbl');
            var valeur = e.currentTarget.getAttribute('data-ga-val');

            window.googleTracking.trackAnalytics(categorie, action, label, valeur);
        });

    });

}).apply(window.googleTracking = window.googleTracking || {});