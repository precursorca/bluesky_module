<div id="bluesky-tab"></div>
<h2 data-i18n="bluesky.title"></h2>

<table id="bluesky-tab-table"
       class="table table-responsive table-striped table-condensed"
       style="max-width: 400px;">
    <tbody></tbody>
</table>

<script>
$(document).on('appReady', function(){
    $.getJSON(appUrl + '/module/bluesky/get_data/' + serialNumber, function(data){
        var table = $('#bluesky-tab-table');
        $.each(data, function(key,val){
            var th = $('<th>').text(i18n.t('bluesky.column.' + key));
            var td = $('<td>').text(val);
            table.append($('<tr>').append(th, td));
        });
    });
});
</script>
