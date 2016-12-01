/*jslint sloppy: true*/
/*global Drupal: true, jQuery: true */

// Global behaviors.
(function ($, Drupal, window, document) {
    "use strict";

    // Adds an arrow to links that doesn't break to the next line on its own.
    Drupal.behaviors.linkArrow = {
        attach: function (context, settings) {
            $('.link-arrow').once('link-arrow', function () {
                // Wrap the last word of the text in a span with the link arrow
                // to prevent the arrow from breaking to a new line.
                $(this).each (function () {
                    var $link = $(this).find('a');
                    var text = $link.text();
                    if (text) {
                        var newText = '',
                            lastWord = '';

                        var words = text.split(' ');
                        if (words) {
                            lastWord = words.pop();
                            newText += words.join(' ') + ' ';
                        } else {
                            lastWord = text;
                        }
                        $link.html(newText + '<span class="last-word">' + lastWord + '<i class="glyphicon glyphicon-menu-right"></i></span>');
                    }
                });

            });
        }
    };

}(jQuery, Drupal, this, this.document));
