var blueskyBaseUrl = null;
var blueskyConfigPromise = null;

var initializeBlueskyConfig = function () {
    if (!blueskyConfigPromise) {
        blueskyConfigPromise = $.getJSON(
            'index.php?/module/bluesky/get_config'
        ).then(function (config) {
            if (!config.base_url) {
                throw new Error(
                    'BLUESKY_BASE_URL is not configured'
                );
            }

            blueskyBaseUrl = config.base_url;
            return blueskyBaseUrl;
        });
    }

    return blueskyConfigPromise;
};

var blueskyActionLink = function (colNumber, row, action) {
    var col = $('td:eq(' + colNumber + ')', row);
    var blueskyid = col.text().trim();

    if (!blueskyid) {
        col.empty();
        return;
    }

    col.empty();

    initializeBlueskyConfig()
        .then(function (baseUrl) {
            var url = 'bluesky://' + baseUrl + '?' +
                'blueskyid=' + encodeURIComponent(blueskyid) +
                '&user=' +
                '&action=' + encodeURIComponent(action);

            var iconClass = {
                vnc: 'fa fa-desktop',
                ssh: 'fa fa-terminal',
                scp: 'fa fa-upload'
            };

            var link = $('<a>')
                .attr('href', url)
                .attr('title', 'Open ' + action.toUpperCase())
                .attr('aria-label', 'Open ' + action.toUpperCase());

            link.append(
                $('<i>')
                    .addClass(iconClass[action])
                    .attr('aria-hidden', 'true')
            );

            col.empty().append(link);
        })
        .catch(function (error) {
            console.error('Unable to load Bluesky configuration:', error);
            col.text('Configuration unavailable');
        });
};

var blueskyVncLink = function (colNumber, row) {
    blueskyActionLink(colNumber, row, 'vnc');
};

var blueskySshLink = function (colNumber, row) {
    blueskyActionLink(colNumber, row, 'ssh');
};

var blueskyScpLink = function (colNumber, row) {
    blueskyActionLink(colNumber, row, 'scp');
};
